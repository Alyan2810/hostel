<?php

namespace App\Http\Controllers\Admin;

use App\Models\Mypackage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\EditMypackageRequest;
use App\Http\Requests\Admin\CreateMypackageRequest;

class MypackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mypackages = Mypackage::paginate(20);

        return view('admin.mypackages.index', compact('mypackages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mypackages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMypackageRequest $request)
    {
        //Mypackage::create($request->validated());

       // print_r($request->all());
       // die;
        
        $mypackage = auth()->user()->mypackages()->create([
            'package_name' => $request->package_name,
            'package_price' => $request->package_price,
            'package_description' => $request->package_description
            
        ]);
        return redirect()->route('admin.mypackages.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mypackage  $mypackage
     * @return \Illuminate\Http\Response
     */
    public function show(Mypackage $mypackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mypackage  $mypackage
     * @return \Illuminate\Http\Response
     */
    public function edit(Mypackage $mypackage)
    {
        return view('admin.mypackages.edit', compact('mypackage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mypackage  $mypackage
     * @return \Illuminate\Http\Response
     */
    public function update(EditMypackageRequest $request, Mypackage $mypackage)
    {
       // $mypackage->update($request->validated());

        $mypackage->update([
            'package_name' => $request->package_name,
            'package_price' => $request->package_price,
            'package_description' => $request->package_description
        ]);


        return redirect()->route('admin.mypackages.index');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mypackage  $mypackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mypackage $mypackage)
    {
        if ($mypackage->tenants()->count()) {
            return back()->withErrors(['error' => 'Cannot delete, This package has Tenants.']);
        }

        $mypackage->delete();

        return redirect()->route('admin.mypackages.index');
    }
}
