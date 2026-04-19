// --- 1. برمجة الوضع الليلي (Dark Mode) ---
const themeBtn = document.getElementById('theme-toggle');

if (themeBtn) {
    themeBtn.addEventListener('click', function() {
        // تبديل الفئة dark-theme الموجودة في ملف الـ CSS
        document.body.classList.toggle('dark-theme');
        
        // تغيير نص الزر حسب الوضع
        if (document.body.classList.contains('dark-theme')) {
            themeBtn.textContent = "Change Mode ☀️";
        } else {
            themeBtn.textContent = "Change Mode 🌙";
        }
    });
}

// --- 2. التحقق من نموذج الحجز (Booking Validation) ---
const bookingForm = document.getElementById('bookingForm');

if (bookingForm) {
    bookingForm.addEventListener('submit', function(event) {
        let errors = [];
        
        const fullName = document.getElementById('fullName').value.trim();
        const email = document.getElementById('email').value.trim();
        const doctor = document.getElementById('doctor').value;
        const appDate = document.getElementById('appDate').value;

        // التحقق من الحقول الفارغة
        if (fullName === "") errors.push("Full Name is required.");
        
        // التحقق من صيغة البريد الإلكتروني
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email === "") {
            errors.push("Email is required.");
        } else if (!emailPattern.test(email)) {
            errors.push("Please enter a valid email address.");
        }

        if (doctor === "") errors.push("Please select a doctor.");
        if (appDate === "") errors.push("Please select a date.");

        // عرض الأخطاء في رسالة واحدة (Popup) كما هو مطلوب
        if (errors.length > 0) {
            event.preventDefault(); // منع إرسال النموذج
            alert("Errors:\n" + errors.join("\n"));
        }
    });
}