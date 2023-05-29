<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\Rent;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function index()
    {
        $search_text =  null;
        $tenants = Tenant::with( 'category','mypackage')->latest()->paginate(10);
        //$rents = Tenant::leftJoin('rents','rents.tenant_id','=','tenants.id')->where('rents.rent_paid', '=', 0)->get();
        $rents = Rent::where('rent_paid', '=', 0)->get();

       
        // echo "<pre>";
        // print_r($rents->all());
        // echo "</pre>";
        // die;

        return view('tenants.index', compact('tenants', 'search_text','rents'));
    }

    public function show($id)
    {
        $tenant = Tenant::with('category','mypackage')->findOrFail($id);
        
        return view('tenants.show', compact('tenant'));
    }
    public function search( Request $request)
    {
       
      // echo "<pre>";
       //print_r($request->all());
      // echo "</pre>";
      // die;

      /////////////////////////--------------Cron Job Manually Starts--------------//////
      $rents =  Rent::where('for_month', '=', date('m-y'))->count();
            //  \Log::info($rents);
              if($rents == 0)
              {
                  $tenants =  Tenant::where('is_active', '=', 1)->get();
                  foreach ($tenants as $tenant) {
                  // $tag = Rent::firstOrCreate(['name' => $tagName]);
                      $rents = Rent::create([
                          'for_month' => date('m-y'),
                          'rent_paid' => 0,
                          'rent_description' => 'Test Description',
                          'due_date' => now(),
                      // 'user_id' => $tenant->user_id,
                          'tenant_id' => $tenant->id
                      ]);
                  }
              } 

      /////////////////////////--------------Cron Job Manually Ends--------------//////
      $search_text =  $request->search_text;
        $tenants = Tenant::where('tenant_name','LIKE','%'.$search_text.'%')->orWhere('tenant_nid','LIKE','%'.$search_text.'%')->with('category')->take(5)->latest()->get();
        $rents = Rent::where('rent_paid', '=', 0)->get();
        if(count($tenants) > 0)
      return view('tenants.index', compact('tenants' , 'search_text', 'rents'));
      else
      {
        $tenants = null;
        return view('tenants.index', compact('tenants', 'search_text','rents'));
      }
      
     
    }
    public function pending_tenants()
    {
      $search_text =  null;


    //   $rents = Rent::with('tenant' => function($query){
    //     $query->where('is_active','=', 1);
    // })->where('rent_paid','=',0)->get();

    $rents = Rent::with('tenant')
    ->whereHas('tenant', function($query)   {
        $query->where('is_active','=', 1)->with('category','mypackage');
    })->where('rent_paid','=',0)->latest()->paginate(10);
   
      
     
      // echo "<pre>";
      // print_r($rents->all());
      // echo "</pre>";
      // die;

      return view('tenants.pending', compact('rents', 'search_text'));
    }
    public function search_pending( Request $request)
    {
       
      // echo "<pre>";
      // print_r($request->all());
      // echo "</pre>";
      // die;

      $search_text =  $request->search_text;

      $rents = Rent::with('tenant')
      ->whereHas('tenant', function($query) use ($search_text)  {
          $query->where('is_active','=', 1)->where('tenant_name','LIKE','%'.$search_text.'%')->orWhere('tenant_nid','LIKE','%'.$search_text.'%')->with('category','mypackage');
      })->where('rent_paid','=',0)->latest()->paginate(10);

    if(count($rents) > 0)
      return view('tenants.pending', compact('rents', 'search_text'));
      else
      {
        $tenants = null;
        return view('tenants.pending', compact('rents', 'search_text'));
      }

    }
}
