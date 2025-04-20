<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - {{ config('app.name') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="bg-gray-800 text-white w-64 flex-shrink-0">
            <div class="p-4 font-bold text-xl flex items-center border-b border-gray-700">
                <i class="fas fa-user-shield mr-3"></i>
                <span>Admin Panel</span>
            </div>
            <nav class="mt-4">
                <a href="{{ route('admin.dashboard') }}" class="block py-3 px-4 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-900' : 'hover:bg-gray-700' }} transition-colors duration-200">
                    <i class="fas fa-tachometer-alt mr-3"></i> Dashboard
                </a>
                <a href="{{ route('admin.profile.index') }}" class="block py-3 px-4 {{ request()->routeIs('admin.profile.*') ? 'bg-gray-900' : 'hover:bg-gray-700' }} transition-colors duration-200">
                    <i class="fas fa-user mr-3"></i> Profile
                </a>
                <a href="{{ route('admin.portfolio.index') }}" class="block py-3 px-4 {{ request()->routeIs('admin.portfolio.*') ? 'bg-gray-900' : 'hover:bg-gray-700' }} transition-colors duration-200">
                    <i class="fas fa-briefcase mr-3"></i> Portfolio
                </a>
                <a href="{{ route('admin.blog.index') }}" class="block py-3 px-4 {{ request()->routeIs('admin.blog.*') ? 'bg-gray-900' : 'hover:bg-gray-700' }} transition-colors duration-200">
                    <i class="fas fa-blog mr-3"></i> Blog
                </a>
                <a href="{{ route('admin.social-media.index') }}" class="block py-3 px-4 {{ request()->routeIs('admin.social-media.*') ? 'bg-gray-900' : 'hover:bg-gray-700' }} transition-colors duration-200">
                    <i class="fas fa-share-alt mr-3"></i> Social Media
                </a>
                <div class="border-t border-gray-700 my-4"></div>
                <form method="POST" action="{{ url('logout') }}" class="px-4">
                    @csrf
                    <button type="submit" class="w-full text-left py-3 px-4 hover:bg-red-600 transition-colors duration-200 rounded">
                        <i class="fas fa-sign-out-alt mr-3"></i> Logout
                    </button>
                </form>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Header -->
            <header class="bg-white shadow-sm h-16 flex items-center justify-between px-6">
                <div class="flex items-center">
                    <h2 class="text-xl font-semibold text-gray-800">@yield('header', 'Dashboard')</h2>
                </div>
                <div class="flex items-center">
                    <span class="text-gray-700 mr-2">{{ auth()->user()->name }}</span>
                    <div class="w-8 h-8 rounded-full bg-gray-300 flex items-center justify-center text-gray-700">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
                @if(session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                        <p>{{ session('success') }}</p>
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                        <p>{{ session('error') }}</p>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
