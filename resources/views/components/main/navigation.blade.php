<nav class="relative bg-blue-400 px-1 md:px-4">
    <div class="hidden md:flex items-center justify-between">
        <div class="p-4">
            <a href="{{ route('home') }}" class="text-white hover:bg-blue-500 hover:bg-opacity-50 p-4 {{ request()->routeIs('home') ? 'bg-blue-900 bg-opacity-50' : '' }}">Home</a>
        </div>

        <div>
            <a href="{{ route('login') }}" class="text-white hover:bg-blue-500 hover:bg-opacity-50 p-4 {{ request()->routeIs('login') ? 'bg-blue-900 bg-opacity-50' : '' }}">Login</a>
            <a href="{{ route('register') }}" class="text-white hover:bg-blue-500 hover:bg-opacity-50 p-4 {{ request()->routeIs('register') ? 'bg-blue-900 bg-opacity-50' : '' }}">Register</a>
        </div>
    </div>

    <!-- Responsive -->

    <div class="block md:hidden">
        <div class="flex items-center justify-between">
            <div class="p-4">
                <a href="{{ route('home') }}" class="text-white font-semibold text-sm hover:bg-blue-500 hover:bg-opacity-50 p-4 {{ request()->routeIs('home') ? 'bg-blue-900 bg-opacity-50' : '' }}">
                    SimPro
                </a>
            </div>

            <div x-data="dropdown()">
                <button @click="open">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <div x-show="isOpen()" @click.away="close" class="absolute shadow border top-16 right-0 bg-blue-300 rounded-l-lg z-10">
                    <div class="flex flex-col">
                        <a href="{{ route('login') }}" class="text-white hover:bg-blue-500 hover:bg-opacity-50 rounded-tl-lg p-4 {{ request()->routeIs('login') ? 'bg-blue-900 bg-opacity-50' : '' }}">Login</a>
                        <a href="{{ route('register') }}" class="text-white hover:bg-blue-500 hover:bg-opacity-50 rounded-bl-lg p-4 {{ request()->routeIs('register') ? 'bg-blue-900 bg-opacity-50' : '' }}">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
