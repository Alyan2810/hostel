<x-app-layout>
    <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800"> Add New Package</h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('admin.mypackages.store') }}">
                        @csrf
                        <div>
                            <x-label class="block text-sm text-gray-600" for="package_name"/>Package Name
                            <x-input id="package_name" class="block w-full mt-1" name="package_name" type="text" required/>
                            @error('package_name')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <x-label class="block text-sm text-gray-600" for="package_price"/>Price
                            <x-input id="package_price" class="block w-full mt-1" name="package_price" type="text" required/>
                            @error('package_price')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <x-label class="block text-sm text-gray-600" for="package_description"/>Description
                            <x-input id="package_description" class="block w-full mt-1" name="package_description" type="text" required/>
                            @error('package_description')
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

