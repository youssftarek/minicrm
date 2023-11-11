<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Resources\EmployeeResource;
use Illuminate\Http\Request;
use App\Models\Employee;
class EmployeeController extends Controller
{
    public function read()
    {

        $employees = Employee::paginate(10);
        return EmployeeResource::collection($employees);

    }


    public function create(StoreEmployeeRequest $request)
    {
        $employee = Employee::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'company_id' => $request->company_id,
            'email' => $request->email,
            'phone' => $request->phone,
            'occupation' => $request->occupation,
        ]);

        return new EmployeeResource($employee);
    }


    public function update(UpdateEmployeeRequest $request, $employee)
    {
        $employee = Employee::findOrFail($employee);

        $employee->update(request()->all());

        return new EmployeeResource($employee);

    }


    public function show($employee)
    {
        $employee = Employee::findOrFail($employee);
        return new EmployeeResource($employee);
    }


    public function delete($employee)
    {
        $employee = Employee::findOrFail($employee);
        $employee->delete();
        return response()->json(['message' => 'Employee deleted successfully'], 200);
    }

}
