<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles and Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">

<div class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md">
        <div class="h-16 flex items-center justify-center font-bold text-lg border-b">
            Inventory Management
        </div>
        <nav class="p-4 flex flex-col space-y-2">
            <a href="{{ route('dashboard') }}" class="block py-2 px-4 rounded hover:bg-gray-200 {{ request()->is('dashboard') ? 'bg-gray-200 font-semibold' : '' }}">
                Dashboard
            </a>
            <a href="{{ route('products.index') }}" class="block py-2 px-4 rounded hover:bg-gray-200 {{ request()->is('products*') ? 'bg-gray-200 font-semibold' : '' }}">
                Products
            </a>
            <a href="#" class="block py-2 px-4 rounded hover:bg-gray-200">
                Purchase History
            </a>
            <form method="POST" action="{{ route('logout') }}" class="mt-auto">
                @csrf
                <button type="submit" class="w-full text-left py-2 px-4 hover:bg-gray-200">
                    Logout
                </button>
            </form>
        </nav>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col">
        <!-- Top Bar -->
        <header class="h-16 bg-white shadow flex items-center justify-end px-6">
            <div class="text-gray-700">Admin</div>
        </header>

        <!-- Page Content -->
        <main class="flex-1 p-6">
            {{ $slot }}
        </main>
    </div>
</div>

</body>
</html>