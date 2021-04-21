<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
<div>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method("PUT")
            <div class="p-4 space-y-4">
                <div class="flex flex-col space-y-2">
                    <label for="category" class="text-xs font-bold uppercase">Category</label>
                    <select name="category" id="category" class="rounded-lg ring-2 ring-blue-400 outline-none w-full" required>
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->name }}" {{ $category->name == $product->category ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-col space-y-2">
                    <label for="name" class="text-xs font-bold uppercase">Name</label>
                    <input type="text" name="name" id="name" placeholder="Name" value="{{ $product->name }}" class="rounded-lg ring-2 ring-blue-400 outline-none w-full" required>
                </div>

                <div class="flex flex-col space-y-2">
                    <label for="price" class="text-xs font-bold uppercase">Price</label>
                    <input type="number" name="price" id="price" placeholder="Price" value="{{ $product->price }}" class="rounded-lg ring-2 ring-blue-400 outline-none w-full" required>
                </div>

                <div class="flex flex-col space-y-2">
                    <label for="sale_price" class="text-xs font-bold uppercase">Sale Price (Optional)</label>
                    <input type="number" name="sale_price" id="sale_price" placeholder="Sale Price" value="{{ $product->sale_price }}" class="rounded-lg ring-2 ring-blue-400 outline-none w-full">
                </div>

                <div class="flex flex-col space-y-2">
                    <label for="units" class="text-xs font-bold uppercase">Units</label>
                    <input type="number" name="units" id="units" placeholder="Units" value="{{ $product->units }}" class="rounded-lg ring-2 ring-blue-400 outline-none w-full" required>
                </div>

                <div class="flex flex-col space-y-2">
                    <label for="details" class="text-xs font-bold uppercase">Details</label>
                    <textarea name="details" id="details" placeholder="Details" class="rounded-lg ring-2 ring-blue-400 outline-none w-full" required>{{ $product->details }}</textarea>
                </div>

                <div class="flex flex-col space-y-2">
                    <label for="description" class="text-xs font-bold uppercase">Description</label>
                    <textarea name="description" id="description" placeholder="Description" class="rounded-lg ring-2 ring-blue-400 outline-none w-full" required>{{ $product->description }}</textarea>
                </div>
            </div>
            <div class="bg-gray-50 p-4 rounded-b-lg border-t">
                <button type="submit" class="bg-blue-500 hover:bg-blue-400 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-blue-100 rounded-lg">
                    Update
                </button>
            </div>
    </form>
</div>
<div>
    <form action="{{ route('products.updateImage', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4 p-4">
        @csrf
        @method("PUT")

        <div class="flex items-center justify-center">
            <img class="h-40 w-40 rounded-full border shadow p-2" src="{{ asset('storage/' . $product->image_path) }}" alt="Product Image">
        </div>

        <div class="flex flex-col space-y-2">
            <label for="image" class="text-xs font-bold uppercase">Image</label>
            <input type="file" name="image" id="image" class="px-4 py-2 rounded-lg ring-2 ring-blue-400 outline-none w-full" required>
        </div>

        <div class="text-right">
            <button type="submit" class="bg-blue-500 hover:bg-blue-400 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-blue-100 rounded-lg">
                Save
            </button>
        </div>
    </form>
</div>
</div>
