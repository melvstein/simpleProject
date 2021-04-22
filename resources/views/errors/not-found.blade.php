<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($type.' Not Found') }}
        </h2>
    </x-slot>
    <div class="bg-blue-300 h-screen flex flex-col items-center justify-center">
        <h1 class="font-semibold text-5xl uppercase text-white">404 | {{ $type }} Not Found!</h1>

        <a href="{{ route("products.index") }}" class="text-yellow-700 underline"><< Back</a>
    </div>
</x-app-layout>
