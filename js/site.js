// حفظ الـ fetch الأصلي في متغير
const originalFetch = window.fetch;

// إعادة تعريف fetch للتعامل مع الأخطاء عبر جميع الروابط
window.fetch = function(url, options) {
    return originalFetch(url, options)
        .then(response => {
            // إذا كان هناك خطأ 403 (ليس مصرح له)
            if (response.status === 403) {
                return response.json().then(data => {
                    // عرض رسالة الخطأ أو التعامل معها
                    alert(data.error); // يمكنك تعديل هذا حسب حاجتك، مثل عرض الرسالة في عنصر HTML معين
                    // يمكن أيضاً رفض الـ Promise لتجنب استمرار المعالجة في أماكن أخرى
                    return Promise.reject(data);
                });
            }
            // تمرير الاستجابة العادية إذا لم يكن هناك خطأ
            return response;
        })
        .catch(error => {
            // معالجة الأخطاء العامة، مثل مشاكل الاتصال أو مشاكل في الـ Fetch نفسه
            console.error('Fetch error:', error);
            // يمكنك عرض رسالة عامة للمستخدم أو التعامل مع الأخطاء بشكل مخصص
        });
};
