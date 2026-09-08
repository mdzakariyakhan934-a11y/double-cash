<?php
require_once 'db.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email='$email'");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            
            if ($user['role'] == 'admin') {
                header("Location: admin.php");
            } else {
                header("Location: dashboard.php");
            }
        } else { $error = "Invalid Password!"; }
    } else { $error = "User not found!"; }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center vh-100">
<div class="container" style="max-width: 400px;">
    <div class="card p-4 shadow-sm">
        <h4 class="mb-3 text-center">User Login</h4>
        <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
        <form method="POST">
            <div class="mb-3"><input type="email" name="email" class="form-control" placeholder="Email" required></div>
            <div class="mb-3"><input type="password" name="password" class="form-control" placeholder="Password" required></div>
            <button name="login" class="btn btn-success w-100">Login</button>
        </form>
        <div class="mt-3 text-center"><a href="register.php">Need an account? Register</a></div>
    </div>
</div>
</body>
</html>
