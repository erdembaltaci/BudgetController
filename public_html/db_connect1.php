<?php
// Database connection parameters
$servername = "localhost";
$username = "budgetco_budgetcontrol"; 
$password = "DqF8XrjhgYsQPupNnwgF"; 
$database = "budgetco_budgetcontrol"; 

// Establish database connection
$connection = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$connection) {
    // If connection fails, display error message and terminate script
    die("Connection Error: " . mysqli_connect_error());
}
?>
