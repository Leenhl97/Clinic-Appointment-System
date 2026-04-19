<?php
// 1. استدعاء ملف الاتصال (تأكدي أن ملف db_connect.php يحتوي على localhost:3307)
include 'db_connect.php';

// 2. استلام البيانات من النموذج
$patientName = $_POST['fullName'];
$patientEmail = $_POST['email'];
$doctorName  = $_POST['doctor'];
$appointmentDate = $_POST['appDate'];

// 3. تجهيز أمر الحفظ (SQL)
$sql = "INSERT INTO appointments (patient_name, email, doctor_name, app_date) 
        VALUES ('$patientName', '$patientEmail', '$doctorName', '$appointmentDate')";

// 4. تنفيذ الأمر والتأكد من النجاح
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Booking Successful!'); window.location.href='history.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// 5. إغلاق الاتصال
$conn->close();
?>