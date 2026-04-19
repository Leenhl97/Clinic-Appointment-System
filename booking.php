<?php 
include 'header.php'; 
include 'db_connect.php'; 

// 1. استلام اسم الطبيب من الرابط (URL) إذا كان موجوداً
$selected_doctor = isset($_GET['doctor_name']) ? $_GET['doctor_name'] : '';

// 2. جلب قائمة الأطباء من قاعدة البيانات لعرضهم في القائمة المنسدلة
$sql = "SELECT name, specialization FROM doctors";
$result = mysqli_query($conn, $sql);
?>

<main>
    <h2>Book an Appointment</h2>
    <form id="bookingForm" action="insert_booking.php" method="POST">
        <label for="fullName">Full Name:</label>
        <input type="text" id="fullName" name="fullName" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="doctor">Select Doctor:</label>
        <select id="doctor" name="doctor" required>
            <option value="">--Choose a Doctor--</option>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    // التحقق ما إذا كان هذا الطبيب هو الذي تم اختياره من الصفحة السابقة
                    $is_selected = ($row['name'] == $selected_doctor) ? 'selected' : '';
                    
                    echo "<option value='" . $row['name'] . "' $is_selected>" . 
                         $row['name'] . " (" . $row['specialization'] . ")" . 
                         "</option>";
                }
            }
            ?>
        </select>

        <label for="appDate">Appointment Date:</label>
        <input type="date" id="appDate" name="appDate" required>

        <button type="submit">Confirm Booking</button>
    </form>
</main>

<?php include 'footer.php'; ?>