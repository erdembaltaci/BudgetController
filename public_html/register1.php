<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// mysql connection
include("db_connect1.php");

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Check if username or email already exists in the database
    $check_username_sql = "SELECT * FROM users WHERE username = '$username'";
    $check_email_sql = "SELECT * FROM users WHERE email = '$email'";
    $result_username = mysqli_query($connection, $check_username_sql);
    $result_email = mysqli_query($connection, $check_email_sql);

    if (mysqli_num_rows($result_username) > 0 || mysqli_num_rows($result_email) > 0) {
        $message = "<div class='alert alert-danger' role='alert'>Error: Username or email already exists.</div>";
    } else {
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if (mysqli_query($connection, $sql)) {
            $message = "<div class='alert alert-success' role='alert'>Registration successful!</div>";
        } else {
            $message = "<div class='alert alert-danger' role='alert'>Error: " . mysqli_error($connection) . "</div>";
        }
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo3.jpg" type="image/x-icon">
    <title>User Registration</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('background.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            max-width: 100%;
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #343a40;
        }

        .form-group label {
            font-weight: bold;
            color: #343a40;
        }

        .form-control {
            border-radius: 5px;
        }

        .btn-primary {
            border-radius: 5px;
            width: 100%;
        }

        .btn-secondary {
            border-radius: 5px;
            width: 100%;
            margin-top: 5px;
        }

        .password-hint {
            font-size: 12px;
            margin-top: 5px;
            color: #6c757d;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>User Registration</h2>
        <?php echo $message; ?>
        <form action="register1.php" method="POST" onsubmit="return checkForm()">
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <div class="password-hint">Password must contain at least one lowercase letter, one uppercase letter, one number, one special character, and be at least 8 characters long.</div>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Sign up</button>
            <div class="btn-group d-grid gap-2">
                <a href="index.html" class="btn btn-secondary">Main Page</a>
                <a href="login1.php" class="btn btn-secondary">Login</a>
            </div>
        </form>
    </div>

    <script src="signup_controller.js"></script>

</body>

</html>
