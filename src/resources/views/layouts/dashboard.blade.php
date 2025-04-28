<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel Inventory') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans antialiased">
    <div class="flex h-screen" x-data="{ sidebarOpen: false }">

        <!-- Sidebar -->
        <div :class="sidebarOpen ? 'block' : 'hidden'" class="fixed z-30 inset-y-0 left-0 w-64 bg-white border-r shadow-md overflow-y-auto lg:block">
            <div class="p-4 text-xl font-bold border-b">
                Inventory System
            </div>
            <nav class="p-4 space-y-2">
                <a href="#" class="block px-4 py-2 rounded hover:bg-gray-200">Dashboard</a>
                <a href="#" class="block px-4 py-2 rounded hover:bg-gray-200">Add Product</a>
                <a href="#" class="block px-4 py-2 rounded hover:bg-gray-200">Manage Products</a>
                <a href="#" class="block px-4 py-2 rounded hover:bg-gray-200">Categories</a>
                <a href="#" class="block px-4 py-2 rounded hover:bg-gray-200">Brands</a>
            </nav>
        </div>

        <!-- Main content area -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top nav -->
            <header class="bg-white shadow p-4 flex items-center justify-between">
    <!-- Sidebar toggle (mobile) -->
    <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden text-gray-600 focus:outline-none">
        ☰
    </button>

    <!-- Page Title -->
    <h1 class="text-xl font-semibold">Dashboard</h1>

    <!-- User Dropdown -->
    <div class="relative" x-data="{ userMenuOpen: false }">
        <button @click="userMenuOpen = !userMenuOpen" class="flex items-center gap-2 focus:outline-none">
            <img src="https://ui-avatars.com/api/?name=Test+User&background=random&color=fff" 
                alt="User Avatar" 
                class="w-8 h-8 rounded-full border-2 border-gray-300" />
            <span class="hidden sm:inline-block font-medium text-gray-700">{{ Auth::user()->name ?? 'Test User' }}</span>
            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M19 9l-7 7-7-7" />
            </svg>
        </button>

        <!-- Dropdown -->
        <div 
            x-show="userMenuOpen" 
            @click.away="userMenuOpen = false" 
            x-transition
            class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg overflow-hidden z-20"
        >
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button 
                    type="submit" 
                    class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition"
                >
                    🚪 Logout
                </button>
            </form>
        </div>
    </div>
</header>



            <!-- Page content -->
            <main class="flex-1 overflow-y-auto p-6 bg-gray-100">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>
