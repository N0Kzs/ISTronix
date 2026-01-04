<!DOCTYPE html>
<html lang="en">
<?php
// Include the database connection script
include("../connections/db.php");
?>

<head>
    <title>Admin Panel</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include DataTables JS -->
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Navigation menu -->
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <img src="assets/images/logo.png" style="height: 80px; width: auto; margin: 10px 0px 0px 25px"> 
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="dashboard.php">
                                <i class="fa fa-tachometer"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="adm_user.php">
                                <span>Users</span>
                            </a>
                        </li>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="hide-menu">Products</span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="all_products.php">All Products</a></li>
                                <li><a class="dropdown-item" href="add_products.php">Add Products</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown"> 
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="hide-menu">Categories</span>
                            </a>
                            <ul class="dropdown-menu"> 
                                <li><a class="dropdown-item" href="all_categories.php">All Categories</a></li>
                                <li><a class="dropdown-item" href="add_categories.php">Add Categories</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="all_orders.php">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Orders
                            </a>
                        </li>
                    </ul>
                </div>

                <style> 
                ul {
                    position: relative;
                    background: #fff;
                    padding: 0;
                    margin: 0;
                }

                ul li {
                    list-style: none;
                    padding: 15px 20px;
                    margin: 10px 0;
                    width: 100%;
                    background: #f9f9f9;
                    border-radius: 8px;
                    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
                    transition: transform 0.3s, background 0.3s, box-shadow 0.3s;
                    cursor: pointer;
                }

                ul li i {
                    margin-right: 10px;
                    color: #555;
                    transition: color 0.3s;
                }

                ul li:hover {
                    transform: translateY(-5px);
                    background: #25bcff;
                    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
                    color: #fff;
                    z-index: 5;
                }

                ul li:hover i {
                    color: #fff;
                    opacity: 1;
                }
            </style>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 ">
                <br>
                <!-- Cards section -->
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <div class="card text-white bg-primary">
                            <div class="card-body">
                                <h5 class="card-title">Total Users</h5>
                                <p class="card-text">
                                    <?php 
                                        // Query to get total number of users
                                        $user_sql="SELECT * FROM users";
                                        $user_query=$conn->query($user_sql);

                                        // Display total number of users or a message if no users found
                                        if($user_total = mysqli_num_rows($user_query)){
                                            echo "<h3>".$user_total."</h3>";
                                        }else{
                                            echo "<h4>No Data</h4>";
                                        }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card text-white bg-success">
                            <div class="card-body">
                                <h5 class="card-title">Total Categories</h5>
                                <p class="card-text">
                                    <?php 
                                        // Query to get total number of categories
                                        $categories_sql="SELECT * FROM categories";
                                        $categories_query=$conn->query($categories_sql);

                                        // Display total number of categories or a message if no categories found
                                        if($categories_total = mysqli_num_rows($categories_query)){
                                            echo "<h3>".$categories_total."</h3>";
                                        }else{
                                            echo "<h4>No Data</h4>";
                                        }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card text-white bg-danger">
                            <div class="card-body">
                                <h5 class="card-title">Total Orders</h5>
                                <p class="card-text">
                                    <?php 
                                        // Query to get total number of orders
                                        $orders_sql="SELECT * FROM orders";
                                        $orders_query=$conn->query($orders_sql);

                                        // Display total number of orders or a message if no orders found
                                        if($orders_total = mysqli_num_rows($orders_query)){
                                            echo "<h3>".$orders_total."</h3>";
                                        }else{
                                            echo "<h4>No Data</h4>";
                                        }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card text-white bg-warning">
                            <div class="card-body">
                                <h5 class="card-title">Total Products</h5>
                                <p class="card-text">
                                    <?php 
                                        // Query to get total number of products
                                        $product_sql="SELECT * FROM product";
                                        $product_query=$conn->query($product_sql);

                                        // Display total number of products or a message if no products found
                                        if($product_total = mysqli_num_rows($product_query)){
                                            echo "<h3>".$product_total."</h3>";
                                        }else{
                                            echo "<h4>No Data</h4>";
                                        }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card text-white bg-info">
                            <div class="card-body">
                                <h5 class="card-title">Total Earnings</h5>
                                <p class="card-text">
                                    <?php 
                                        // Query to get total earnings from orders
                                        $earnings_sql="SELECT * FROM orders";
                                        $earnings_query=$conn->query($earnings_sql);

                                        $TotalEarnings = 0;
                                        // Calculate total earnings
                                        while($rows=mysqli_fetch_array($earnings_query)){
                                            $TotalEarnings += $rows['o_prize'];
                                        }
                                        // Display total earnings
                                        echo "<h3>₱ ".$TotalEarnings."</h3>";
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts section -->
                <div class="row bg-info bg-gradient">
                    <div class="col-md-6">
                        <h3>Registered Products</h3>
                        <canvas id="myChartBar"></canvas>
                        <?php
                            // Query to get the categories and the number of products in each category
                            $ssql = "SELECT c_name, COUNT(p_id) AS num_products FROM product JOIN categories ON product.c_id = categories.c_id GROUP BY c_name";
                            $res = $conn->query($ssql);
                            $categoriesData = '';
                            $numProducts = '';
                            // Fetch data for the bar chart
                            while($row = mysqli_fetch_array($res)){
                                $categoriesData .= "'" . $row['c_name'] . "', ";
                                $numProducts .= $row['num_products'] . ", ";
                            }
                            // Remove the trailing comma and space
                            $categoriesData = rtrim($categoriesData, ', ');
                            $numProducts = rtrim($numProducts, ', ');
                        ?>
                    </div>
                    <div class="col-md-6">
                        <h3>Inventory Value</h3>
                        <canvas id="myChartpie"></canvas>
                        <?php
                            // Query to get the categories and the total prizes ordered in each category
                            $ssql = "SELECT c_name, SUM(p_price * p_quantity) AS total_prize FROM product JOIN categories ON product.c_id = categories.c_id GROUP BY c_name";
                            $res = $conn->query($ssql);
                            $categoriesData2 = '';
                            $numProducts2 = '';
                            // Fetch data for the pie chart
                            while($row = mysqli_fetch_array($res)){
                                $categoriesData2 .= "'" . $row['c_name'] . "', ";
                                $numProducts2 .= $row['total_prize'] . ", ";
                            }
                            // Remove the trailing comma and space
                            $categoriesData2 = rtrim($categoriesData2, ', ');
                            $numProducts2 = rtrim($numProducts2, ', ');
                        ?>
                    </div>
                </div>
            </main>
        </div>
    </div>

</body>


<script>
    // JavaScript to create a bar chart for Products in categories
    const barchart = document.getElementById('myChartBar');

    new Chart(barchart, {
        type: 'bar',
        data: {
            labels: [<?php echo $categoriesData; ?>],
            datasets: [{
                label: 'Categories',
                data: [<?php echo $numProducts; ?>],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // JavaScript to create a pie chart for Total prize of products in each category
    const piechart = document.getElementById('myChartpie');

    new Chart(piechart, {
        type: 'pie',
        data: {
            labels: [<?php echo $categoriesData2; ?>],
            datasets: [{
                label: 'Prize Categories',
                data: [<?php echo $numProducts2; ?>],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                }
            }
        }
    });
</script>

</html>