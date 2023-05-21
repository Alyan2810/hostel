<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Latest Tenants
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="-my-8 divide-y-2 divide-gray-100">

                        @foreach ($tenants as $tenant)
                            <div class="flex flex-wrap py-8 md:flex-nowrap">
                                <div class="flex flex-col flex-shrink-0 mb-6 md:w-64 md:mb-0">
                                    @if($tenant->image)
                                        <img src="{{ asset('storage/uploads/' . $tenant->image) }}" width="150" height="200">
                                    @else
                                        <img src="{{ asset('storage/no_image.jpg') }}" alt="" width="150" height="200">
                                    @endif
                                    <span
                                        class="font-semibold text-gray-700 title-font">{{ $tenant->tenant_name }}</span>
                                    <span
                                        class="mt-1 text-sm text-gray-500"> {{Carbon\Carbon::parse($tenant->admission_date)->format('d M Y');}}</span>
                                </div>
                                <div class="md:flex-grow">
                                <div class="space-y-6">
                                        <div>
                                            <h2 class="text-2xl font-medium tracking-tight text-gray-900 title-font">{{ $tenant->tenant_name }}</h2>
                                            <div class="flex flex-wrap">
                                                <span class="mr-3 text-sm font-medium ">{{ $tenant->father_name }}</span>
                                            </div>
                                            <div class="flex flex-wrap">
                                                <span class="mr-3 text-sm font-medium uppercase">{{ $tenant->room_no }} - {{ $tenant->category->name }}</span>
                                            </div>
                                            <div class="flex flex-wrap">
                                               <span class="mr-3 text-sm font-medium "><b>Package:</b> {{ $tenant->mypackage->package_name }}</span> 
                                            </div>
                                            <div class="flex flex-wrap">
                                               <span class="mr-3 text-sm font-medium "><b>ID:</b> {{ $tenant->tenant_nid }}</span> 
                                            </div>
                                            <div class="flex flex-wrap">
                                               <span class="mr-3 text-sm font-medium "><b>Contact:</b> {{ $tenant->contact_no }}</span> 
                                            </div>
                                            <div class="flex flex-wrap">
                                               <span class="mr-3 text-sm font-medium "><b>Emergency Contact:</b> {{ $tenant->emergency_contact_no }}</span> 
                                            </div>
                                            
                                        </div>
                                        <div>
                                            <p class="leading-relaxed">{{ $tenant->permanent_add }}</p>
                                        </div>
                                    </div>
                                    <x-nav-link href="{{ route('tenants.show', $tenant) }}">View Full Information
                                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor"
                                             stroke-width="2" fill="none" stroke-linecap="round"
                                             stroke-linejoin="round">
                                            <path d="M5 12h14"></path>
                                            <path d="M12 5l7 7-7 7"></path>
                                        </svg>
                                    </x-nav-link>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
