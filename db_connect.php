<?php
$servername = "localhost:3307"; // 
$username = "root";
$password = "";
$dbname = "clinic_db";

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// الاتصال ناجح!
?>