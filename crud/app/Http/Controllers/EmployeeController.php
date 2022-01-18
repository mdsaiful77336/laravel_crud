<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employee;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function view(){
         $employees =employee::all();

        return response()->json([
             'employees'=>$employees,

        ]);
    }
    public function store(Request $request){

        $validator =Validator::make($request->all(),[
            'name'=>'required|max:191',
            'email'=>'required|email|max:191',
            'phone'=>'required|max:191',
            'name'=>'required|max:191',

        ]);
            if($validator->fails()){
                return response()->json([
                    'status'=>404,
                    'errors'=>$validator->messages,

                 ]);
            }else{
                $employee =new employee();
                $employee->name = $request->name;
                $employee->email = $request->email;
                $employee->phone = $request->phone;
                $employee->address = $request->address;
                $employee->save();
                return response()->json([
                     'status'=>320,
                     'message'=>'Employee Added Successfully',
                    //  sdfasdfasdf
                ]);

            }

    }

    public function getEmployeeInfo(Request $request)
    {
        $employ_id = $request->employ_id;
        $employee = employee::find($employ_id);

        if(!$employee){
            $msg = 'Data not found!';
            $data = '';
        }else{
            $msg = 'Data found!';
            $data = $employee;
        }

        $respone = [
            'message' => $msg,
            'data' => $data
        ];

        return $respone;
    }

    public function update_employee_info(Request $request)
    {
        employee::where('id', $request->edit_employee_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

       return redirect('/');
    }
     public function delete($id)
    {
        //  return $id;
        $employee =employee::find($id);
        $employee->delete();
        return response()->json([
                    'status' =>200,
                     'message'=>'Employee Delete successs',
        ]);
    }


}
