
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-ERGXL670NG"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-ERGXL670NG');
  </script>

  <style>

    header {
       color: white;
      padding: 10px 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .navbar ul {
      list-style: none;
      display: flex;
      margin: 0;
      padding: 0;
      gap: 15px;
    }

    .navbar ul li a {
      color: white;
      text-decoration: none;
      padding: 8px 15px;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    .navbar ul li a:hover {
      background-color: rgba(255, 255, 255, 0.2);
    }

    .menu-toggle {
      display: none;
      font-size: 1.5rem;
      color: white;
      background: none;
      border: none;
      cursor: pointer;
    }

    .user-info {
      position: relative;
      display: flex;
      align-items: center;
      gap: 10px;
      cursor: pointer;
    }

    .avatar {
      width: 40px;
      height: 40px;
      border-radius: 50%;
    }

    .dropdown-menu {
      display: none;
      position: absolute;
      top: 50px;
      right: 0;
      background-color: white;
      color: #333;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      min-width: 150px;
      padding: 10px;
    }

    .dropdown-menu a {
      display: block;
      padding: 10px;
      text-decoration: none;
      color: #333;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    .dropdown-menu a:hover {
      background-color: #f0f0f0;
    }

    .dropdown-menu.show {
      display: block;
    }

    @media (max-width: 768px) {
      .menu-toggle {
        display: block;
      }

      .navbar ul {
        display: none;
        flex-direction: column;
        background-color: #003e37;
        position: absolute;
        top: 60px;
        right: 0;
        width: 100%;
        padding: 15px;
      }

      .navbar ul.show {
        display: flex;
      }

      .navbar ul li {
        text-align: center;
      }
    }
  </style>
 <a href="https://wa.me/966551421008?text=مرحبا، أحتاج إلى مساعدة" target="_blank" style="position: fixed; bottom: 20px; right: 20px; background-color: #003e37; color: white; border-radius: 50%; width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; text-decoration: none; box-shadow: 0px 4px 8px rgba(0,0,0,0.2); z-index: 9999;">
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" viewBox="0 0 16 16">
        <path d="M13.601 2.326A7.875 7.875 0 0 0 8.013.004a7.876 7.876 0 0 0-6.135 12.88L.1 15.953a.554.554 0 0 0 .638.777l3.186-.96a7.877 7.877 0 0 0 4.09 1.168h.003a7.877 7.877 0 0 0 5.586-13.612ZM8.013 14.32a6.45 6.45 0 0 1-3.524-1.043l-.252-.158-2.362.71.732-2.303-.164-.238a6.45 6.45 0 1 1 5.57 3.032Zm3.544-4.821c-.196-.1-1.164-.574-1.344-.637-.18-.062-.312-.095-.443.1-.13.196-.508.637-.623.768-.115.13-.23.146-.426.047-.196-.1-.828-.305-1.577-.974-.583-.519-.976-1.161-1.09-1.357-.115-.196-.012-.302.086-.402.089-.088.196-.23.294-.344.097-.114.13-.196.195-.327.065-.13.033-.244-.016-.344-.05-.1-.444-1.071-.61-1.473-.16-.386-.323-.336-.443-.342-.115-.005-.245-.006-.376-.006a.727.727 0 0 0-.53.244c-.18.196-.7.684-.7 1.671s.716 1.935.814 2.067c.097.13 1.404 2.14 3.402 3.003.476.206.847.329 1.136.422.477.152.912.131 1.257.08.384-.058 1.164-.474 1.33-.93.164-.456.164-.846.115-.93-.05-.084-.18-.13-.376-.23Z"/>
    </svg>
</a>




<header>


  <nav class="navbar">
    <button class="menu-toggle" onclick="toggleMenu()">☰</button>
    <ul>
      <li><a href="{{ url('/') }}">الرئيسية</a></li>
      <li><a href="{{ route('blog.index') }}">مدونتنا</a></li>
      <li><a href="{{ route('contact.page2') }}">إنجاز</a></li>
      <li><a href="{{ route('contact.page1') }}">تواصل معنا</a></li>

      @if(Auth::check())
        <li class="user-info" onclick="toggleDropdown()">

        @if (Auth::user()->avatar)

 @else
 <i class="fa fa-user-circle avatar-icon" aria-hidden="true"></i>

    <i class="fa fa-user-circle avatar-icon" aria-hidden="true"></i>
@endif

        <div class="dropdown-menu" id="dropdown-menu">
            <a href="#">الملف الشخصي</a>
            <a href="{{ route('logout') }}">تسجيل الخروج</a>
            @if(Auth::user()->role == 0)
    <a href="{{ route('dashboard.index') }}">لوحة التحكم</a>
@endif

          </div>
        </li>
      @else
        <li>
          <a href="{{ route('login') }}">
          <i class="fa fa-user-circle avatar-icon" aria-hidden="true"></i>

           </a>
        </li>
      @endif
    </ul>
    <img src="{{ asset('/images/9.png') }}">

  </nav>
</header>

<script>
  function toggleMenu() {
    document.querySelector('.navbar ul').classList.toggle('show');
  }

  function toggleDropdown() {
    document.getElementById('dropdown-menu').classList.toggle('show');
  }

  document.addEventListener('click', function (event) {
    var dropdown = document.getElementById('dropdown-menu');
    if (!event.target.closest('.user-info')) {
      dropdown.classList.remove('show');
    }
  });
</script>

