<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all()->load("department");
        return response()->json(["status" => true, "data" => $employees], 200);
    }

    public function store(Request $request)
    {
        $rules = [
            "name" => "required|string|min:1|max:100",
            "email" => "required|email|max:80",
            "phone" => "required|max:15",
        ];

        $validator = validator($request->input(), $rules);

        if ($validator->fails()) {
            return response()->json(
                [
                    "status" => false,
                    "errors" => $validator->errors()->all(),
                ],
                400
            );
        }

        $employee = new Employee($request->input());
        $department = Department::find($request->department);
        $employee->department()->associate($department);
        $employee->save();

        return response()->json(
            [
                "status" => true,
                "message" => "Employee added successfully",
                "data" => $employee->load("department"),
            ],
            200
        );
    }

    public function show(Employee $employee)
    {
        return response()->json(
            ["status" => true, "data" => $employee->load("department")],
            200
        );
    }

    public function update(Request $request, Employee $employee)
    {
        $rules = [
            "name" => "required|string|min:1|max:100",
            "email" => "required|email|max:80",
            "phone" => "required|max:15",
        ];

        $validator = validator($request->input(), $rules);

        if ($validator->fails()) {
            return response()->json(
                [
                    "status" => false,
                    "errors" => $validator->errors()->all(),
                ],
                400
            );
        }

        $employee->update($request->input());
        $department = Department::find($request->department);
        $employee->department()->associate($department);
        $employee->save();

        return response()->json(
            [
                "status" => true,
                "message" => "Employee updated successfully",
                "data" => $employee->load("department"),
            ],
            200
        );
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json(
            [
                "status" => true,
                "message" => "Employee deleted successfully",
                "data" => $employee->load("department"),
            ],
            200
        );
    }
}
