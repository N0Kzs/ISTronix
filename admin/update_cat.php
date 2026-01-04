<html>

<?php
include("../connections/db.php");

if (isset($_POST["submit"])) {
    $id = $_POST["cid"];
    $name = $_POST["cName"];
    $date = $_POST["cDate"];
    $des = $_POST["cDes"];

    if ($_FILES["image"]["error"] == 4) {
        echo "<script> alert('Image Does Not Exist'); </script>";
    } else {
        $fileName = $_FILES["image"]["name"];
        $fileSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];

        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));
        if (!in_array($imageExtension, $validImageExtension)) {
            echo "<script> alert('Invalid Image Extension'); </script>";
        } else if ($fileSize > 1000000) {
            echo "<script> alert('Image Size Is Too Large'); </script>";
        } else {
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;

            move_uploaded_file($tmpName, '../assets/images/Categories/' . $newImageName);
            $query = "UPDATE categories SET c_name='$name', c_description='$des', c_date='$date', c_img='$newImageName' WHERE c_id='$id'";
            mysqli_query($conn, $query);
            header("Location: all_categories.php");
        }
    }
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
                <br>
                <div>
                    <h4 class="mb-0 text-white bg-primary p-2 rounded">Edit Categories</h4>
                </div>
                <div class="table-responsive m-t-40">
                    <form action="update_cat.php" method="POST" class="p-4 border rounded bg-light" enctype="multipart/form-data">
                        <?php 
                        $upd_sql = "SELECT * from categories WHERE c_id = '".$_GET['cat_upd']."'";
                        $upd_res = $conn->query($upd_sql); 
                        $upd_row = mysqli_fetch_array($upd_res);
                        ?>
                        <input type="hidden" value="<?php echo $upd_row['c_id']; ?>" name="cid">
                        
                        <div class="form-group">
                            <Label>Category Name</Label>
                            <input type="text" name="cName" value="<?php echo $upd_row['c_name']; ?>" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <Label>Date Added</Label>
                            <input type="date" name="cDate" value="<?php echo $upd_row['c_date']; ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label><br>
                            <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" value=""> 
                        </div>

                        <div class="form-group">
                            <Label>Category Description</Label>
                            <textarea name='cDes' rows='4' cols='68' class="form-control"><?php echo $upd_row['c_description']; ?></textarea>
                        </div>
                        
                        <button type="submit" name="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
