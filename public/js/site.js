



document.addEventListener('DOMContentLoaded', function() {
    // التحكم في زر القائمة في التنقل
    const button = document.querySelector('nav button');
    const navbar = document.getElementById('navbar-default');

    button.addEventListener('click', function() {
        const isExpanded = button.getAttribute('aria-expanded') === 'true';
        button.setAttribute('aria-expanded', !isExpanded);
        navbar.classList.toggle('show');
    });

    // تبديل الوضع بين الداكن والفاتح
    function toggleTheme() {
        document.body.classList.toggle('dark-theme');
        const themeIcon = document.getElementById('themeIcon');
        if (document.body.classList.contains('dark-theme')) {
            themeIcon.textContent = '🌙'; // تغيير الأيقونة إلى القمر في الوضع الداكن
        } else {
            themeIcon.textContent = '☀️'; // تغيير الأيقونة إلى الشمس في الوضع الفاتح
        }
    }

    // ربط زر تبديل الوضع بالوظيفة
    document.getElementById('themeIcon')?.addEventListener('click', toggleTheme);

    // التحكم في القائمة المتحركة عند التمرير
    document.addEventListener('scroll', function() {
        const nav = document.querySelector('header nav');
        if (window.scrollY > 50) {
            nav.classList.add('scrolled');
        } else {
            nav.classList.remove('scrolled');
        }
    });

    // عرض قائمة المستخدم عند تسجيل الدخول
    document.getElementById('userMenuToggle')?.addEventListener('click', function(event) {
        event.preventDefault();
        const userMenu = document.getElementById('userMenu');
        userMenu.style.display = userMenu.style.display === 'none' ? 'block' : 'none';
    });


    // تفعيل مكتبة GLightbox
    const lightbox = GLightbox();

    // عرض الصور المصغرة في المعرض الرئيسي عند النقر عليها
    document.querySelectorAll('.property-gallery img').forEach(img => {
        img.addEventListener('click', function () {
            document.querySelector('.property-main img').src = this.src;
        });
    });
});



