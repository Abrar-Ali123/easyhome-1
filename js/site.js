document.addEventListener('DOMContentLoaded', function () {
    // دالة لعرض نافذة تسجيل الدخول المنبثقة
    function showLoginPopup() {
        var popup = document.getElementById('popup');
        if (popup) {
            popup.classList.remove('hidden'); // إزالة الكلاس hidden لعرض النافذة
            popup.style.display = 'flex'; // التأكد من عرض النافذة كفليكس
        } else {
            console.error('العنصر #popup غير موجود في DOM.');
        }
    }

    // إعداد جلوبال لـ AJAX للتعامل مع الاستجابات بحالة 401 (غير مصرح)
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        statusCode: {
            401: function (response) {
                if (response.responseJSON && response.responseJSON.auth_required) {
                    showLoginPopup(); // عرض النافذة المنبثقة لتسجيل الدخول
                }
            }
        }
    });

    // تحويل الروابط المحمية لإرسال طلبات عبر Fetch API
    document.addEventListener('click', function(event) {
        var target = event.target.closest('a'); // إيجاد الرابط الأقرب من العنصر
        if (target && target.getAttribute('href') && target.getAttribute('href').startsWith('/')) {
            event.preventDefault(); // منع السلوك الافتراضي للنقر على الرابط
            fetch(target.getAttribute('href'), {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
            })
            .then(response => {
                if (response.status === 401) {
                    return response.json().then(data => {
                        if (data.auth_required) {
                            showLoginPopup(); // عرض النافذة المنبثقة لتسجيل الدخول
                        }
                    });
                } else {
                    return response.json(); // في حالة النجاح، يمكن معالجة البيانات هنا
                }
            })
            .catch(error => {
                console.error('Error:', error); // معالجة أي أخطاء في الطلب
            });
        }
    });

    // دالة لتبديل ظهور واختفاء النافذة المنبثقة
    window.togglePopup = function() {
        var popup = document.getElementById('popup');
        popup.classList.toggle('hidden');
    };
});
