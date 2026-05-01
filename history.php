<main>
    <?php include 'header.php'; ?>
    <h2>Your Appointment History</h2>
    
    <table border="1">
        <thead>
            <tr>
                <th>Patient Name</th>
                <th>Doctor</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
    <?php
    include 'db_connect.php';
    
    // جلب المواعيد من قاعدة البيانات (Select Query)
    $sql = "SELECT * FROM appointments";
    $result = $conn->query($sql);

    // التأكد من وجود بيانات
    if ($result->num_rows > 0) {
        // عرض كل صف من البيانات
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['patient_name'] . "</td>";
            echo "<td>" . $row['doctor_name'] . "</td>";
            echo "<td>" . $row['app_date'] . "</td>";
            echo "<td>
                    <!-- رابط التعديل الجديد (Update requirement) -->
                    <a href='edit_appointment.php?id=" . $row['id'] . "' style='color: blue; margin-right: 10px;'>Edit Date</a> 
                    | 
                    <!-- رابط الحذف (Delete requirement) -->
                    <a href='delete_appointment.php?id=" . $row['id'] . "' style='color: red; margin-left: 10px;'>Cancel</a>
                  </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No appointments found</td></tr>";
    }
    $conn->close();
    ?>
    </tbody>
    </table>
</main>
<?php include 'footer.php'; ?>