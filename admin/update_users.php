<html>
<?php
include("../connections/db.php");
if(isset($_POST["submit"])){
    $id = $_POST["uid"];
    $name = $_POST["uName"];
    $fname = $_POST["uFname"];
    $lname = $_POST["uLname"];
    $email = $_POST["uEmail"];
    $phone = $_POST["uPhone"];
    $password = $_POST["uPassword"];
    $address = $_POST["uAddress"];
    $date = $_POST["uDate"];
    
    $query = "UPDATE users SET u_name='$name',u_Fname='$fname', u_Lname='$lname', 
              u_email='$email', u_phone='$phone', u_password='$password', u_address='$address', u_date='$date' WHERE u_id ='$id' ";
    mysqli_query($conn, $query);
    header("Location: adm_user.php");        
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

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

   
    <div class="container mt-4">
      <div class="table-responsive">
        <div>
            <h4 class="mb-4 text-white bg-info p-2 rounded">Edit User details</h4>
        </div>
        <form action="update_users.php" method='POST' class="p-4 border rounded bg-light">
            <?php 
                $upd_sql = "SELECT * from users";
                $upd_res=$conn->query($upd_sql); 
                while($upd_row=mysqli_fetch_array($upd_res)){
                    if($upd_row['u_id'] == $_GET['user_upd']){
                        $upd_id = $upd_row['u_id'];
                        $upd_name = $upd_row['u_name'];
                        $upd_Fname = $upd_row['u_Fname'];
                        $upd_Lname = $upd_row['u_Lname'];
                        $upd_email = $upd_row['u_email'];
                        $upd_phone = $upd_row['u_phone'];
                        $upd_password = $upd_row['u_password'];
                        $upd_address = $upd_row['u_address'];
                        $upd_date = $upd_row['u_date'];
                    }
                }
            ?>
            <input type="hidden" value="<?php echo $upd_id; ?>" name="uid">

            <div class="form-group">
                <label for="uName">Username</label>
                <input type="text" class="form-control" id="uName" name="uName" value="<?php echo $upd_name; ?>" required>
            </div>

            <div class="form-group">
                <label for="uFname">First Name</label>
                <input type="text" class="form-control" id="uFname" name="uFname" value="<?php echo $upd_Fname; ?>" required>
            </div>

            <div class="form-group">
                <label for="uLname">Last Name</label>
                <input type="text" class="form-control" id="uLname" name="uLname" value="<?php echo $upd_Lname; ?>" required>
            </div>

            <div class="form-group">
                <label for="uEmail">Email</label>
                <input type="email" class="form-control" id="uEmail" name="uEmail" value="<?php echo $upd_email; ?>" required>
            </div>

            <div class="form-group">
                <label for="uPhone">Phone Number</label>
                <input type="text" class="form-control" id="uPhone" name="uPhone" value="<?php echo $upd_phone; ?>" required>
            </div>

            <div class="form-group">
                <label for="uPassword">Password</label>
                <input type="password" class="form-control" id="uPassword" name="uPassword" value="<?php echo $upd_password; ?>" required>
            </div>

            <div class="form-group">
                <label for="uAddress">Address</label>
                <input type="text" class="form-control" id="uAddress" name="uAddress" value="<?php echo $upd_address; ?>" required>
            </div>

            <div class="form-group">
                <label for="uDate">Date</label>
                <input type="date" class="form-control" id="uDate" name="uDate" value="<?php echo $upd_date; ?>" required>
            </div> <br>

            <button type="submit" name="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>

                

            </main>
        </div>
    </div>




</body>

</html>
