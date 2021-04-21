<x-app-layout>
    <x-main.validation-message />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 bg-gray-50 border-b sm:rounded-lg-t flex items-center justify-between">
                    <h1 class="text-sm font-semibold uppercase text-gray-700">
                        Categories
                    </h1>
                    <div x-data="dropdown()">
                        <button @click="open" class="bg-blue-500 hover:bg-blue-400 px-4 py-2 rounded-lg text-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Add Category
                        </button>
                        <div x-show="isOpen()" @click.away="close" class="absolute bg-gray-900 bg-opacity-50 min-h-full min-w-full top-0 left-0 flex justify-center p-4">
                            <div @click.away="close" class="relative mt-4 md:mt-44">
                                <div class="bg-white shadow rounded-lg h-auto w-auto md:w-96">
                                    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                                     @csrf
                                    <div class="bg-gray-50 rounded-t-lg border-b p-4">
                                        <h1 class="text-sm font-semibold text-gray-700 uppercase">
                                            Add Category
                                        </h1>
                                    </div>
                                    <div class="p-4">
                                        <div class="flex flex-col space-y-2">
                                            <label for="name" class="text-xs font-bold uppercase">Name</label>
                                            <input type="text" name="name" id="name" placeholder="Name" class="rounded-lg ring-2 ring-blue-400 outline-none w-full" required>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="bg-gray-50 p-4 rounded-b-lg border-t">
                                            <button type="submit" class="bg-blue-500 hover:bg-blue-400 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-blue-100 rounded-lg w-full">
                                                Add Now
                                            </button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-4 shadow overflow-auto border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                      <thead class="bg-gray-50">
                        <tr>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Name
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Created_at
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Updated_at
                          </th>
                          <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Actions</span>
                          </th>
                        </tr>
                      </thead>
                      <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($categories as $data)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $data->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ date("F j, Y, g:i a", strtotime($data->created_at)) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ date("F j, Y, g:i a", strtotime($data->updated_at)) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex items-center justify-end space-x-4">
                                        <div x-data="dropdown()">
                                            <button @click="open" class="text-blue-600 hover:text-blue-900 focus:outline-none">
                                                Edit
                                            </button>
                                            <div x-show="isOpen()" @click.away="close" class="absolute bg-gray-900 bg-opacity-50 min-h-full min-w-full top-0 left-0 flex justify-center p-4">
                                                <div @click.away="close" class="relative mt-4 md:mt-44">
                                                    <div class="bg-white shadow rounded-lg w-auto md:w-96">
                                                        <form action="{{ route('categories.update', $data->id) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="bg-gray-50 rounded-t-lg border-b p-4">
                                                                <h1 class="text-sm font-semibold text-gray-700 uppercase">
                                                                    Edit Category
                                                                </h1>
                                                            </div>
                                                            <div class="p-4">
                                                                <div class="flex flex-col space-y-2">
                                                                    <label for="name" class="text-xs font-bold uppercase">Name</label>
                                                                    <input type="text" name="name" id="name" placeholder="Name" value="{{ $data->name }}" class="rounded-lg ring-2 ring-blue-400 outline-none w-full" required>
                                                                </div>
                                                            </div>
                                                            <div class="bg-gray-50 p-4 rounded-b-lg border-t">
                                                                <button type="submit" class="bg-blue-500 hover:bg-blue-400 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-blue-100 rounded-lg w-full">
                                                                    Update
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <form action="{{ route('categories.destroy', $data->id) }}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" onclick="return confirm('Are you sure you want to delete this category?')" class="text-red-600 hover:text-red-900 focus:outline-none">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center p-4">
                                    No Categories!
                                </td>
                            </tr>
                        @endforelse
                        <!-- More people... -->
                      </tbody>
                    </table>
                  </div>
            </div>
        </div>
    </div>
</x-app-layout>
