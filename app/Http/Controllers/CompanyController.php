<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
            return view('Companies.index', ['companies' => Company::orderby('name')->get() ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $company = new Company();
        // can be used for seeing the insides of the incoming request
        // dd($request->all()); die();
        $company->fill($request->all());
        $company->save();
        return redirect()->route('Companies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\author  $horse
     * @return \Illuminate\Http\Response
     */
    public function show(Company $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\author  $horse
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
        return view('companies.edit',['company'=>$company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\author  $horse
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Company $company)
    // {
    //     //
    //     $request->validate([]);
    //     $company->update($request->all());
    //     return redirect()->route('Companies.index')
    //     ->with('success', 'companies updated successfully');
    // }
public function update(Request $request, Company $company){
$company->fill($request->all());
$company->save();
return redirect()->route('Companies.index');
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\author  $horse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
            $company->delete();
            return redirect()->route('Companies.index')
            ->with('success', 'company deleted successfully');



//             if (count($author->books)){
// return back()->withErrors(['error' => ['Can\'t delete country with cities assigned, please unassign cities first!']]);
// }
// $author->delete();
// return redirect()->route('authors.index');

    }
}
