<?php

namespace App\Http\Controllers\Admin;

use App\Models\Payment;
use App\Models\Rent;
use App\Models\Tenant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\EditPaymentRequest;
use App\Http\Requests\Admin\CreatePaymentRequest;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // echo "Month :  ".$_REQUEST['month'];
        // echo "<br>Tenant ID:  ".$_REQUEST['tenant_id'];
        // echo "<br>ID :  ".$_REQUEST['rent_id'];
        // die;

        $rents =  Rent::where('id', '=', $_REQUEST['rent_id'])->where('for_month', '=', $_REQUEST['month'])->where('tenant_id', '=', $_REQUEST['tenant_id'])->get();
        // echo "<pre>";
        // print_r($rents->all());
        // echo "</pre>";
        // die;
          
        if(count($rents) > 0)
        {
            $tenants = Tenant::where( 'id', '=', $_REQUEST['tenant_id'])->get();
            return view('admin.payments.create', compact('rents', 'tenants'));
        }
        else
        {
            $search_text =  null;
            $tenants = Tenant::with( 'category','mypackage')->latest()->paginate(10);
            $rents = Rent::where('rent_paid', '=', 0)->get();
            return view('tenants.index', compact('tenants', 'search_text','rents'))->withErrors(['error' => 'Cannot find, Please try again.']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePaymentRequest $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // echo "</pre>";
        // die;
        $payment_date =  date('Y-m-d', strtotime($request->payment_date));
        $is_pending_payment = 0;
         if($request->has('is_pending_payment')) 
         {
            $is_pending_payment = 1;
            Rent::where(['id'=>$request->rent_id,'for_month'=>$request->for_month])->update(['rent_paid'=>1]);

            Payment::where(['tenant_id'=>$request->tenant_id,'for_month'=>$request->for_month])->update(['is_pending_payment'=>1]);
         }
        
         $payment = auth()->user()->payments()->create([
            'payment_ammount' => $request->payment_ammount,
            'payment_mode' => $request->payment_mode,
            'for_month' => $request->for_month,
            'is_pending_payment' => $is_pending_payment,
            'payment_description' => $request->payment_description,
            'payment_date' => $payment_date,
            'tenant_id' => $request->tenant_id,
            'rent_id' => $request->rent_id
       
        ]);
        return redirect()->route('tenants.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
       

        $payments = Payment::where('tenant_id','=',$id)->orderBy('for_month','DESC')->orderBy('id','DESC')->paginate(20);
        $tenant = Tenant::where('id','=',$id)->with('category','mypackage')->get();
       
        // echo "<pre>";
        // print_r($tenant->all());
        // echo "</pre>";
        // die;

        return view('admin.payments.show', compact('payments','tenant'));
   

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
