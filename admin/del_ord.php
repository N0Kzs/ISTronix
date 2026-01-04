<?php
include("../connections/db.php");
$del = $_GET['ord_del'];
mysqli_query($conn,"DELETE FROM orders WHERE o_id = $del");
header("Location: all_orders.php");  

?>