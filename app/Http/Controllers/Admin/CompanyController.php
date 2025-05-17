<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company = Company::first();
        return view('admin.company.index',[
            'company' => $company
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'logo' => 'required|image|max:2048',
        ]);

        $company = new Company();
        $company->name = $request->name;
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->youtube = $request->youtube;
        $company->facebook = $request->facebook;
        $company->instagram = $request->instagram;
        $file = $request->logo;
        if($file){
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images', $file_name);
            $company->logo = $file_name;
        }
        $company->save();
        return redirect()->route('company.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = Company::findOrFail($id);
        return view('admin.company.edit',[
            'company' => $company
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'logo' => 'required|image|max:2048',
        ]);

        $company = new Company();
        $company->name = $request->name;
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->youtube = $request->youtube;
        $company->facebook = $request->facebook;
        $company->instagram = $request->instagram;
        $file = $request->logo;
        if ($file) {
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images', $file_name);
            $company->logo = $file_name;
        }
        $company->update();
        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        return redirect()->route('company.create');
    }
}
