<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
</head>
<body>
    <div>
        <form>
            <h2>User Registration</h2>
            <form method="POST" action="user_register.php">
                <div>
                    <label for="username">Username</label>
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div>
                    <label for="role">Role</label>
                    <select name="user_type" required>
                        <option value="job_seeker">Job Seeker</option>
                        <option value="employer">Employer</option>
                    </select>
                </div>
                <div>
                    <button type="submit">Register</button>
                </div>
            </form>
            <a href="user_login.php">
                <p id="p">Already have an account?</p>
            </a>
        </form>
    </div>
    
</body>
</html>
