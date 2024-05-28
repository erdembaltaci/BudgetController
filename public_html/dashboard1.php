<?php
include("db_connect1.php");
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login1.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Kullanıcı adını çek
$user_query = "SELECT username FROM users WHERE id='$user_id'";
$user_result = mysqli_query($connection, $user_query);
if ($user_result && mysqli_num_rows($user_result) > 0) {
    $user_row = mysqli_fetch_assoc($user_result);
    $username = $user_row['username'];
    // Kullanıcı adı yanına emoji ekle
    $username_with_emoji = $username . " 😊";
} else {
    $username_with_emoji = "User 😊";
}

// Log out işlemi
if(isset($_POST['logout'])) {
    // Oturumu sonlandır
    session_destroy();
    // Kullanıcıyı login sayfasına yönlendir
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="icon" href="logo3.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Roboto', sans-serif;
        }
        .dashboard-container {
            max-width: 900px;
            margin: 50px auto;
            padding: 40px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .dashboard-heading {
            text-align: center;
            margin-bottom: 40px;
        }
        .dashboard-heading h1 {
            font-size: 2.5rem;
            font-weight: 600;
        }
        .dashboard-content .row {
            margin-bottom: 30px;
        }
        .btn {
            height: 60px;
            font-size: 1.2rem;
            font-weight: 500;
            padding: 0 20px;
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .btn .btn-text {
            margin-left: 10px;
        }
        .net-asset-container {
            text-align: center;
            margin-top: 20px;
        }
        .net-asset h2 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            font-weight: 500;
        }
        .net-asset p {
            font-size: 1.5rem;
            font-weight: 700;
        }
        .form-inline {
            justify-content: center;
        }
        .custom-select, .btn-primary {
            margin: 5px 10px;
        }
        .btn-primary {
            background: linear-gradient(45deg, #007bff, #0056b3);
            border: none;
            transition: background 0.3s ease;
        }
        .btn-primary:hover {
            background: linear-gradient(45deg, #0056b3, #003d80);
        }
        .positive {
            color: green;
        }
        .negative {
            color: red;
        }
        @media (max-width: 767px) {
            .btn {
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="dashboard-heading">
            <h1>Welcome to Your Dashboard</h1>
            <p class="lead">Hello, <?php echo $username_with_emoji; ?></p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-4 text-center mb-3">
                    <a href="add_transaction1.php" class="btn btn-primary btn-lg btn-block">
                        <i class="fas fa-plus"></i>
                        <span class="btn-text">Add Income/Expense</span>
                    </a>
                </div>
                <div class="col-md-4 text-center mb-3">
                    <a href="list_transactions1.php" class="btn btn-info btn-lg btn-block">
                        <i class="fas fa-list"></i>
                        <span class="btn-text">Income/Expense List</span>
                    </a>
                </div>
                <div class="col-md-4 text-center mb-3">
                    <form method="post">
                        <button type="submit" name="logout" class="btn btn-danger btn-lg btn-block">
                            <i class="fas fa-sign-out-alt"></i>
                            <span class="btn-text">Log out</span>
                        </button>
                    </form>
                </div>
            </div>

            <div class="net-asset-container">
                <div class="net-asset">
                    <h2>Net Asset</h2>
                    <p id="netAsset">Select a month and year to view the net asset.</p>
                </div>
                <form id="showNetAssetForm" class="form-inline">
                    <select class="custom-select" id="monthSelect" name="month">
                        <?php 
                            $months = [
                                "January", "February", "March", "April", "May", "June", 
                                "July", "August", "September", "October", "November", "December"
                            ];
                            foreach($months as $key => $month) {
                                $month_num = str_pad($key+1, 2, "0", STR_PAD_LEFT);
                                echo '<option value="' . $month_num . '">' . $month . '</option>';
                            }
                        ?>
                    </select>
                    <select class="custom-select" id="yearSelect" name="year">
                        <?php 
                            $current_year = date('Y');
                            $next_year = $current_year + 1;
                            echo '<option value="' . $current_year . '">' . $current_year . '</option>';
                            echo '<option value="' . $next_year . '">' . $next_year . '</option>';
                        ?>
                    </select>
                    <button type="submit" class="btn btn-primary">Show</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#showNetAssetForm").submit(function(event) {
                event.preventDefault();
                var selectedMonth = $("#monthSelect").val();
                var selectedYear = $("#yearSelect").val();
                Select a month and year to view the net asset.</p>
                </div>
                <form id="showNetAssetForm" class="form-inline">
                    <select class="custom-select" id="monthSelect" name="month">
                        <?php 
                            $months = [
                                "January", "February", "March", "April", "May", "June", 
                                "July", "August", "September", "October", "November", "December"
                            ];
                            foreach($months as $key => $month) {
                                $month_num = str_pad($key+1, 2, "0", STR_PAD_LEFT);
                                echo '<option value="' . $month_num . '">' . $month . '</option>';
                            }
                        ?>
                    </select>
                    <select class="custom-select" id="yearSelect" name="year">
                        <?php 
                            $current_year = date('Y');
                            $next_year = $current_year + 1;
                            echo '<option value="' . $current_year . '">' . $current_year . '</option>';
                            echo '<option value="' . $next_year . '">' . $next_year . '</option>';
                        ?>
                    </select>
                    <button type="submit" class="btn btn-primary">Show</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#showNetAssetForm").submit(function(event) {
                event.preventDefault();
                var selectedMonth = $("#monthSelect").val();
                var selectedYear = $("#yearSelect").val();
                $.ajax({
                    url: 'net_asset1.php',
                    type: 'GET',
                    dataType: 'json',
                    data: { month: selectedMonth, year: selectedYear },
                    success: function(data) {
                        if (data.net_asset !== undefined) {
                            var netAssetElement = $('#netAsset');
                            var netAssetValue = parseFloat(data.net_asset);
                            var className = netAssetValue >= 0 ? 'positive' : 'negative';
                            netAssetElement.removeClass('positive negative').addClass(className);
                            netAssetElement.html('Net Asset: <i class="fas fa-dollar-sign"></i> ' + netAssetValue.toFixed(2));
                        } else {
                            $('#netAsset').text(data.error || 'Net asset could not be calculated.');
                        }
                    },
                    error: function() {
                        $('#netAsset').text('Net asset could not be calculated.');
                    }
                });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

