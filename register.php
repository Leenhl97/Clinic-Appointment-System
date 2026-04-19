<?php
include 'header.php';
include 'db_connect.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password']; // سنخزنها كما هي الآن للتبسيط

    // التأكد من أن الإيميل غير موجود مسبقاً
    $checkEmail = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $checkEmail);

    if (mysqli_num_rows($result) > 0) {
        $message = "<p style='color:red;'>This email is already registered!</p>";
    } else {
        // إضافة المستخدم الجديد
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if (mysqli_query($conn, $sql)) {
            $message = "<p style='color:green;'>Registration successful! <a href='login.php'>Login here</a></p>";
        } else {
            $message = "<p style='color:red;'>Error: " . mysqli_error($conn) . "</p>";
        }
    }
}
?>

<style>
    .register-container {
        max-width: 400px;
        margin: 50px auto;
        padding: 30px;
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        text-align: center;
    }
    .register-container input {
        width: 100%;
        padding: 12px;
        margin: 10px 0;
        border: 1px solid #ddd;
        border-radius: 8px;
    }
    .btn-register {
        width: 100%;
        padding: 12px;
        background: #3498db;
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
    }
</style>

<main>
    <div class="register-container">
        <h2>Create New Account 👤</h2>
        <?php echo $message; ?>
        
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Create Password" required>
            <button type="submit" class="btn-register">Register Now</button>
        </form>
        
        <p style="margin-top: 15px;">
            Already have an account? <a href="login.php">Login here</a>
        </p>
    </div>
</main>

<?php include 'footer.php'; ?>