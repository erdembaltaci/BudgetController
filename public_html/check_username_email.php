<?php
// MySQL connection
include("db_connect1.php");

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and email from the POST data
    $username = $_POST['username'];
    $email = $_POST['email'];

    // Check if username or email already exists in the database
    $check_username_sql = "SELECT * FROM users WHERE username = '$username'";
    $check_email_sql = "SELECT * FROM users WHERE email = '$email'";
    $result_username = mysqli_query($connection, $check_username_sql);
    $result_email = mysqli_query($connection, $check_email_sql);

    // If username or email exists in the database, send "exists" response back to JavaScript
    if (mysqli_num_rows($result_username) > 0 || mysqli_num_rows($result_email) > 0) {
        echo "exists";
        exit;
    }
}
?>
