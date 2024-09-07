{{--<!-- نافذة تسجيل الدخول المنبثقة -->--}}
{{--<div id="popup">--}}
{{--    <div class="popup-content">--}}
{{--        <div class="container">--}}
{{--            <div class="row justify-content-center">--}}
{{--                <div class="col-md-8">--}}
{{--                    <div class="card">--}}
{{--                        <span class="close">&times;</span>--}}
{{--                        <div class="card-header">تسجيل الدخول</div>--}}
{{--                        <div class="card-body">--}}
{{--                            <form method="POST" action="{{ route('login') }}">--}}
{{--                                @csrf--}}

{{--                                <div class="row mb-3">--}}
{{--                                    <label for="email" class="col-md-4 col-form-label text-md-end">البريد الإلكتروني</label>--}}

{{--                                    <div class="col-md-6">--}}
{{--                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

{{--                                        @error('email')--}}
{{--                                            <span class="invalid-feedback" role="alert">--}}
{{--                                                <strong>{{ $message }}</strong>--}}
{{--                                            </span>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="row mb-3">--}}
{{--                                    <label for="password" class="col-md-4 col-form-label text-md-end">كلمة المرور</label>--}}

{{--                                    <div class="col-md-6">--}}
{{--                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

{{--                                        @error('password')--}}
{{--                                            <span class="invalid-feedback" role="alert">--}}
{{--                                                <strong>{{ $message }}</strong>--}}
{{--                                            </span>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="row mb-3">--}}
{{--                                    <div class="col-md-6 offset-md-4">--}}
{{--                                        <div class="form-check">--}}
{{--                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                                            <label class="form-check-label" for="remember">--}}
{{--                                                تذكرني--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="row mb-0">--}}
{{--                                    <div class="col-md-8 offset-md-4">--}}
{{--                                        <button type="submit" class="btn btn-primary">--}}
{{--                                            تسجيل الدخول--}}
{{--                                        </button>--}}

{{--                                        @if (Route::has('password.request'))--}}
{{--                                            <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                                نسيت كلمة المرور؟--}}
{{--                                            </a>--}}
{{--                                        @endif--}}

{{--                                        <a class="btn btn-link" href="{{ route('register') }}">--}}
{{--                                            ليس لديك حساب؟ سجل هنا--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{----}}




<div id="popup" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="absolute inset-0 bg-gray-900 opacity-50"></div>
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md z-10 relative">
        <button class="absolute top-3 right-3 text-gray-600 hover:text-gray-800" onclick="togglePopup()">&times;</button>
        <h2 class="text-2xl font-bold text-center mb-6">تسجيل الدخول</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2 text-right">البريد الإلكتروني</label>
                <input id="email" type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 text-center leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <p class="text-red-500 text-xs italic mt-2 text-right">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2 text-right">كلمة المرور</label>
                <input id="password" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 text-center leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror" name="password" required autocomplete="current-password">
                @error('password')
                <p class="text-red-500 text-xs italic mt-2 text-right">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <input class="form-check-input h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="ml-2 block text-sm text-gray-900" for="remember">
                        تذكرني
                    </label>
                </div>
                @if (Route::has('password.request'))
                    <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('password.request') }}">
                        نسيت كلمة المرور؟
                    </a>
                @endif
            </div>

            <div class="mb-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full focus:outline-none focus:shadow-outline">
                    تسجيل الدخول
                </button>
            </div>

            <div class="text-center">
                <a class="text-blue-500 hover:text-blue-800 text-sm" href="{{ route('register') }}">
                    ليس لديك حساب؟ سجل هنا
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    function togglePopup() {
        var popup = document.getElementById('popup');
        popup.classList.toggle('hidden');
    }
</script>
