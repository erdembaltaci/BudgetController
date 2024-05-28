<?php
// Include database connection
include("db_connect1.php");
// Start session
session_start();

// Query to get categories
$categories_result = mysqli_query($connection, "SELECT * FROM categories");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user ID from session
    $user_id = $_SESSION['user_id'];
    // Get transaction type, category, amount, date, and description from form
    $type = $_POST['type'];
    $category_name = $_POST['category'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];
    $description = $_POST['description'];

    // Query to get category ID from category name
    $category_query = "SELECT id FROM categories WHERE name='$category_name'";
    $category_result = mysqli_query($connection, $category_query);

    if ($category_result) {
        // Fetch category ID
        $category_row = mysqli_fetch_assoc($category_result);
        $category_id = $category_row['id'];

        // Check if category ID is not empty
        if (empty($category_id)) {
            echo "Category ID is required.";
        } else {
            // Insert transaction into database
            $sql = "INSERT INTO transactions (user_id, type, category, category_id, amount, date, description) VALUES ('$user_id', '$type', '$category_name','$category_id', '$amount', '$date', '$description')";
            if (mysqli_query($connection, $sql)) {
                echo "Transaction added successfully!";
            } else {
                echo "Error: " . mysqli_error($connection);
            }
        }
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}
?>

<!-- HTML form for adding transaction -->
<html lang="en">
<head>
    <link rel="icon" href="logo3.jpg" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Transaction</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: white;
            border-radius: 10px 10px 0 0;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Add Transaction</h4>
                    </div>
                    <div class="card-body">
                        <form action="add_transaction1.php" method="POST">
                            <div class="form-group">
                                <label for="type">Type:</label>
                                <select name="type" class="form-control">
                                    <option value="income">Income</option>
                                    <option value="expense">Expense</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="category">Category:</label>
                                <select name="category" class="form-control" required>
                                    <?php while ($category = mysqli_fetch_assoc($categories_result)) { ?>
                                        <option value="<?php echo $category['name']; ?>"><?php echo $category['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="amount">Amount:</label>
                                <input type="number" name="amount" step="0.01" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="date">Date:</label>
                                <input type="date" name="date" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" class="form-control"></textarea>
                            </div>
                            <div class="form-group d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary mr-2">Add</button>
                                <a href="dashboard1.php" class="btn btn-secondary">Back</a>
                            </div>
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
