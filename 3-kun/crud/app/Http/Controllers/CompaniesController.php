<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Rules\PhoneNumber;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }
    public function index()
    {
        $companies = Company::paginate(10);
        return view('companies.index',[
            'companies' => $companies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => ['required','numeric',new PhoneNumber()],
        ]);
        $company = Company::create($data);
//        $company = new Company;
//        $company ->name = $data['name'];
//        $company->address = $data['address'];
//        $company->phone = $data['phone'];
//        $company->save();

        return redirect()->route('companies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $company = Company::findOrFail($id);
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);
        $company = Company::findOrFail($id);
        $company->name = $request->name;
        $company->address = $request->address;
        $company->phone = $request->phone;
        $company->save();

        return redirect()->route('companies.index')->with('success', 'Ma\'lumotlar yangilandi!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $companies)
    {
        //
    }
}
