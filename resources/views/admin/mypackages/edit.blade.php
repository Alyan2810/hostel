<x-app-layout>
    <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800"> Edit Package</h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('admin.mypackages.update', $mypackage->id) }}">
                        @method('PUT')
                        @csrf
                        

                        <div class="mb-4">
                            <x-label for="package_name">Package</x-label>
                            <x-input id="package_name" class="block w-1/2 mt-1" name="package_name" required value="{{ old('package_name', $mypackage->package_name) }}" type="text" />
                            @error('package_name')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-label for="package_price">Package Price</x-label>
                            <x-input id="package_price" class="block w-1/2 mt-1" name="package_price" required value="{{ old('package_price', $mypackage->package_price) }}" type="text" />
                            @error('package_price')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-label for="package_description">Description</x-label>
                            <x-input id="package_description" class="block w-1/2 mt-1" name="package_description" required value="{{ old('package_description', $mypackage->package_description) }}" type="text" />
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

