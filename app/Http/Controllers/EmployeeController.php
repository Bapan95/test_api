<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Get all employees
    public function index()
    {
        return Employee::all();
    }

    // Store a new employee
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'mobile_number' => 'required',
            'email' => 'required|email|unique:employees',
            'address' => 'required',
            'pincode' => 'required',
            'age' => 'required|integer',
            'blood_group' => 'required',
            'previous_company_name' => 'required',
            'job_role' => 'required',
            'salary' => 'required|numeric',
            'experience_days' => 'required|integer',
            'job_location' => 'required',
            'job_description' => 'required',
            'employee_designation' => 'required',
            'gross_salary_in_hand' => 'required|numeric',
            'yearly_mediclaim' => 'required|numeric',
            'pf' => 'required|numeric',
            'ta' => 'required|numeric',
            'hra' => 'required|numeric',
            'joining_bonus' => 'required|numeric',
            'total_monthly_salary' => 'required|numeric',
            'total_project_name' => 'required',
            'team_leader' => 'required',
            'total_group_members' => 'required|integer'
        ]);

        $employee = Employee::create($validated);
        return response()->json($employee, 201);
    }

    // Get a specific employee
    public function show($id)
    {
        $employee = Employee::find($id);

        if ($employee) {
            return response()->json($employee);
        } else {
            return response()->json(['error' => 'Employee not found'], 404);
        }
    }

    // Update an employee
    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);

        if ($employee) {
            $validated = $request->validate([
                'name' => 'sometimes|required',
                'mobile_number' => 'sometimes|required',
                'email' => 'sometimes|required|email|unique:employees,email,' . $id,
                'address' => 'sometimes|required',
                'pincode' => 'sometimes|required',
                'age' => 'sometimes|required|integer',
                'blood_group' => 'sometimes|required',
                'previous_company_name' => 'sometimes|required',
                'job_role' => 'sometimes|required',
                'salary' => 'sometimes|required|numeric',
                'experience_days' => 'sometimes|required|integer',
                'job_location' => 'sometimes|required',
                'job_description' => 'sometimes|required',
                'employee_designation' => 'sometimes|required',
                'gross_salary_in_hand' => 'sometimes|required|numeric',
                'yearly_mediclaim' => 'sometimes|required|numeric',
                'pf' => 'sometimes|required|numeric',
                'ta' => 'sometimes|required|numeric',
                'hra' => 'sometimes|required|numeric',
                'joining_bonus' => 'sometimes|required|numeric',
                'total_monthly_salary' => 'sometimes|required|numeric',
                'total_project_name' => 'sometimes|required',
                'team_leader' => 'sometimes|required',
                'total_group_members' => 'sometimes|required|integer'
            ]);

            $employee->update($validated);
            return response()->json($employee);
        } else {
            return response()->json(['error' => 'Employee not found'], 404);
        }
    }

    // Delete an employee
    public function destroy($id)
    {
        $employee = Employee::find($id);

        if ($employee) {
            $employee->delete();
            return response()->json(['message' => 'Employee deleted successfully']);
        } else {
            return response()->json(['error' => 'Employee not found'], 404);
        }
    }
}
