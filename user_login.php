<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div>
        <form>
            <h2>User Login</h2>
            <form method="POST">
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div>
                    <button type="submit">Login</button>
                </div>
            </form>
            <a href="user_register.php">
                <p id="p">Create new account?</p>
            </a>
            </form>
    </div>
    
</body>
</html>


