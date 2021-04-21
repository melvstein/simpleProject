<div class="m-0 md:m-4 shadow overflow-auto border-b border-gray-200 sm:rounded-lg">
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
        @forelse ($products as $data)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10">
                    <img class="h-10 w-10 rounded-full" src="{{ asset('storage/' . $data->image_path) }}" alt="Product Image">
                    </div>
                    <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">
                        {{ $data->name }}
                    </div>
                    </div>
                </div>
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ date("F j, Y, g:i a", strtotime($data->created_at)) }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ date("F j, Y, g:i a", strtotime($data->updated_at)) }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <div class="flex items-center justify-end space-x-4">

                        <form action="{{ route('products.restored', $data->id) }}" method="POST">
                            @csrf
                            @method("PUT")
                            <button type="submit" onclick="return confirm('Are you sure you want to restore this product?')" class="text-green-600 hover:text-green-900 focus:outline-none">
                                Restore
                            </button>
                        </form>

                        <form action="{{ route('products.forceDeleted', $data->id) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" onclick="return confirm('Are you sure you want to delete permanently this product?')" class="text-red-600 hover:text-red-900 focus:outline-none">
                                Delete Permanently
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="9" class="text-center p-4">
                    No Products!
                </td>
            </tr>
        @endforelse
      </tbody>
    </table>
  </div>
