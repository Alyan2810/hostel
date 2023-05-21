<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
           Tenant Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="pb-8 space-y-1 border-b border-gray-200 dark:border-gray-700">
                        <dl class="flex justify-between">
                            <div>
                                <dt>{{ $tenant->room_no }} - {{ $tenant->category->name }}, {{ $tenant->mypackage->package_name}}</dt>
                                <dd class="text-base font-medium leading-6 text-gray-500 dark:text-gray-400">
                                    <time datetime="2021-07-18">{{Carbon\Carbon::parse($tenant->admission_date)->format('d M Y');}}</time>
                                </dd>
                            </div>
                        </dl>
                    </div>
                    <div class="divide-y divide-gray-200 xl:pb-0 xl:col-span-3 xl:row-span-2">
                    <div class="pt-10 pb-8 prose max-w-none">

                    @if($tenant->image)
                        <img src="{{ asset('storage/uploads/' . $tenant->image) }}" width="150" height="200">
                    @else
                    <img src="{{ asset('storage/no_image.jpg') }}" alt="" width="150" height="200">
                    @endif

                    <table class="w-full text-left border-collapse">
                        <thead>
                        <tr>
                        <th colspan="4" class="px-6 py-4 text-center text-sm font-bold uppercase bg-gray-100 border-b text-gray-dark border-gray-light">
                    Tenant Information    
                    </th>
                        </tr>
                        </thead>
                        <tbody>
                        
                        <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 border-b border-gray-200 font-bold">Room Number</td>
                                <td class="px-6 py-4 border-b border-gray-200">{{ $tenant->room_no }}</td>
                                <td class="px-6 py-4 border-b border-gray-200 font-bold">Admission On</td>
                                <td class="px-6 py-4 border-b border-gray-200">{{Carbon\Carbon::parse($tenant->admission_date)->format('d M Y');}}</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 border-b border-gray-200 font-bold">Name</td>
                                <td class="px-6 py-4 border-b border-gray-200">{{ $tenant->tenant_name }}</td>
                                <td class="px-6 py-4 border-b border-gray-200 font-bold">National ID Number</td>
                                <td class="px-6 py-4 border-b border-gray-200">{{ $tenant->tenant_nid }}</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 border-b border-gray-200 font-bold">Father Name</td>
                                <td class="px-6 py-4 border-b border-gray-200">{{ $tenant->father_name }}</td>
                                <td class="px-6 py-4 border-b border-gray-200 font-bold">Father ID Number</td>
                                <td class="px-6 py-4 border-b border-gray-200">{{ $tenant->father_nid }}</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 border-b border-gray-200 font-bold">Permanent Add</td>
                                <td class="px-6 py-4 border-b border-gray-200">{{ $tenant->permanent_add }}</td>
                                <td class="px-6 py-4 border-b border-gray-200 font-bold">Police Station</td>
                                <td class="px-6 py-4 border-b border-gray-200">{{ $tenant->police_station }}</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 border-b border-gray-200 font-bold">Police Chowki</td>
                                <td class="px-6 py-4 border-b border-gray-200">{{ $tenant->police_chowki }}</td>
                                <td class="px-6 py-4 border-b border-gray-200 font-bold">Contact Number</td>
                                <td class="px-6 py-4 border-b border-gray-200">{{ $tenant->contact_no }}</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 border-b border-gray-200 font-bold">Father Contact</td>
                                <td class="px-6 py-4 border-b border-gray-200">{{ $tenant->father_contact_no }}</td>
                                <td class="px-6 py-4 border-b border-gray-200 font-bold">Emergency Contact</td>
                                <td class="px-6 py-4 border-b border-gray-200">{{ $tenant->emergency_contact_no }}</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 border-b border-gray-200 font-bold">Institue</td>
                                <td class="px-6 py-4 border-b border-gray-200">{{ $tenant->institue }}</td>
                                <td class="px-6 py-4 border-b border-gray-200 font-bold">Institue Role</td>
                                <td class="px-6 py-4 border-b border-gray-200">{{ $tenant->institue_role }}</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 border-b border-gray-200 font-bold">Duration</td>
                                <td class="px-6 py-4 border-b border-gray-200">{{ $tenant->duration }}</td>
                                <td class="px-6 py-4 border-b border-gray-200 font-bold">Reg. Number</td>
                                <td class="px-6 py-4 border-b border-gray-200">{{ $tenant->redg_no }}</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 border-b border-gray-200 font-bold">Living Before</td>
                                <td class="px-6 py-4 border-b border-gray-200">{{ $tenant->living_before }}</td>
                                <td class="px-6 py-4 border-b border-gray-200 font-bold">Reletive Name</td>
                                <td class="px-6 py-4 border-b border-gray-200">{{ $tenant->reletive_name }}</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 border-b border-gray-200 font-bold">Relative Phone</td>
                                <td class="px-6 py-4 border-b border-gray-200">{{ $tenant->relative_phone }}</td>
                                <td class="px-6 py-4 border-b border-gray-200 font-bold">Security Paid</td>
                                <td class="px-6 py-4 border-b border-gray-200">{{ $tenant->security_ammount }}</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 border-b border-gray-200 font-bold"></td>
                                <td class="px-6 py-4 border-b border-gray-200"></td>
                                <td class="px-6 py-4 border-b border-gray-200 font-bold"></td>
                                <td class="px-6 py-4 border-b border-gray-200"> 
                                    @auth                 
                                    <x-link href="{{ route('admin.payments.show', $tenant->id) }}"> View Payments</x-link>
                                    @endauth
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                   
                   </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
