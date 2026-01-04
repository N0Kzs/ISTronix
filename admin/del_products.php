<?php
include("../connections/db.php");
$del = $_GET['prod_del'];
mysqli_query($conn,"DELETE FROM product WHERE p_id = $del");
header("Location: all_products.php");  

?>