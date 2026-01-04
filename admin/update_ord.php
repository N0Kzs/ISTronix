<html>
    
<?php
include("../connections/db.php");
if(isset($_POST["submit"])){
    $id = $_POST["oid"];
    $date = $_POST["oDate"];
    $quantity = $_POST["oQuantity"];
    $price = $_POST["oPrice"];
    $user = $_POST["oUser"];
    $prod = $_POST["oProd"];
    $inv = $_POST["oInv"];
    
    $query = " UPDATE orders SET o_date='$date', o_quantity='$quantity', o_prize='$price', 
               u_id='$user', p_id='$prod', in_id='$inv' WHERE o_id='$id' ";
    mysqli_query($conn, $query);
    header("Location: all_orders.php");
          
}

?>
<style>
    table {
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid black;
        padding: 5px;
    }
</style>
<head>
    <title>Admin Panel</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <!-- <div class="preloader">
        <form action="">
            <input type="submit" value='logout' name='logout'>
        </form>
    </div> -->

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
            <div>
                <h4 class="mb-0 text-white bg-primary p-2 rounded">Edit Order</h4>
            </div>
                <div class="table-responsive m-t-40">
                <form action="update_ord.php" method='POST' class="p-4 border rounded bg-light">
                    <?php 
                    $upd_sql = "SELECT * from orders";
                    $upd_res=$conn->query($upd_sql);
                    while($upd_row=mysqli_fetch_array($upd_res)){
                        if($upd_row['o_id'] == $_GET['ord_upd']){
                        $upd_id = $upd_row['o_id'];
                        $upd_date = $upd_row['o_date'];
                        $upd_quantity = $upd_row['o_quantity'];
                        $upd_price = $upd_row['o_prize'];
                        $upd_user = $upd_row['u_id'];
                        $upd_prod = $upd_row['p_id'];
                        $upd_inv = $upd_row['in_id'];
                        }
                    }
                    ?>
                    <input type="hidden" value="<?php echo $upd_id; ?>" name="oid">

                    <div class="form-group">
                    <label for="oUser">Select User</label>
                    <select class="form-control" name="oUser">
                        <option>--Select User--</option>
                        <?php $ssql ="select * from users";
                            $res=$conn->query($ssql);
                            while($row=mysqli_fetch_array($res)){
                                echo" <option value='".$row['u_id']."'>".$row['u_name']."</option>";
                            } 
                        ?> 
                    </select>
                    </div>

                    <div class="form-group">
                    <label for="oProd">Select Product</label>
                    <select class="form-control" name="oProd">
                        <option>--Select Product--</option>
                        <?php $ssql2 ="select * from product";
                            $res2=$conn->query($ssql2);
                            while($row2=mysqli_fetch_array($res2)){
                                echo" <option value='".$row2['p_id']."'>".$row2['p_name']."</option>";
                            } 
                        ?> 
                    </select>
                    </div>

                    <div class="form-group">
                    <label for="oInv">Select Invoice Number</label>
                    <select class="form-control" name="oInv">
                        <option>--Select Invoice--</option>
                        <?php $ssql3 ="select * from invoice";
                            $res3=$conn->query($ssql3);
                            while($row3=mysqli_fetch_array($res3)){
                                echo" <option value='".$row3['in_id']."'>".$row3['in_id']."</option>";
                            } 
                        ?> 
                    </select>
                    </div>

                        <div class="form-group">
                        <label for="oDate">Order Date</label>
                        <input type="date" class="form-control" name="oDate" value="<?php echo $upd_date; ?>">
                        </div>

                        <div class="form-group">
                        <label for="oQuantity">Order Quantity</label>
                        <input type="number" class="form-control" name="oQuantity" value="<?php echo $upd_quantity; ?>">
                        </div>

                        <div class="form-group">
                        <label for="oPrice">Price</label>
                        <input type="number" placeholder="₱" class="form-control" name="oPrice" value="<?php echo $upd_price; ?>">
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary">Save</button>
                    </form>
                    </div>
 
            </main>
        </div>
    </div>



 

</body>

</html>
