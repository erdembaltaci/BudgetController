<?php
// Include database connection
include("db_connect1.php");
// Start session
session_start();

// Get transaction ID from GET parameters
$id = $_GET['id'];
// SQL query to delete transaction
$sql = "DELETE FROM transactions WHERE id = '$id' AND user_id = '".$_SESSION['user_id']."'";

// Execute SQL query
if (mysqli_query($connection, $sql)) {
    // If deletion is successful, display success message and redirect to transaction list page
    echo "Transaction deleted successfully!";
    header("Location: list_transactions1.php");
} else {
    // If an error occurs during deletion, display error message
    echo "Error: " . mysqli_error($connection);
}
?>
