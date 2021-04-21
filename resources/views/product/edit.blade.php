<x-app-layout>
    <x-main.validation-message />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-product.edit :categories="$categories" :product="$product" />
            </div>
        </div>
    </div>
</x-app-layout>
