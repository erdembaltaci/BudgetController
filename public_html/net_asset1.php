<?php
// Include database connection
include("db_connect1.php");
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // If user is not logged in, return error message
    echo json_encode(['error' => 'User not logged in']);
    exit();
}

$user_id = $_SESSION['user_id'];

// Check if month and year parameters are set in GET request
if (isset($_GET['month']) && isset($_GET['year'])) {
    $month = $_GET['month'];
    $year = $_GET['year'];

    // Calculate income and expenses
    $income_query = "SELECT SUM(amount) AS total_income FROM transactions WHERE user_id='$user_id' AND type='income' AND MONTH(date)='$month' AND YEAR(date)='$year'";
    $income_result = mysqli_query($connection, $income_query);
    $income_row = mysqli_fetch_assoc($income_result);
    $total_income = $income_row['total_income'] ?? 0;

    $expense_query = "SELECT SUM(amount) AS total_expense FROM transactions WHERE user_id='$user_id' AND type='expense' AND MONTH(date)='$month' AND YEAR(date)='$year'";
    $expense_result = mysqli_query($connection, $expense_query);
    $expense_row = mysqli_fetch_assoc($expense_result);
    $total_expense = $expense_row['total_expense'] ?? 0;

    // Calculate net asset
    $net_asset = $total_income - $total_expense;

    // Return net asset as JSON response
    echo json_encode(['net_asset' => $net_asset]);
} else {
    // If month and year parameters are not set, return error message
    echo json_encode(['error' => 'Invalid parameters']);
}
?>
