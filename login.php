<?php
session_start();

// ✅ Redirect if already logged in
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

$mysqli = new mysqli("localhost", "root", "", "chakri_sathi");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // ✅ Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Please enter a valid email address.');</script>";
        exit();
    }

    // ✅ Check if user exists
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // ✅ Verify password
    if ($user && password_verify($password, $user['password'])) {
        // ✅ Set session data
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_type'] = $user['user_type'];
        $_SESSION['user_id'] = $user['id'];

        // ✅ Update last_login timestamp
        $update = $mysqli->prepare("UPDATE users SET last_login = NOW() WHERE id = ?");
        $update->bind_param("i", $_SESSION['user_id']);
        $update->execute();

        // ✅ Redirect to dashboard
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<script>alert('Invalid email or password!');</script>";
    }
}
?>
