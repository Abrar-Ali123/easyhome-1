
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-ERGXL670NG"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-ERGXL670NG');
</script>

<header>
        <nav>
            <div>
            <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('/images/9.png') }}" class="w-20 h-20" />
        </a>
        <button type="button" aria-controls="navbar-default" aria-expanded="false" id="toggle-navbar">

</button>


<style>

    /* تنسيق النافبار */
    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
         color: #fff;
    }

    .navbar h1 {
        font-size: 1.5rem;
        margin: 0;
    }

    .navbar ul {
        display: flex;
        list-style: none;
        gap: 20px;
    }

    .navbar ul li {
        font-size: 1rem;
    }

    .navbar ul li a {
        color: #fff;
        text-decoration: none;
    }

    /* زر البداية */
    .btn-started {
        padding: 10px 20px;
         color: #fff;
        border-radius: 20px;
        text-decoration: none;
    }

    /* إعدادات للعرض على الأجهزة الصغيرة */
    .menu-toggle {
        display: none;
        font-size: 1.5rem;
        cursor: pointer;
    }

    /* لإخفاء القائمة عند تصغير الشاشة */
    .navbar ul {
        flex-direction: row;
    }

    @media (max-width: 768px) {
        .navbar ul {
            display: none;
            position: absolute;
            top: 70px;
            left: 0;
            width: 100%;
             flex-direction: column;
            padding: 20px;
            gap: 15px;
        }

        .navbar ul.show {
            display: flex;
        }

        .menu-toggle {
            display: block;
        }
    }
  </style>
  </head>

  <div class="navbar">
   <span class="menu-toggle" onclick="toggleMenu()">☰</span>
  <ul>
    <li><a href="#">Home</a></li>
    <li><a href="#">About</a></li>
    <li><a href="#">Services</a></li>
    <li><a href="#">Contact</a></li>
    <li><a href="#" class="btn-started">Get Started</a></li>
  </ul>
  </div>

  <script>
  function toggleMenu() {
    document.querySelector('.navbar ul').classList.toggle('show');
  }
  </script>



            </div>
        </nav>

    </header>
