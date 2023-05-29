<x-app-layout>
    <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Monthly Rent Payments
        </h2>
   
        
        
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
            

                    @if(!is_null($rents))

                    @php 
                        $my = explode('-',$rents[0]->for_month);
                        $monthNum  = $my[0];
                        $monthName = date('F', mktime(0, 0, 0, $monthNum, 10)); 
                        $yearName  = '20'.$my[1];
                    @endphp 

                    <div class="flex flex-wrap py-8 md:flex-nowrap ">
                                <div class="flex flex-col flex-shrink-0  mb-6 md:w-64 md:mb-0">
                                    @if($tenants[0]->image)
                                        <img src="{{ asset('storage/uploads/' . $tenants[0]->image) }}" width="150" height="200">
                                    @else
                                    <img src="{{ asset('storage/no_image.jpg') }}" alt="" width="150" height="200">
                                    @endif
                                    <span
                                        class="font-semibold text-gray-700 title-font">{{ $tenants[0]->tenant_name }}</span>
                                    <span
                                        class="mt-1 text-sm text-gray-500">{{Carbon\Carbon::parse($tenants[0]->admission_date)->format('d M Y');}}   </span>
                                       
                                </div>
                                <div class="md:flex-grow">
                                    <div class="space-y-6">
                                        <div>
                                            <h2 class="text-2xl font-medium tracking-tight text-gray-900 title-font">{{ $tenants[0]->tenant_name }}</h2>
                                           
                                            <div class="flex flex-wrap">
                                                <span class="mr-3 text-sm font-medium uppercase">{{ $tenants[0]->room_no }} - {{ $tenants[0]->category->name }}</span>
                                            </div>
                                            <div class="flex flex-wrap">
                                               <span class="mr-3 text-sm font-medium " style=" color:red; " ><b>Due Rent:</b> {{ $monthName }} {{$yearName}}</span> 
                                            </div>
                                            <div class="flex flex-wrap">
                                               <span class="mr-3 text-sm font-medium "><b>Package:</b> {{ $tenants[0]->mypackage->package_name }} <b>RS. {{ $tenants[0]->mypackage->package_price }}</b></span> 
                                            </div>
                                            <div class="flex flex-wrap">
                                               <span class="mr-3 text-sm font-medium "><b>ID:</b> {{ $tenants[0]->tenant_nid }}</span> 
                                            </div>
                                            <div class="flex flex-wrap">
                                               <span class="mr-3 text-sm font-medium "><b>Contact:</b> {{ $tenants[0]->contact_no }}</span> 
                                            </div>
                                            <div class="flex flex-wrap">
                                               <span class="mr-3 text-sm font-medium "><b>Emergency Contact:</b> {{ $tenants[0]->emergency_contact_no }}</span> 
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        @endif


                        <div class="flex flex-wrap mb-4">
                            <h2 class="text-2xl font-medium tracking-tight text-green-600 title-font">Add Rent for {{ $monthName }} {{$yearName}} </h2> 
                        </div>
                    <form method="POST" action="{{ route('admin.payments.store') }}">
                        @csrf
                        <input type="hidden" name="for_month" value="{{ $rents[0]->for_month }}">
                        <input type="hidden" name="rent_id" value="{{ $rents[0]->id }}">
                        <input type="hidden" name="tenant_id" value="{{ $rents[0]->tenant_id }}">
                        <div class="mb-4">
                            <x-label  for="payment_ammount">Payment Ammount</x-label>
                            <x-input id="payment_ammount" class="block w-1/3 mt-1" name="payment_ammount" type="number" value="{{ old('payment_ammount') }}" required/>
                            @error('payment_ammount')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-label for="is_pending_payment">Full Rent Payment?</x-label>
                            <input type="checkbox" name="is_pending_payment" value="1" />
                            <span class="font-medium text-red-600 text-sm" role="alert">*Do not Tick/Check if Partially Paid With Pending Rent </span>
                            @error('is_pending_payment')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-label  for="payment_mode">Mode of Payment</x-label>
                            <x-input id="payment_mode"  class="block w-1/2 mt-1" name="payment_mode" type="text" value="{{ old('payment_mode') }}" />
                            @error('payment_mode')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-label for="payment_description">Description</x-label>
                            <textarea id="payment_description" class="block w-1/2 mt-1" name="payment_description"  rows="4">{{ old('payment_description') }}</textarea>
                            @error('payment_description')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <x-label  for="payment_date">Payment Date</x-label>
                            <x-input id="payment_date" class="block w-1/3 mt-1" name="payment_date" type="date" value="{{ old('payment_date') }}"/>
                            
                            @error('payment_date')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="mt-6">
                            <x-button>Submit</x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

