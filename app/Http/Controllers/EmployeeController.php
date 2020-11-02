<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Intervention\Image\Image;
use DB;


class EmployeeController extends Controller
{

    public function index()
    {
        $employee = Employee::all();
        return response()->json($employee);
    }





    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:employees',
        ]);

        if($request->photo){
//            $file=$request->file('photo');
//            $imagename=time().".".$file->getOrginalExtension();
//            $imageDirectory='backend/employee/';
//            $file->move($imageDirectory,$imagename);
            $position = strpos($request->photo, ';');
            $sub=substr($request->photo, 0 ,$position);
            $ext=explode('/', $sub)[1];
            $name=time().".".$ext;
//            $img=Image::make($request->photo)->resize(240,200);
            $upload_path='backend/employee/';
            $image_url=$upload_path.$name;
//            $request->photo->save($image_url);

            $employee = new Employee();
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->address = $request->address;
            $employee->salary = $request->salary;
            $employee->nid = $request->nid;
            $employee->joining_date = $request->joining_date;
            $employee->photo =  $image_url;
            $employee->save();
        }
        else{
            $employee = new Employee;
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->address = $request->address;
            $employee->salary = $request->salary;
            $employee->nid = $request->nid;
            $employee->joining_date = $request->joining_date;
            $employee->save();
        }



    }



    public function show(Employee $employee)
    {
        $employee=DB::table('employees')->where('id',$employee)->first();
        return response()->json($employee);
    }


    public function edit(Employee $employee)
    {

    }


    public function update(Request $request, Employee $employee)
    {

    }

    public function destroy(Employee $employee)
    {
        DB::table('employees')->where('id',$employee)->delete();

    }
}
