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
        $companies=Company::query();
        $companies->orderBy('revenue', 'desc');
        $paginated = $companies->paginate(10);
        return CompanyResource::collection($paginated);

    }

    public function create(StoreCompanyRequest $request)
    {
        if ($request->hasFile('logo')) {
            $uploadedImage = $request->file('logo');
            $originalName = $uploadedImage->getClientOriginalName();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            $extension = $uploadedImage->getClientOriginalExtension();
            $newFileName = $fileName . '_' . time() . '.' . $extension;
            $path = $uploadedImage->storeAs('logos', $newFileName, 'public');
            $imageUrl = asset('storage/' . $path);
        }

        $company = Company::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'logo'    => $imageUrl,
            'website' => $request->website,
            'revenue' => $request->revenue,
        ]);

        return new CompanyResource($company);
    }

    public function update(UpdateCompanyRequest $request, $company)
    {
        $company = Company::findOrFail($company);

        $company->update(request()->all());

        if ($request->hasFile('logo')) {
            $uploadedImage = $request->file('logo');
            $originalName = $uploadedImage->getClientOriginalName();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            $extension = $uploadedImage->getClientOriginalExtension();
            $newFileName = $fileName . '_' . time() . '.' . $extension;
            $path = $uploadedImage->storeAs('logos', $newFileName, 'public');
            $imageUrl = asset('storage/' . $path);
            $company->update(['logo' => $imageUrl]);
        }

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
