<nav class="relative bg-blue-400 px-4">
    <div class="flex items-center justify-between">
        <div class="p-4">
            <a href="{{ route('home') }}" class="text-white hover:bg-blue-500 hover:bg-opacity-50 p-4 {{ request()->routeIs('home') ? 'bg-white bg-opacity-50' : '' }}">Home</a>
        </div>

        <div>
            <a href="{{ route('login') }}" class="text-white hover:bg-blue-500 hover:bg-opacity-50 p-4 {{ request()->routeIs('login') ? 'bg-white bg-opacity-50' : '' }}">Login</a>
            <a href="{{ route('register') }}" class="text-white hover:bg-blue-500 hover:bg-opacity-50 p-4 {{ request()->routeIs('register') ? 'bg-white bg-opacity-50' : '' }}">Register</a>
        </div>
    </div>
</nav>
