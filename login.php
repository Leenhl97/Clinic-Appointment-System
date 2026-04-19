<?php
include 'header.php';
include 'db_connect.php';
session_start(); // لبدء الجلسة وحفظ بيانات المستخدم بعد الدخول

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        // التحقق من كلمة المرور (يفضل استخدام password_verify مستقبلاً)
        if ($password == $user['password']) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: index.php"); // التوجه للصفحة الرئيسية بعد النجاح
        } else {
            $error = "Invalid password!";
        }
    } else {
        $error = "No account found with this email!";
    }
}
?>

<style>
    .login-container {
        max-width: 400px;
        margin: 50px auto;
        padding: 30px;
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        text-align: center;
    }
    .login-container input {
        width: 100%;
        padding: 12px;
        margin: 10px 0;
        border: 1px solid #ddd;
        border-radius: 8px;
    }
    .btn-login {
        width: 100%;
        padding: 12px;
        background: #2ecc71;
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
    }
    .error-msg { color: red; margin-bottom: 10px; }
</style>

<main>
    <div class="login-container">
        <h2>Login to Your Account 🔐</h2>
        <?php if($error) echo "<p class='error-msg'>$error</p>"; ?>
        
        <form method="POST" action="">
            <input type="email" name="email" placeholder="Enter your email" required>
            <input type="password" name="password" placeholder="Enter your password" required>
            <button type="submit" class="btn-login">Login</button>
        </form>
        
        <p style="margin-top: 15px;">
            Don't have an account? <a href="register.php">Register here</a>
        </p>
    </div>
</main>

<?php include 'footer.php'; ?>
