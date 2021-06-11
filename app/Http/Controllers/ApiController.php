<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class ApiController extends Controller
{
    public function getAllEmployees()
    {
        // logic to get all employees goes here
            $employees = Employee::get()->toJSON(JSON_PRETTY_PRINT);
            return response($employees,200);
        }
    

    public function createEmployee(Request $request)
    {
        // logic to create a employee record goes here
        $employee = new Employee;
        $employee->name = $request->name;
        $employee->job_role = $request->job_role;
        $employee->save();

        return response()->json([
            "message" => "student record created"
        ], 201);
    }

    public function getEmployee($id)
    {
        // logic to get a employee record goes here
        if(Employee::where('id',$id)->exists()){
            $employee=Employee::where('id',$id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($employee,200);
        } else {
            return response()->json([
                "message" => "Employee record not found"
            ], 404);
        }
    }

    public function updateEmployee(Request $request, $id)
    {
        // logic to update a employee record goes here
        if(Employee::where('id',$id)->exists()){
            $employee = Employee::find($id);
            $employee->name =is_null($request->name) ? $employee->name : $request->name;
            $employee->job_role = is_null($request->job_role) ? $employee -> job_role : $request->job_role;
            $employee->save();

            return response()->json([
                "message" => "records updated successfully"
            ], 200);
        }else {
            return response()->json([
                "message" => "Employee not found"
            ], 404);
    }
}

    public function deleteEmployee($id)
    {
        // logic to delete a employee record goes here
    }
}
