<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>PC ACCESSORY SHOP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<!-- HEADER -->
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <a href="{{ route('news.index') }}" class="text-2xl font-bold text-blue-600">
            PC ACCESSORY SHOP
        </a>

        <nav class="flex items-center space-x-6">
            <a href="{{ route('news.index') }}" class="text-gray-700 hover:text-blue-600">
                Sản phẩm
            </a>

            <a href="{{ route('cart.index') }}" class="text-gray-700 hover:text-blue-600">
                Giỏ hàng
            </a>

            @auth
                <span class="text-gray-600">
                    {{ auth()->user()->name }}
                </span>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="text-red-500 hover:underline">
                        Đăng xuất
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}"
                   class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Đăng nhập
                </a>
            @endauth
        </nav>
    </div>
</header>

<!-- CONTENT -->
<main class="max-w-7xl mx-auto px-6 py-8">
    @yield('content')
</main>

<!-- FOOTER -->
<footer class="bg-white border-t mt-10">
    <div class="text-center py-4 text-gray-500">
        © 2026 - Website bán phụ kiện máy tính (Laravel)
    </div>
</footer>

</body>
</html>
