<x-app-layout>
    <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800"> Tenant List</h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   
                <div class="mb-4">
                        <x-link :href="route('admin.tenants.create')">Add New Tenant</x-link>
                    </div>

                    <form method="POST" action="{{ route('admin.tenants.search') }}" >
                        @csrf
                        <div class="mb-4">
                            <x-label for="search_text">Search Tenant</x-label>
                            <x-input id="search_text" class="inline w-half mt-1" name="search_text" required value="{{ $search_text }}" type="text"/>
                            <x-button>Go</x-button>
                        </div>
                    </form>

                    <table class="w-full text-left border-collapse">
                        <thead>
                        <tr>
                            <th class="px-6 py-4 text-sm font-bold uppercase bg-gray-100 border-b text-gray-dark border-gray-light">
                                Room #
                            </th>
                            <th class="px-6 py-4 text-sm font-bold uppercase bg-gray-100 border-b text-gray-dark border-gray-light">
                                Tenant Name
                            </th>
                            <th class="px-6 py-4 text-sm font-bold uppercase bg-gray-100 border-b text-gray-dark border-gray-light">
                                Block/Category
                            </th>
                            <th class="px-6 py-4 text-sm font-bold uppercase bg-gray-100 border-b text-gray-dark border-gray-light">
                                Package
                            </th>
                            <th class="px-6 py-4 text-sm font-bold uppercase bg-gray-100 border-b text-gray-dark border-gray-light"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!is_null($tenants))
                        @foreach ($tenants as $tenant)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 border-b border-gray-200">{{ $tenant->room_no }}</td>
                                <td class="px-6 py-4 border-b border-gray-200">{{ $tenant->tenant_name }} <br> S/O {{ $tenant->father_name }}</td>
                                <td class="px-6 py-4 border-b border-gray-200">{{ $tenant->category->name }}</td>
                                <td class="px-6 py-4 border-b border-gray-200">{{ $tenant->mypackage->package_name }}</td>
                                <td class="px-6 py-4 border-b border-gray-200">
                                    <x-link href="{{ route('admin.tenants.edit', $tenant->id) }}">
                                        Edit
                                    </x-link>

                                    <form action="{{ route('admin.tenants.destroy', $tenant->id) }}" method="POST"
                                          onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <x-button>Delete</x-button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        @else 
                        <x-slot name="header">
                            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                                Tenants Not found
                            </h2>
                        </x-slot>
                        @endif
                    </table>
                    @if(!is_null($tenants))
                    <div class="p-6 bg-white border-t mt-4 border-gray-200">
                    
                    {{ $tenants->links() }}
                    </div>
                   @endif 

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
