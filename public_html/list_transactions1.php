<?php
include("db_connect1.php");
session_start();

$user_id = $_SESSION['user_id'];
$sql = "SELECT username FROM users WHERE id = '$user_id'";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);
$username = $row['username'];

if(isset($_GET['month']) && isset($_GET['year'])) {
    $selected_month = $_GET['month'];
    $selected_year = $_GET['year'];
    $start_date = $selected_year . '-' . $selected_month . '-01';
    $end_date = date('Y-m-t', strtotime($start_date));
    $sql_transactions = "SELECT transactions.*, categories.name AS category_name 
                         FROM transactions 
                         LEFT JOIN categories ON transactions.category_id = categories.id 
                         WHERE transactions.user_id = '$user_id' 
                         AND transactions.date BETWEEN '$start_date' AND '$end_date'
                         ORDER BY transactions.date DESC";
} else {
    $sql_transactions = "SELECT transactions.*, categories.name AS category_name 
                         FROM transactions 
                         LEFT JOIN categories ON transactions.category_id = categories.id 
                         WHERE transactions.user_id = '$user_id' 
                         ORDER BY transactions.date DESC";
}

$result_transactions = mysqli_query($connection, $sql_transactions);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <link rel="icon" href="logo3.jpg" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Global Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f0f0;
            padding-top: 80px; /* Navigation bar height */
        }
        .menu-bar {
            background-color: #343a40;
            padding: 10px 20px;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }
        .user-welcome {
            font-weight: bold;
            display: flex;
            align-items: center;
        }
        .user-welcome i {
            margin-right: 10px;
        }
        /* Transaction History Styles */
        .month-wrapper {
            background-color: #fff;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .month-buttons .btn {
            margin: 5px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
        }
        .month-buttons .btn:hover {
            background-color: #0056b3;
        }
        .transaction-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            padding: 20px;
        }
        .category-icon {
            margin-right: 5px;
        }
        .date-icon {
            margin-right: 5px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .no-transactions {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark menu-bar">
        <a class="navbar-brand" href="#">BudgetController</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard1.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout1.php"><i class="fas fa-sign-out-alt"></i> Log Out</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="month-wrapper">
                    <div class="month-buttons">
                        <form method="GET" action="">
                            <div class="form-row align-items-center">
                                <div class="col-sm-5 my-1">
                                    <label class="mr-sm-2" for="month">Month</label>
                                    <select class="custom-select mr-sm-2" id="month" name="month">
                                        <?php 
                                            $months = [
                                                "January", "February", "March", "April", "May", "June", 
                                                "July", "August", "September", "October", "November", "December"
                                            ];
                                            foreach($months as $key => $month) {
                                                $month_num = str_pad($key+1, 2, "0", STR_PAD_LEFT);
                                                $selected = ($selected_month == $month_num) ? 'selected' : '';
                                                echo '<option value="' . $month_num . '" ' . $selected . '>' . $month . '</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-5 my-1">
                                    <label class="mr-sm-2" for="year">Year</label>
                                    <select class="custom-select mr-sm-2" id="year" name="year">
                                        <?php 
                                            $current_year = date('Y');
                                            $next_year = $current_year + 1;
                                            $selected_curr = ($selected_year == $current_year) ? 'selected' : '';
                                            $selected_next = ($selected_year == $next_year) ? 'selected' : '';
                                            echo '<option value="' . $current_year . '" ' . $selected_curr . '>' . $current_year . '</option>';
                                            echo '<option value="' . $next_year . '" ' . $selected_next . '>' . $next_year . '</option>';
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-2 my-1">
                                    <button type="submit" class="btn btn-primary btn-block">Go</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php if(mysqli_num_rows($result_transactions) > 0): ?>
                    <?php $current_category = ""; ?>
                    <?php while($row = mysqli_fetch_assoc($result_transactions)): ?>
                        <?php if ($current_category != $row['category_name']): ?>
                            <?php if ($current_category != ""): ?>
                                </tbody></table></div></div>
                            <?php endif; ?>
                            <?php $current_category = $row['category_name']; ?>
                            <div class="transaction-card">
                                <h5 class="card-title"><i class="fas fa-folder category-icon"></i> <?php echo $current_category; ?></h5>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th><i class="fas fa-calendar-alt date-icon"></i> Date</th>
                                                                                                <th>Type</th>
                                                <th>Amount</th>
                                                <th>Description</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                        <?php endif; ?>
                        <tr>
                            <td><i class="fas fa-calendar-alt date-icon"></i><?php echo $row['date']; ?></td>
                            <td><?php echo $row['type']; ?></td>
                            <td><i class="fas fa-coins"></i> <?php echo $row['amount']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td>
                                <div class="btn-group-vertical" role="group" aria-label="Transaction Actions">
                                <a href="edit_transaction1.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                <button onclick="confirmDelete(<?php echo $row['id']; ?>)" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                                </div>
                            </td>
                            <script>
                                function confirmDelete(transactionId) {
                                if (confirm("Are you sure you want to delete this transaction?")) {
                                    window.location.href = "delete_transaction1.php?id=" + transactionId;
                                } else {
                                }
                            }
</script>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php else: ?>
        <div class="no-transactions">
            <p>No transactions found for the selected month and year.</p>
        </div>
    <?php endif; ?>
    </div>
</div>
</div>


<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

