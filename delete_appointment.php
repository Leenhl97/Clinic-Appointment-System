<?php
// 1. الاتصال بقاعدة البيانات
include 'db_connect.php';

// 2. التأكد من وجود id في الرابط
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // 3. أمر الحذف من الجدول
    $sql = "DELETE FROM appointments WHERE id = $id";

    // 4. تنفيذ الأمر والتحقق
    if ($conn->query($sql) === TRUE) {
        // رسالة تأكيد بالإنجليزية ثم العودة لصفحة التاريخ
        echo "<script>
                alert('Appointment cancelled successfully! ✅');
                window.location.href = 'history.php';
              </script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// 5. إغلاق الاتصال
$conn->close();
?>