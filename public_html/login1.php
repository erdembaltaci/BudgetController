<?php
include("db_connect1.php");
session_start();
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($connection, $sql);
    $user = mysqli_fetch_assoc($result);
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: dashboard1.php");
        exit;
    } else {
        $message = '<div class="alert alert-danger" role="alert">Invalid username or password!</div>';
    }
}
?>

<html lang="en">

<head>
    <title>Login</title>
    <link rel="icon" href="logo3.jpg" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
        }

        .container {
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            width: 100%;
        }

        .panel {
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }

        .panel-heading {
            border-radius: 10px 10px 0 0;
            background-color: #007bff;
            color: #fff;
            padding: 15px;
        }

        .panel-title {
            font-size: 24px;
            font-weight: bold;
            margin: 0;
            text-align: center;
        }

        .panel-body {
            padding: 20px;
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
            background-color: #007bff;
            border-color: #007bff;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .btn-default {
            border-radius: 5px;
            width: 100%;
        }

        .alert {
            margin-top: 20px;
        }

        @media (max-width: 767px) {
            .panel-title {
                font-size: 20px;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Login</h3>
            </div>
            <div class="panel-body">
                <?php echo $message; ?>
                <form action="login1.php" method="POST">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                <a href="index.html" class="btn btn-default" style="margin-top: 10px;">Main Page</a>
                <p class="text-center" style="margin-top: 10px;">Don't have an account? <a href="register1.php">Sign Up</a></p>
            </div>
        </div>
    </div>

</body>

</html>
