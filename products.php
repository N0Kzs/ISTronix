<?php
include("connections/db.php");
error_reporting(0);
session_start();

if (!isset($_SESSION["cart_item"])) {
    $_SESSION["cart_item"] = array(); // Initialize the cart if not already done
}

// Add to Cart
if (isset($_POST['quantity']) && !empty($_POST['quantity']) && isset($_POST['id'])) {
    $product_id = $_POST['id'];
    $quantity = intval($_POST['quantity']);

    $stmt = $conn->prepare("SELECT * FROM product WHERE p_id=? AND p_quantity > 1");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $product = $stmt->get_result()->fetch_assoc();

    if ($product) {
        $product_img = $product['p_img'];
        $product_name = $product['p_name'];
        $product_price = $product['p_price'];

        if (isset($_SESSION["cart_item"][$product_id])) {
            $_SESSION["cart_item"][$product_id]["p_quantity"] += $quantity;
        } else {
            $_SESSION["cart_item"][$product_id] = array(
                "id" => $product_id,
                "p_img" => $product_img,
                "p_name" => $product_name,
                "p_price" => $product_price,
                "p_quantity" => $quantity
            );
        }
    }
}

// Remove from Cart
if (isset($_POST['remove_id'])) {
    $remove_id = $_POST['remove_id'];
    unset($_SESSION["cart_item"][$remove_id]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0-beta3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0-beta3/js/bootstrap.bundle.min.js"></script>
    <style>
        .product-img {
            height: 200px;
            width: 200px;
        }

        #product-list {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
        }

        #product-quantity {
            margin-bottom: 4rem;
        }

        #product-price {
            margin-bottom: 2rem;
        }

        .checkoutimg {
            height: 30px;
            width: 30px;
        }
    </style>
</head>
<body>
    <?php include("includes/header.php");  ?>

    <div class="page-wrapper">
        <button style="margin-left: 95%; margin-top:2.5%;" type="button" class="btn btn-primary custom-btn" data-bs-toggle="modal" data-bs-target="#cart">
            Cart
        </button>

        <div class="modal fade" id="cart" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="z-index: 3000;">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Your Cart</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="cart">
                            <?php
                            $item_total = 0;
                            if (!empty($_SESSION["cart_item"])) {
                                foreach ($_SESSION["cart_item"] as $item) {
                                    ?>
                                    <div style="border-top: 1px solid gray; margin-top: .5rem;">
                                        <p><?php echo $item["p_name"]; ?></p>
                                        <img class="checkoutimg" src="assets/images/<?php echo $item['p_img']; ?>">
                                        <p>Price: ₱<?php echo $item["p_price"]; ?></p>
                                        <p>Quantity: <?php echo $item["p_quantity"]; ?></p>
                                        <h4 style="color: #22549f;">Subtotal: ₱<?php echo $item["p_price"] * $item["p_quantity"]; ?></h4>
                                        <form method="post" action="">
                                            <input type="hidden" name="remove_id" value="<?php echo $item['id']; ?>">
                                            <input class="btn btn-secondary" type="submit" value="Remove from Cart">
                                        </form>
                                    </div>
                                    <?php
                                    $item_total += ($item["p_price"] * $item["p_quantity"]);
                                }
                            }
                            ?>
                            <div style="border-top: 1px solid #22549f; margin-top:.5rem;">
                                <h3 style="color: #22549f;">Total: ₱<?php echo $item_total; ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a class="btn btn-primary" href="checkout.php">Checkout</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="menu">
            <h2>Products</h2>
            <div id="product-list">
                <?php
                // Query construction
                $query = "SELECT * FROM product WHERE p_quantity > 1";
                $params = [];
                if (isset($_GET['cat_id'])) {
                    $query .= " AND c_id=?";
                    $params[] = $_GET['cat_id'];
                } elseif (isset($_GET['search_query'])) {
                    $query .= " AND (p_name LIKE ? OR p_description LIKE ?)";
                    $search = '%' . $_GET['search_query'] . '%';
                    $params[] = $search;
                    $params[] = $search;
                }

                // Prepare and execute query
                $stmt = $conn->prepare($query);
                if (!empty($params)) {
                    $stmt->bind_param(str_repeat('s', count($params)), ...$params);
                }
                $stmt->execute();
                $products = $stmt->get_result();

                // Display products
                if ($products->num_rows > 0) {
                    while ($product = $products->fetch_assoc()) {
                        ?>
                        <div class="card" style="width: 18rem; position: relative; margin-top: 2rem;">
                            <img class="product-img" src="assets/images/<?php echo $product['p_img']; ?>" class="card-img-top" alt="Product Image">
                            <div class="card-body">
                                <div style="position: relative;">
                                    <h5 style="color: #254069;"><?php echo $product['p_name']; ?></h5>
                                </div>
                                <div id="product-price">
                                    <h6>₱<?php echo $product['p_price']; ?></h6>
                                </div>
                                <div class="accordion accordion-flush" id="accordionFlushExample<?php echo $product['p_id']; ?>">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingOne<?php echo $product['p_id']; ?>">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne<?php echo $product['p_id']; ?>" aria-expanded="false" aria-controls="flush-collapseOne<?php echo $product['p_id']; ?>">
                                                View Details
                                            </button>
                                        </h2>
                                        <div id="flush-collapseOne<?php echo $product['p_id']; ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne<?php echo $product['p_id']; ?>" data-bs-parent="#accordionFlushExample<?php echo $product['p_id']; ?>">
                                            <div class="accordion-body">
                                                <p><?php echo $product['p_specs']; ?></p>
                                                <p><?php echo $product['p_description']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="product-quantity">
                                    <form method="post" action='products.php?<?php echo isset($_GET['cat_id']) ? 'cat_id=' . $_GET['cat_id'] : 'search_query=' . $_GET['search_query']; ?>' enctype="multipart/form-data">
                                        <label for="quantity">Quantity</label>
                                        <input type="number" name="quantity" value="1" min="1">
                                        <input type="hidden" name="id" value="<?php echo $product['p_id']; ?>">
                                </div>
                                <div class="card-actions justify-end" style="position: absolute; bottom: 10px; right: 10px;">
                                    <input class="btn btn-primary" style="margin-top:30px" type="submit" value="Add to Cart">
                                </div>
                                    </form>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p>No products found.</p>";
                }
                ?>
            </div>
        </div>
    </div>

    <?php include("includes/footer.php");  ?>

</body>
</html>
