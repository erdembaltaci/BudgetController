<?php
// Include database connection
include("db_connect1.php");
// Start session
session_start();

// Get transaction ID from GET parameters
$id = $_GET['id'];

// Select transaction from database based on ID and user ID
$sql = "SELECT * FROM transactions WHERE id = '$id' AND user_id = '".$_SESSION['user_id']."'";
$result = mysqli_query($connection, $sql);
$transaction = mysqli_fetch_assoc($result);

// Select all categories from database
$categories_result = mysqli_query($connection, "SELECT * FROM categories");

// If the form is submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $type = $_POST['type'];
    $category_id = $_POST['category_id'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];
    $description = $_POST['description'];

    // Update transaction in the database
    $sql = "UPDATE transactions SET type = '$type', category_id = '$category_id', amount = '$amount', date = '$date', description = '$description' WHERE id = '$id' AND user_id = '".$_SESSION['user_id']."'";

    // Execute SQL query
    if (mysqli_query($connection, $sql)) {
        // If update is successful, display success message and redirect to transaction list page
        echo "Transaction updated successfully!";
        header("Location: list_transactions1.php");
    } else {
        // If an error occurs during update, display error message
        echo "Error: " . mysqli_error($connection);
    }
}
?>

<html lang="en">
<head>
    <link rel="icon" href="logo3.jpg" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaction</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Edit Transaction
                    </div>
                    <div class="card-body">
                        <!-- Form for editing transaction -->
                        <form action="edit_transaction1.php?id=<?php echo $id; ?>" method="POST">
                            <div class="form-group">
                                <label for="type">Type:</label>
                                <select name="type" class="form-control">
                                    <!-- Dropdown for selecting transaction type -->
                                    <option value="income" <?php if($transaction['type'] == 'income') echo 'selected'; ?>>Income</option>
                                    <option value="expense" <?php if($transaction['type'] == 'expense') echo 'selected'; ?>>Expense</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="category_id">Category:</label>
                                <select name="category_id" class="form-control" required>
                                    <!-- Dropdown for selecting transaction category -->
                                    <?php while ($category = mysqli_fetch_assoc($categories_result)) { ?>
                                        <option value="<?php echo $category['id']; ?>" <?php if($transaction['category_id'] == $category['id']) echo 'selected'; ?>><?php echo $category['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="amount">Amount:</label>
                                <input type="number" name="amount" step="0.01" value="<?php echo $transaction['amount']; ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="date">Date:</label>
                                <input type="date" name="date" value="<?php echo $transaction['date']; ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" class="form-control"><?php echo $transaction['description']; ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="list_transactions1.php" class="btn btn-secondary">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
