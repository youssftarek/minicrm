<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Resources\CompanyResource;
use Illuminate\Http\Request;
use App\Models\Company;
class CompanyController extends Controller
{
    public function read()
    {

        $companies = Company::all();
        return CompanyResource::collection($companies);

    }

    public function create(StoreCompanyRequest $request)
    {
        $company = Company::create([
            'name' => $request->name,
            'email' => $request->email,
            // 'logo' => $request->logo,
            'website' => $request->website,
            'revenue' => $request->revenue,
        ]);

        return new CompanyResource($company);

    }




}
