<div x-data="dropdown()">
<button x-on:click="open" class="bg-blue-500 hover:bg-blue-400 px-4 py-2 rounded-lg text-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
    Add Product
</button>
<div x-show="isOpen()" x-on:click.away="close" class="absolute bg-gray-900 bg-opacity-50 min-h-full min-w-full top-0 left-0 flex justify-center p-4">
    <div x-on:click.away="close" class="relative mt-4 md:mt-18">
        <div class="bg-white shadow rounded-lg h-auto w-auto md:w-96">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="bg-gray-50 rounded-t-lg border-b p-4">
                        <h1 class="text-sm font-semibold text-gray-700 uppercase">
                            Add Product
                        </h1>
                    </div>
                    <div class="p-4 space-y-4">
                        <div class="flex flex-col space-y-2">
                            <label for="category" class="text-xs font-bold uppercase">Category</label>
                            <select name="category" id="category" class="rounded-lg ring-2 ring-blue-400 outline-none w-full" required>
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex flex-col space-y-2">
                            <label for="name" class="text-xs font-bold uppercase">Name</label>
                            <input type="text" name="name" id="name" placeholder="Name" class="rounded-lg ring-2 ring-blue-400 outline-none w-full" required>
                        </div>

                        <div class="flex flex-col space-y-2">
                            <label for="price" class="text-xs font-bold uppercase">Price</label>
                            <input type="number" name="price" id="price" placeholder="Price" class="rounded-lg ring-2 ring-blue-400 outline-none w-full" required>
                        </div>

                        <div class="flex flex-col space-y-2">
                            <label for="sale_price" class="text-xs font-bold uppercase">Sale Price (Optional)</label>
                            <input type="number" name="sale_price" id="sale_price" placeholder="Sale Price" class="rounded-lg ring-2 ring-blue-400 outline-none w-full">
                        </div>

                        <div class="flex flex-col space-y-2">
                            <label for="units" class="text-xs font-bold uppercase">Units</label>
                            <input type="number" name="units" id="units" placeholder="Units" class="rounded-lg ring-2 ring-blue-400 outline-none w-full" required>
                        </div>

                        <div class="flex flex-col space-y-2">
                            <label for="details" class="text-xs font-bold uppercase">Details</label>
                            <textarea name="details" id="details" placeholder="Details" class="rounded-lg ring-2 ring-blue-400 outline-none w-full" required></textarea>
                        </div>

                        <div class="flex flex-col space-y-2">
                            <label for="description" class="text-xs font-bold uppercase">Description</label>
                            <textarea name="description" id="description" placeholder="Description" class="rounded-lg ring-2 ring-blue-400 outline-none w-full" required></textarea>
                        </div>

                        <div class="flex flex-col space-y-2">
                            <label for="image" class="text-xs font-bold uppercase">Image</label>
                            <input type="file" name="image" id="image" class="px-4 py-2 rounded-lg ring-2 ring-blue-400 outline-none w-full" required>
                        </div>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-b-lg border-t">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-400 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-blue-100 rounded-lg w-full">
                            Add Now
                        </button>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>
