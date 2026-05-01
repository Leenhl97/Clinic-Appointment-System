<?php
include 'db_connect.php';

// جلب بيانات الموعد المراد تعديله
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    // تأكدي من استخدام id هنا
    $res = mysqli_query($conn, "SELECT * FROM appointments WHERE id=$id");
    $data = mysqli_fetch_assoc($res);
}

// تنفيذ عملية التعديل عند الضغط على الزر
if(isset($_POST['update'])) {
    $new_date = $_POST['newDate'];
    $id = $_POST['appointment_id'];
    
    // الحل هنا: تم تغيير اسم العمود من appointment_date إلى app_date ليطابق قاعدة بياناتك
    $sql = "UPDATE appointments SET app_date='$new_date' WHERE id=$id";
    
    if(mysqli_query($conn, $sql)) {
        echo "<script>alert('Updated successfully!'); window.location.href='history.php';</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<h2>Edit Appointment Date</h2>
<form method="POST">
    <!-- تأكدي أن الاسم هنا appointment_id ليطابق الكود أعلاه -->
    <input type="hidden" name="appointment_id" value="<?php echo $data['id']; ?>">
    
    <label>Current Date: <?php echo $data['app_date']; ?></label><br><br>
    
    <label>Select New Date:</label>
    <input type="date" name="newDate" required>
    
    <button type="submit" name="update">Update Appointment</button>
</form>