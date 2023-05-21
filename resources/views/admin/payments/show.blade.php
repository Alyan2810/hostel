<x-app-layout>
    <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        Payment List
        </h2> 
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                @if(!is_null($tenant))
                    <div class="flex flex-wrap py-8 md:flex-nowrap ">
                                <div class="flex flex-col flex-shrink-0  mb-6 md:w-64 md:mb-0">
                                    @if($tenant[0]->image)
                                        <img src="{{ asset('storage/uploads/' . $tenant[0]->image) }}" width="150" height="200">
                                    @else
                                        <img src="{{ asset('storage/no_image.jpg') }}" alt="" width="150" height="200">
                                    @endif
                                    <span
                                        class="font-semibold text-gray-700 title-font">{{ $tenant[0]->tenant_name }}</span>
                                    <span
                                        class="mt-1 text-sm text-gray-500">
                                        {{Carbon\Carbon::parse( $tenant[0]->admission_date)->format('d M Y');}}</span>
                                </div>
                                <div class="md:flex-grow">
                                    <div class="space-y-6">
                                        <div>
                                            <h2 class="text-2xl font-medium tracking-tight text-gray-900 title-font">{{ $tenant[0]->tenant_name }}</h2>
                                            <div class="flex flex-wrap">
                                                <span class="mr-3 text-sm font-medium uppercase">{{ $tenant[0]->room_no }} - {{ $tenant[0]->category->name }}</span>
                                            </div>
                                            <div class="flex flex-wrap">
                                            <span class="mr-3 text-sm font-medium "><b>Package:</b> {{ $tenant[0]->mypackage->package_name }}</span> 
                                            </div>
                                            <div class="flex flex-wrap">
                                            <span class="mr-3 text-sm font-medium "><b>ID:</b> {{ $tenant[0]->tenant_nid }}</span> 
                                            </div>
                                            <div class="flex flex-wrap">
                                            <span class="mr-3 text-sm font-medium "><b>Contact:</b> {{ $tenant[0]->contact_no }}</span> 
                                            </div>
                                            <div class="flex flex-wrap">
                                            <span class="mr-3 text-sm font-medium "><b>Emergency Contact:</b> {{ $tenant[0]->emergency_contact_no }}</span> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    <table class="w-full text-left border-collapse">
                        <thead>
                        <tr>
                            <th class="px-6 py-4 text-sm font-bold uppercase bg-gray-100 border-b text-gray-dark border-gray-light">
                                Ammount Paid
                            </th>
                            <th class="px-6 py-4 text-sm font-bold uppercase bg-gray-100 border-b text-gray-dark border-gray-light">
                            Payment of Month
                            </th>
                            <th class="px-6 py-4 text-sm font-bold uppercase bg-gray-100 border-b text-gray-dark border-gray-light">
                            Payment Mode
                            </th>
                            <th class="px-6 py-4 text-sm font-bold uppercase bg-gray-100 border-b text-gray-dark border-gray-light">
                            Paid On
                            </th>
                            <th class="px-6 py-4 text-sm font-bold uppercase bg-gray-100 border-b text-gray-dark border-gray-light">
                            Comments
                            </th>
                           <th class="px-6 py-4 text-sm font-bold uppercase bg-gray-100 border-b text-gray-dark border-gray-light">
                            Rent Pending
                           </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($payments as $payment)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 border-b border-gray-200">{{ $payment->payment_ammount }}</td>
                                <td class="px-6 py-4 border-b border-gray-200 ">
                                @php 
                                    $my = explode('-',$payment->for_month);
                                    $monthNum  = $my[0];
                                    $monthName = date('F', mktime(0, 0, 0, $monthNum, 10)); 
                                    $yearName  = '20'.$my[1];
                                @endphp    
                                {{ $monthName }} {{$yearName}}</td>
                                <td class="px-6 py-4 border-b border-gray-200">{{ $payment->payment_mode }}</td>
                                <td class="px-6 py-4 border-b border-gray-200 ">

                                    {{Carbon\Carbon::parse($payment->payment_date)->format('d M Y');}}
                                </td>
                                <td class="px-6 py-4 border-b border-gray-200">{{ $payment->payment_description }} - by {{ $payment->user->name }} </td>
                                <td class="px-6 py-4 border-b border-gray-200">
                                   
                                @if(!$payment->is_pending_payment)
                                    <x-link href="{{ route('admin.payments.create',  ['tenant_id'=>$tenant[0],'rent_id'=>$payment->rent_id, 'month' => $payment->for_month]) }}">
                                        Pay Rent
                                    </x-link>
                                    @endif

                                   
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{ $payments->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
