<?php
include("connections/db.php");
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION["user_id"];


$stmt = $conn->prepare("
    SELECT invoice.in_id, invoice.in_date, invoice.in_priceTotal, orders.o_date, orders.o_quantity, orders.o_prize, product.p_name
    FROM invoice
    JOIN orders ON invoice.in_id = orders.in_id
    JOIN product ON orders.p_id = product.p_id
    WHERE orders.u_id = ?
");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$orders = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php include('includes/header.php') ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your Orders</title>
    <style>
        .invoice-item { margin-bottom: 20px; }
        .order-item { margin-left: 20px; }
        hr { border-top: 1px solid #ccc; }
    </style>
</head>
<body>
    
  



        </ul>
    </div>
</nav>

<div class="page-wrapper" style="margin-top: 2rem;">
    <center> <h1>Your Orders</h1></center>
    <div class="card">
        <div class="card-body mx-4">
            <div class="container">
                <?php
                if ($orders->num_rows > 0) {
                    $current_invoice_id = -1;
                    while ($row = $orders->fetch_assoc()) {
                        if ($row["in_id"] != $current_invoice_id) {
                            if ($current_invoice_id != -1) {
                                // Close the previous invoice div
                                echo '<hr style="border: 2px solid black;">';
                                echo '<div class="row text-black">';
                                echo '<div class="col-xl-12">';
                                echo '<p class="float-end fw-bold">Total: PHP' . $total_price . '</p>';
                                echo '</div>';
                                echo '</div>';
                                echo '<hr style="border: 2px solid black;">';
                            }
                            // Start a new invoice div
                            $current_invoice_id = $row["in_id"];
                            $total_price = $row['in_priceTotal'];
                            echo '<p class="my-5 mx-5" style="font-size: 30px;">Invoice ID: ' . $row['in_id'] . '</p>';
                            echo '<div class="row">';
                            echo '<ul class="list-unstyled">';
                            echo '<li class="text-black">User ID: ' . $user_id . '</li>';
                            echo '<li class="text-muted mt-1"><span class="text-black">Invoice Date: </span>' . $row['in_date'] . '</li>';
                            echo '</ul>';
                            echo '</div>';
                        }
                        // Show order details
                        echo '<div class="row">';
                        echo '<div class="col-xl-10">';
                        echo '<p>' . $row['p_name'] . '</p>';
                        echo '</div>';
                        echo '<div class="col-xl-2">';
                        echo '<p class="float-end">PHP' . $row['o_prize'] . '</p>';
                        echo '</div>';
                        echo '<hr>';
                        echo '</div>';
                    }
                    // Close the last invoice div
                    echo '<hr style="border: 2px solid black;">';
                    echo '<div class="row text-black">';
                    echo '<div class="col-xl-12">';
                    echo '<p class="float-end fw-bold">Total: PHP' . $total_price . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '<hr style="border: 2px solid black;">';
                } else {
                    echo "<p>You have no orders.</p>";
                }
                ?>
                <a class="btn btn-primary" href="products.php">Go Back</a>
                
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php");  ?>
 </body>




