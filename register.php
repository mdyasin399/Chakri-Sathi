<?php
session_start(); // Add session_start to allow saving login session

$mysqli = new mysqli("localhost", "root", "", "chakri_sathi");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = $_POST['user_type'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $education = $_POST['education'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $mysqli->prepare("INSERT INTO users (user_type, name, phone, email, education, password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $type, $name, $phone, $email, $education, $password);
    
    if ($stmt->execute()) {
        // ✅ Registration successful

        // ✅ Get the newly registered user's ID
        $user_id = $stmt->insert_id;

        // ✅ Set login session immediately
        $_SESSION['user_name'] = $name;
        $_SESSION['user_type'] = $type;
        $_SESSION['user_id'] = $user_id;

        // ✅ Redirect user to dashboard
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error: " . $mysqli->error;
    }
}
?>
