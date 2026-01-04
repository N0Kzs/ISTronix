<html>
    
<?php
include("../connections/db.php");

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
                <br>

        <div class="container mt-4">
            <div>
                <h4 class="mb-4 text-white bg-primary p-2 rounded">All Orders</h4>
            </div>
                <div class="table-responsive m-t-45">
                    <table class="table table-hover table-bordered table-striped align-items-center">
                        <thead class="table-info align-items-center">
                            <tr>
                                <th scope="col">User</th>
                                <th scope="col">Product</th>
                                <th scope="col">Date</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>	
                                <th scope="col">Total</th>											
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>                                        						
					<?php
						$sql="SELECT * FROM (((orders
                        INNER JOIN users ON orders.u_id = users.u_id)
                        INNER JOIN product ON orders.p_id = product.p_id)
                        INNER JOIN invoice ON orders.in_id = invoice.in_id)   
                        order by o_id desc";
						$query=$conn->query($sql);
							if(!mysqli_num_rows($query) > 0 ){
								echo '<td colspan="7"><center>No Available Orders</center></td>';
							}else{				
								while($rows=mysqli_fetch_array($query)){											
									echo   "<tr><td>".$rows['u_name']."</td>
											<td>".$rows['p_name']."</td>
											<td>".$rows['o_date']."</td>
                                            <td>".$rows['o_quantity']."</td>
                                            <td>".$rows['o_prize']."</td>
                                            <td>".$rows['in_priceTotal']."</td>																								
											<td> 
											<a class='btn btn-outline-primary' href='update_ord.php?ord_upd=".$rows['o_id']."'>Edit</a>
                                            <a class='btn btn-outline-danger' href='del_ord.php?ord_del=".$rows['o_id']."'>Delete</a> 
											</td></tr>";
								}	
							}
						?>
                </tbody>
            </table>
        </div>
    </div>
    


            </main>
        </div>
    </div>





  
    

</body>

</html>
