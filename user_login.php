<?php
$conn = new mysqli('localhost', 'root', '', 'db');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $user_type = $_POST['user_type'];

    $stmt = $conn->prepare("INSERT INTO users (username, email, password, user_type) VALUES (?, ?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("ssss", $username, $email, $password, $user_type);
        if ($stmt->execute()) {
            echo "d";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <style>
        /* styles.css */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            background-image: url("A_uiu.jpg");
        }



        .form-container {
            background-color: rgba(255, 255, 255, 0.1);
            /* Slightly transparent white */
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.9);
            width: 100%;
            max-width: 400px;
            position: relative;
            z-index: 1;
            backdrop-filter: blur(10px);
            /* Adds a glassy blur effect */
        }

        .registration-form h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #fff;
            /* White text for better contrast */
        }

        #p {
            text-align: center;
            color: black;

        }

        #p:hover {
            color: white;
        }

        .form-group {
            margin-bottom: 1.2rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
            color: #fff;
            /* White text */
        }

        .form-group input,
        .form-group select {
            width: 93%;
            padding: 0.8rem;
            border: 1px solid rgba(255, 255, 255, 0.6);
            border-radius: 5px;
            font-size: 1rem;
            color: black;
            background: rgba(255, 255, 255, 0.3);
            /* Transparent input background */
            transition: border-color 0.3s ease, background-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #fff;
            background-color: rgba(255, 255, 255, 0.4);
            /* Slightly brighter background */
            outline: none;
        }

        .btn {
            width: 100%;
            padding: 0.8rem;
            border: none;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.8);
            color: #2575fc;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .btn:hover {
            background-color: #2575fc;
            color: rgb(255, 255, 255);
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form class="registration-form">
            <h2>User Login</h2>
            <form method="POST">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn">Login</button>
                </div>
            </form>
            <a href="user_register.php">
                <p id="p">Create new account?</p>
            </a>
            </form>
    </div>
    
</body>
</html>


