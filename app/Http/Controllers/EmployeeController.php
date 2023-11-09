<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeResource;
use Illuminate\Http\Request;
use App\Models\Employee;
class EmployeeController extends Controller
{
    public function read()
    {

        $employees = Employee::all();
        return EmployeeResource::collection($employees);

    }




}
