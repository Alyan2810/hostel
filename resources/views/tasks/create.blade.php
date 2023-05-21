<x-app-layout>
    <x-slot name="header">
        Create Task
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('tasks.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <x-label for="description">Task Description</x-label>
                            <textarea id="description" class="block w-full mt-1" name="description"  rows="6">{{ old('description') }}</textarea>
                            @error('description')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <x-label for="due_date">Due Date</x-label>
                            <x-input id="due_date" class="block w-full mt-1" name="due_date" type="date" value="{{ old('due_date') }}"/>
                            
                            @error('due_date')
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

