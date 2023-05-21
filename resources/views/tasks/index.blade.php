<x-app-layout>
    <x-slot name="header">
        Tasks list
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                    @can('create',\App\Models\Task::class)  <x-link :href="route('tasks.create')">Create</x-link> @endcan
                    </div>
                    <table class="w-full text-left border-collapse">
                        <thead>
                        <tr>
                            <th class="px-6 py-4 text-sm font-bold uppercase bg-gray-100 border-b text-gray-dark border-gray-light">
                                Created By
                            </th>
                            <th class="px-6 py-4 text-sm font-bold uppercase bg-gray-100 border-b text-gray-dark border-gray-light">
                                Task description
                            </th>
                            <th class="px-6 py-4 text-sm font-bold uppercase bg-gray-100 border-b text-gray-dark border-gray-light">
                                Due Date
                            </th>
                            <th class="px-6 py-4 text-sm font-bold uppercase bg-gray-100 border-b text-gray-dark border-gray-light"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($tasks as $task)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 border-b border-gray-200">{{ $task->user->name }}</td>
                                <td class="px-6 py-4 border-b border-gray-200">{{ $task->description }}</td>
                                <td class="px-6 py-4 border-b border-gray-200">{{ $task->due_date }}</td>
                                <td class="px-6 py-4 border-b border-gray-200">
                                @can('update' , $task)  
                                <x-link href="{{ route('tasks.edit', $task->id) }}">
                                        Edit
                                    </x-link>
                                @endcan
                                @can('delete', $task)
                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="task"
                                          onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <x-button>Delete</x-button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{ $tasks->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
