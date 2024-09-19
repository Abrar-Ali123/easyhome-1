


<header>
        <nav>
            <div>
            <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('/images/9.png') }}" class="w-20 h-20" />
        </a>
                <button type="button" aria-controls="navbar-default" aria-expanded="false">
                    <span class="sr-only">افتح القائمة</span>
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
                <div id="navbar-default">
                    <ul>

                        <li><a href="#">الرئيسية</a></li>
                        <li><a href="#">العقارات</a></li>
                        <li><a href="#">من نحن</a></li>
                        <li><a href="{{ route('request.product.form') }}">اطلب عقارك</a></li>

                        <li>
                            @guest
                                <a id="openPopup"><i class="fas fa-user"></i></a>
                            @else
                                <a href="#" id="userMenuToggle" style="display: flex; align-items: center;">
                                    <img src="{{ Auth::user()->avatar }}" alt="صورة المستخدم" style="width: 30px; height: 30px; border-radius: 50%; margin-right: 5px;">
                                    <span>{{ Auth::user()->name }}</span>
                                </a>
                                <ul id="userMenu" class="dropdown-menu" style="display: none; position: absolute; background-color: white; list-style: none; padding: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                                    <li>
                                        <a class="dropdown-item" href="#">الملف الشخصي</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            تسجيل الخروج
                                        </a>
                                    </li>
                                </ul>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="logout-form d-none">
    @csrf
</form>

                            @endguest
                        </li>

                        <li>
                             <a class="toggle-theme-btn" onclick="toggleTheme()" id="themeIcon">☀️</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
