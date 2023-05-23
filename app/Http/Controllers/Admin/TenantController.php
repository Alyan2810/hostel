<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tenant;
use App\Models\Rent;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\EditTenantRequest;
use App\Http\Requests\Admin\CreateTenantRequest;
use App\Models\Mypackage;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //A Test comment added
        $tenants = Tenant::with('category')->latest()->paginate(20);
        return view('admin.tenants.index', compact('tenants'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $categories = Category::all();
        $mypackages = Mypackage::all();
        return view('admin.tenants.create', compact('categories','mypackages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTenantRequest $request)
    {
        if ($request->has('image')) {
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('uploads', $filename, 'public');
        }
        
        //$admission_date =  date('Y-m-d', strtotime($request->admission_date));
        $tenant = auth()->user()->tenants()->create([
            'tenant_name' => $request->tenant_name,
            'tenant_nid' => $request->tenant_nid,
            'father_name' => $request->father_name,
            'father_nid' => $request->father_nid,
            'permanent_add' => $request->permanent_add,
            'police_station' => $request->police_station,
            'police_chowki' => $request->police_chowki,
            'contact_no' => $request->contact_no,
            'father_contact_no' => $request->father_contact_no,
            'emergency_contact_no' => $request->emergency_contact_no,
            'institue' => $request->institue,
            'institue_role' => $request->institue_role,
            'duration' => $request->duration,
            'redg_no' => $request->redg_no,
            'living_before' => $request->living_before,
            'reletive_name' => $request->reletive_name,
            'relative_phone' => $request->relative_phone,
            'room_no' => $request->room_no,
            'security_ammount' => $request->security_ammount,
            'admission_date' => $request->admission_date,
            'image' => $filename ?? null,
            'category_id' => $request->category,
            'mypackage_id' => $request->mypackage
           
        ]);

if($tenant)
{
    $admission_my =  date('m-y', strtotime($request->admission_date));
    $rents = Rent::create([
        'for_month' => $admission_my,
        'rent_paid' => 0,
        'rent_description' => 'First Month ',
        'due_date' => now(),
    // 'user_id' => $tenant->user_id,
        'tenant_id' => $tenant->id
    ]);

}
       

        return redirect()->route('admin.tenants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function show(Tenant $tenant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function edit(Tenant $tenant)
    {
        $categories = Category::all();
        $mypackages = Mypackage::all();

        return view('admin.tenants.edit', compact('tenant',  'categories','mypackages'));
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function update(EditTenantRequest $request, Tenant $tenant)
    {
       
      // print_r($request->all());
       //die();
        if ($request->has('image')) {
            Storage::delete('public/uploads/' . $tenant->image);
            
           
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('uploads', $filename, 'public');
        }
        $is_active = 0;
         if($request->has('is_active')) 
         $is_active = 1;
        // $admission_date =  date('Y-m-d', strtotime($request->admission_date));
         $tenant->update([
            'tenant_name' => $request->tenant_name,
            'tenant_name' => $request->tenant_name,
            'tenant_nid' => $request->tenant_nid,
            'father_name' => $request->father_name,
            'father_nid' => $request->father_nid,
            'permanent_add' => $request->permanent_add,
            'police_station' => $request->police_station,
            'police_chowki' => $request->police_chowki,
            'contact_no' => $request->contact_no,
            'father_contact_no' => $request->father_contact_no,
            'emergency_contact_no' => $request->emergency_contact_no,
            'institue' => $request->institue,
            'institue_role' => $request->institue_role,
            'duration' => $request->duration,
            'redg_no' => $request->redg_no,
            'living_before' => $request->living_before,
            'reletive_name' => $request->reletive_name,
            'relative_phone' => $request->relative_phone,
            'is_active' => $is_active,
            'room_no' => $request->room_no,
            'security_ammount' => $request->security_ammount,
            'admission_date' =>$request->admission_date,
            'image' => $filename ?? $tenant->image,
            'category_id' => $request->category,
            'mypackage_id' => $request->mypackage
        ]);

        return redirect()->route('admin.tenants.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tenant $tenant)
    {
      // print_r($tenant);
       //die();
       // Should not be deleted as there are payments
        // if ($tenant->image) 
        // {
        //     Storage::delete('public/uploads/' . $tenant->image);
        // }
       // $tenant->delete();
        return redirect()->route('admin.tenants.index');
    }
}
