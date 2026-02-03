<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        {{-- LOGO --}}
        <a href="{{ route('home') }}" class="text-xl font-bold text-indigo-600">
            PC ACCESSORY SHOP
        </a>

        {{-- MENU --}}
        <nav class="flex gap-6 items-center">
            <a href="{{ route('home') }}" class="hover:text-indigo-600">
                Trang chủ
            </a>

            <a href="{{ route('news.index') }}" class="hover:text-indigo-600">
                Sản phẩm
            </a>

            <a href="{{ route('cart.index') }}" class="hover:text-indigo-600">
                Giỏ hàng
            </a>

            {{-- USER: xem đơn --}}
            @auth
                <a href="{{ route('orders.my') }}" class="hover:text-indigo-600">
                    Đơn hàng của tôi
                </a>
            @endauth

            {{-- ADMIN --}}
            @auth
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.orders.index') }}"
                       class="text-red-600 font-semibold hover:underline">
                        Quản lý đơn
                    </a>
                @endif
            @endauth
        </nav>

        {{-- SEARCH --}}
<form action="{{ route('news.search') }}" method="GET" class="flex items-center gap-2">
    <input
        type="text"
        name="q"
        value="{{ request('q') }}"
        placeholder="Tìm sản phẩm..."
        class="border rounded-lg px-3 py-1 text-sm focus:outline-none focus:ring focus:ring-indigo-300"
    >
    <button
        type="submit"
        class="bg-indigo-600 text-white px-3 py-1 rounded-lg text-sm hover:bg-indigo-700">
        🔍
    </button>
</form>


        {{-- AUTH --}}
        <div class="flex gap-4 items-center">
            @auth
                <span class="text-sm text-gray-600">
                    👋 {{ auth()->user()->name }}
                </span>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="text-red-500 text-sm hover:underline">
                        Đăng xuất
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}"
                   class="text-indigo-600 text-sm hover:underline">
                    Đăng nhập
                </a>

                <a href="{{ route('register') }}"
                   class="text-green-600 text-sm hover:underline">
                    Đăng ký
                </a>
            @endauth
        </div>
    </div>
</header>
