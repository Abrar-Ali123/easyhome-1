function toggleLoginPopup() {
    const loginPopup = document.getElementById('loginPopup');
    loginPopup.classList.toggle('hidden');
}

document.querySelectorAll('a').forEach(link => {
    if (link.href.includes('/home/')) {
        link.addEventListener('click', function(event) {
            event.preventDefault();

            fetch(link.href, {
                method: 'GET',
                credentials: 'same-origin'
            })
            .then(response => {
                if (response.status === 403) {
                    // عرض نافذة تسجيل الدخول فقط إذا كانت الاستجابة 403
                    toggleLoginPopup();
                } else if (response.ok) {
                    // تنفيذ الإجراء المناسب للمستخدم المسجل (مثل الانتقال إلى الرابط)
                    window.location.href = link.href; // أو أي إجراء آخر مناسب
                } else {
                    console.error('An error occurred.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                console.error('A network error occurred.');
            });
        });
    }
});
