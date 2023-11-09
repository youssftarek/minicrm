<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
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

    public function update(UpdateCompanyRequest $request, $company)
    {
        $company = Company::findOrFail($company);

        $company->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            // 'logo' => $request->input('logo'),
            'website' => $request->input('website'),
            'revenue' => $request->input('revenue'),
        ]);
        return new CompanyResource($company);

    }
    public function show($company)
    {
        $company = Company::findOrFail($company);
        return new CompanyResource($company);
    }

    public function delete($company)
    {
        $company = Company::findOrFail($company);
        $company->delete();
        return response()->json(['message' => 'Company deleted successfully'], 200);
    }




}
