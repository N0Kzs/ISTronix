<?php
include("connections/db.php");
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$message = "";
$order_summary = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_SESSION["cart_item"])) {
    $user_id = $_SESSION["user_id"];
    $order_date = date("Y-m-d");
    $item_total = 0;

    $conn->begin_transaction();

    try {
        // Calculate the total price for the invoice
        foreach ($_SESSION["cart_item"] as $item) {
            $item_total += $item["p_price"] * $item["p_quantity"];
        }

        // Insert the total into the invoice table
        $stmt = $conn->prepare("INSERT INTO invoice (in_date, in_priceTotal) VALUES (?, ?)");
        $stmt->bind_param("sd", $order_date, $item_total);
        $stmt->execute();
        $invoice_id = $stmt->insert_id;

        foreach ($_SESSION["cart_item"] as $item) {
            $product_id = $item["id"];
            $quantity = $item["p_quantity"];
            $price = $item["p_price"];
            $subtotal = $price * $quantity;

            // Subtract the quantity from the product table
            $stmt = $conn->prepare("UPDATE product SET p_quantity = p_quantity - ? WHERE p_id = ?");
            $stmt->bind_param("ii", $quantity, $product_id);
            $stmt->execute();

            // Insert the order into the orders table
            $stmt = $conn->prepare("INSERT INTO orders (o_date, o_quantity, o_prize, u_id, p_id, in_id) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("siiiii", $order_date, $quantity, $subtotal, $user_id, $product_id, $invoice_id);
            $stmt->execute();

            // Add to order summary
            $order_summary .= "<div class='row'>";
            $order_summary .= "<div class='col-xl-10'><p>{$item['p_name']}</p></div>";
            $order_summary .= "<div class='col-xl-2'><p class='float-end'>PHP{$price}</p></div>";
            $order_summary .= "</div><hr>";
        }

        $order_summary .= "<div class='row text-black'>";
        $order_summary .= "<div class='col-xl-12'><p class='float-end fw-bold'>Total: PHP{$item_total}</p></div>";
        $order_summary .= "</div><hr style='border: 2px solid black;'>";

        $message = "Checkout successful. Your order has been placed.";

        // Clear the cart after successful checkout
        $_SESSION["cart_item"] = array();

        $conn->commit();
    } catch (Exception $e) {
        $conn->rollback();
        $message = "Checkout failed. Please try again.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout</title>
    <?php include('includes/header.php') ?>
</head>
<body>

    <div class="page-wrapper">
        <center><h2 style="margin-top:2rem;">Checkout</h2>
        <?php if ($message) { echo "<p>$message</p>"; } ?>
        <form method="post" action="checkout.php">
            <input class="btn btn-primary" type="submit" value="Confirm Checkout">
        </form> </center>

        <?php if ($order_summary) { ?>
        <div class="card">
            <div class="card-body mx-4">
                <div class="container">
                    <p class="my-5 mx-5" style="font-size: 30px;">Thank you for your purchase</p>
                    <div class="row">
                        <ul class="list-unstyled">
                            <li class="text-black">User ID: <?php echo $user_id; ?></li>
                            <li class="text-muted mt-1"><span class="text-black">Invoice</span> #<?php echo $invoice_id; ?></li>
                            <li class="text-black mt-1"><?php echo $order_date; ?></li>
                        </ul>
                        <hr>
                    </div>
                    <?php echo $order_summary; ?>
                </div>
            </div>
        </div>
        <?php } ?>
        
        <a class="btn btn-primary" href="products.php">Go Back</a>
        <a class="btn btn-primary" href="your_orders.php">See Order List</a>
    </div>
</body>
<?php include("includes/footer.php");  ?>
</html>
