<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();
        return response()->json(["status" => true, "data" => $companies], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            "name" => "required|string|min:1|max:100",
            "acronym" => "required|string|min:1|max:10",
            "logo" => "required|mimes:jpg,jpeg,png|max:10240",
        ];
        $validator = validator(
            [
                "name" => $request->name,
                "acronym" => $request->acronym,
                "logo" => $request->logo,
            ],
            $rules
        );

        if ($validator->fails()) {
            return response()->json(
                ["status" => false, "errors" => $validator->errors()->all()],
                400
            );
        }

        $company = new Company();
        $company->name = $request->name;
        $company->acronym = $request->acronym;

        $file_name = time() . "." . $request->logo->extension();
        $request->logo->move(public_path("img/logo"), $file_name);

        $company->logo = "img/logo/" . $file_name;
        $company->save();

        return response()->json(
            [
                "status" => true,
                "message" => "Company added successfully",
            ],
            200
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return response()->json(["status" => true, "data" => $company], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $rules = [
            "name" => "required|string|min:1|max:100",
            "acronym" => "required|string|min:1|max:10",
            "logo" => "required|mimes:jpg,jpeg,png|max:10240",
        ];
        $validator = validator(
            [
                "name" => $request->name,
                "acronym" => $request->acronym,
                "logo" => $request->logo,
            ],
            $rules
        );

        if ($validator->fails()) {
            return response()->json(
                ["status" => false, "errors" => $validator->errors()->all()],
                400
            );
        }

        $company->name = $request->name;
        $company->acronym = $request->acronym;

        unlink(public_path($company->logo));
        $file_name = time() . "." . $request->logo->extension();
        $request->logo->move(public_path("img/logo"), $file_name);

        $company->logo = "img/logo/" . $file_name;
        $company->save();

        return response()->json(
            [
                "status" => true,
                "message" => "Company updated successfully",
            ],
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        unlink(public_path($company->logo));
        $company->delete();

        return response()->json(
            ["status" => true, "message" => "Company deleted successfully"],
            200
        );
    }
}
