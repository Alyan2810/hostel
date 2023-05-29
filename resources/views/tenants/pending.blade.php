<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Tenants With Due Pending Rent
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <form method="POST" action="{{ route('tenants.search_pending') }}" >
                        @csrf
                        
                        <div class="mb-4">
                            <x-label for="search_text">Search Tenant With Pending Rent</x-label>
                            <x-input id="search_text" class="inline w-half mt-1" name="search_text" required value="{{ $search_text }}" type="text"/>
                            <x-button>Go</x-button>
                        </div>
                        
                </form>

                    <div class="-my-8 divide-y-2 divide-gray-100">
                        @if(!is_null($rents))
                        @foreach ($rents as $rent)
                            <div class="flex flex-wrap py-8 md:flex-nowrap">
                                <div class="flex flex-col flex-shrink-0 mb-6 md:w-64 md:mb-0">
                                    @if($rent->tenant->image)
                                        <img src="{{ asset('storage/uploads/' . $rent->tenant->image) }}" width="150" height="200">
                                    @else
                                        <img src="{{ asset('storage/no_image.jpg') }}" alt="" width="150" height="200">
                                    @endif
                                    <span class="font-semibold text-gray-700 title-font">{{ $rent->tenant->tenant_name }}</span>
                                    <span class="mt-1 text-sm text-gray-500">
                                        {{Carbon\Carbon::parse($rent->tenant->admission_date)->format('d M Y');}}
                                    </span>
                                       
                                </div>
                                <div class="md:flex-grow">
                                    <div class="space-y-6">
                                        <div>
                                            <div class="flex flex-wrap">
                                            @php 
                                                $my = explode('-',$rent->for_month);
                                                $monthNum  = $my[0];
                                                $monthName = date('F', mktime(0, 0, 0, $monthNum, 10)); 
                                                $yearName  = '20'.$my[1];
                                            @endphp
                                            
                                            <x-nav-link  style=" color:red; " :href="route('admin.payments.create',  ['tenant_id'=>$rent->tenant->id,'rent_id'=>$rent->id, 'month' => $rent->for_month])" >
                                            Pay Due Rent of {{ $monthName }} {{ $yearName }}
                                            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="2" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M5 12h14"></path>
                                                <path d="M12 5l7 7-7 7"></path>
                                            </svg>
                                            </x-nav-link>  

                                            </div>

                                            <h2 class="text-2xl font-medium tracking-tight text-gray-900 title-font">{{ $rent->tenant->tenant_name }}</h2>
                                            <div class="flex flex-wrap">
                                                <span class="mr-3 text-sm font-medium ">{{ $rent->tenant->father_name }}</span>
                                            </div>
                                            <div class="flex flex-wrap">
                                                <span class="mr-3 text-sm font-medium uppercase">{{ $rent->tenant->room_no }} - {{--$rent->tenant->category->name--}}</span>
                                            </div>
                                            <div class="flex flex-wrap">
                                               <span class="mr-3 text-sm font-medium "><b>Package:</b> {{--$rent->tenant->mypackage->package_name --}}</span> 
                                            </div>
                                            <div class="flex flex-wrap">
                                               <span class="mr-3 text-sm font-medium "><b>ID:</b> {{ $rent->tenant->tenant_nid }}</span> 
                                            </div>
                                            <div class="flex flex-wrap">
                                               <span class="mr-3 text-sm font-medium "><b>Contact:</b> {{ $rent->tenant->contact_no }}</span> 
                                            </div>
                                            <div class="flex flex-wrap">
                                               <span class="mr-3 text-sm font-medium "><b>Emergency Contact:</b> {{ $rent->tenant->emergency_contact_no }}</span> 
                                            </div>
                                            
                                        </div>
                                        <div>
                                            <p class="leading-relaxed">{{ $rent->tenant->permanent_add }}</p>
                                        </div>
                                    </div>
                                
                                    <x-link href="{{ route('tenants.show', $rent->tenant) }}">
                                        View Information
                                    </x-link>
                                    @auth
                                        
                                        <x-link href="{{ route('admin.payments.show', $rent->tenant->id) }}">
                                                View Payments
                                            </x-link>
                                      
                                       @endauth
                                </div>
                            </div>
                        @endforeach
                        @else 
                        <x-slot name="header">
                            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                                Posts Not found
                            </h2>
                        </x-slot>
                        
                        @endif
                        
                    </div>
                    <div class="p-6 bg-white border-t mt-4 border-gray-200">
                    {{ $rents->links() }}
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
