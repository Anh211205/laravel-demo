@extends('layouts.myapp')

@section('title', 'Đăng nhập')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">

    <div class="w-full max-w-4xl bg-white rounded-xl shadow-lg overflow-hidden grid grid-cols-1 md:grid-cols-2">

        {{-- LEFT: BRANDING --}}
        <div class="hidden md:flex flex-col justify-center items-center bg-gradient-to-br from-indigo-500 to-blue-600 text-white p-10">
            <h2 class="text-3xl font-bold mb-4">PC ACCESSORY SHOP</h2>
            <p class="text-sm text-center opacity-90 mb-6">
                Nền tảng mua sắm hiện đại<br>
                Đăng ký dễ dàng – Mua sắm hiệu quả
            </p>

            <ul class="text-sm space-y-2 opacity-90">
                <li>✔ Giao diện hiện đại</li>
                <li>✔ Thanh toán tiện lợi</li>
                <li>✔ Bảo mật tuyệt đối</li>
            </ul>
        </div>

        {{-- RIGHT: LOGIN FORM --}}
        <div class="p-10">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">
                Chào mừng trở lại!
            </h2>
            <p class="text-sm text-gray-500 mb-6">
                Đăng nhập để tiếp tục
            </p>

            {{-- ERROR --}}
            @if ($errors->any())
                <div class="mb-4 text-sm text-red-500">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <div>
                    <input
                        type="email"
                        name="email"
                        placeholder="Email"
                        required
                        class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    >
                </div>

                <div>
                    <input
                        type="password"
                        name="password"
                        placeholder="Mật khẩu"
                        required
                        class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    >
                </div>

                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="remember" class="rounded">
                        Ghi nhớ đăng nhập
                    </label>

                    <a href="{{ route('password.request') }}" class="text-indigo-600 hover:underline">
                        Quên mật khẩu?
                    </a>
                </div>

                <button
                    type="submit"
                    class="w-full bg-indigo-600 text-white py-3 rounded-lg hover:bg-indigo-700 transition"
                >
                    Đăng nhập
                </button>
            </form>

            <p class="text-sm text-center text-gray-500 mt-6">
                Chưa có tài khoản?
                <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">
                    Đăng ký ngay
                </a>
            </p>
        </div>

    </div>
</div>
@endsection
