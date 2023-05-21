<x-app-layout>
    <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800"> Add New Tenant</h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('admin.tenants.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <x-label for="category">Block/Category</x-label>
                            <select name="category" id="category" class="block w-1/4 mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="0">--- SELECT BLOCK/CATEGORY ---</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                            @if ($category->id == old('category')) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-label for="mypackage">Package</x-label>
                            <select name="mypackage" id="mypackage" class="block w-1/4 mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="0">--- SELECT PACKAGE ---</option>
                                @foreach ($mypackages as $mypackage)
                                    <option value="{{ $mypackage->id }}"
                                            @if ($mypackage->id == old('mypackage')) selected @endif>{{ $mypackage->package_name }}</option>
                                @endforeach
                            </select>
                            @error('mypackage')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="mb-4">
                            <x-label for="room_no">Room Number</x-label>
                            <x-input id="room_no" class="block w-1/2 mt-1" name="room_no" required value="{{ old('room_no') }}" type="text"/>
                            @error('room_no')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-label for="security_ammount">Security Ammount</x-label>
                            <x-input id="security_ammount" class="block w-1/2 mt-1" name="security_ammount" required value="{{ old('security_ammount') }}" type="text"/>
                            @error('security_ammount')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-label  for="admission_date">Admission Date</x-label>
                            <x-input id="admission_date" class="block w-1/3 mt-1" name="admission_date" type="date" value="{{ old('admission_date') }}"/>
                            
                            @error('admission_date')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-label for="tenant_name">Name</x-label>
                            <x-input id="tenant_name" class="block w-1/2 mt-1" name="tenant_name" required value="{{ old('tenant_name') }}" type="text"/>
                            @error('tenant_name')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-label for="tenant_nid">National ID Number</x-label>
                            <x-input id="tenant_nid" class="block w-1/3 mt-1" name="tenant_nid" required value="{{ old('tenant_nid') }}" type="number"/>
                            @error('tenant_nid')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-label for="father_name">Father Name</x-label>
                            <x-input id="father_name" class="block w-1/2 mt-1" name="father_name" required value="{{ old('father_name') }}" type="text"/>
                            @error('father_name')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-label for="father_nid">Fater National ID</x-label>
                            <x-input id="father_nid" class="block w-1/3 mt-1" name="father_nid"  value="{{ old('father_nid') }}" type="number"/>
                            @error('father_nid')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-label for="permanent_add">permanent address</x-label>
                            <textarea id="permanent_add" class="block w-1/2 mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="permanent_add"  rows="4">{{ old('permanent_add') }}</textarea>
                            @error('permanent_add')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-label for="police_station">Police Station</x-label>
                            <x-input id="police_station" class="block w-1/2 mt-1" name="police_station" required value="{{ old('police_station') }}" type="text"/>
                            @error('police_station')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-label for="police_chowki">Police Chowki</x-label>
                            <x-input id="police_chowki" class="block w-1/2 mt-1" name="police_chowki"  value="{{ old('police_chowki') }}" type="text"/>
                            @error('police_chowki')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-label for="contact_no">Tenant Contact Number</x-label>
                            <x-input id="contact_no" class="block w-1/4 mt-1" name="contact_no" required value="{{ old('contact_no') }}" type="number"/>
                            @error('contact_no')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-label for="father_contact_no">Father Contact Number</x-label>
                            <x-input id="father_contact_no" class="block w-1/4 mt-1" name="father_contact_no"  value="{{ old('father_contact_no') }}" type="number"/>
                            @error('father_contact_no')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                       
                        <div class="mb-4">
                            <x-label for="emergency_contact_no">Emergency Contact Number</x-label>
                            <x-input id="emergency_contact_no" class="block w-1/2 mt-1" name="emergency_contact_no" required value="{{ old('emergency_contact_no') }}" type="number"/>
                            @error('emergency_contact_no')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-label for="institue">Institue Study/Work</x-label>
                            <x-input id="institue" class="block w-1/2 mt-1" name="institue"  value="{{ old('institue') }}" type="text"/>
                            @error('institue')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-label for="institue_role">Class/Role/Position in Institue</x-label>
                            <x-input id="institue_role" class="block w-1/2 mt-1" name="institue_role"  value="{{ old('institue_role') }}" type="text"/>
                            @error('institue_role')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-label for="duration">Duration</x-label>
                            <x-input id="duration" class="block w-1/2 mt-1" name="duration"  value="{{ old('duration') }}" type="text"/>
                            @error('duration')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-label for="redg_no">Registration/Roll Number</x-label>
                            <x-input id="redg_no" class="block w-1/2 mt-1" name="redg_no"  value="{{ old('redg_no') }}" type="text"/>
                            @error('redg_no')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-label for="living_before">Living Before</x-label>
                            <x-input id="living_before" class="block w-1/2 mt-1" name="living_before"  value="{{ old('living_before') }}" type="text"/>
                            @error('living_before')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-label for="reletive_name">Reletive Name</x-label>
                            <x-input id="reletive_name" class="block w-1/2 mt-1" name="reletive_name"  value="{{ old('reletive_name') }}" type="text"/>
                            @error('reletive_name')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-label for="relative_phone">Relative Phone</x-label>
                            <x-input id="relative_phone" class="block w-1/4 mt-1" name="relative_phone"  value="{{ old('relative_phone') }}" type="number"/>
                            @error('relative_phone')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                       
                        <div class="mb-4">
                            <x-label for="image">Image/Photo</x-label>
                            <x-input d="image" class="block w-full mt-1" name="image" type="file"/>
                            @error('image')
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

