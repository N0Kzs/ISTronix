<?php
include("../connections/db.php");
$del = $_GET['cat_del'];
mysqli_query($conn,"DELETE FROM categories WHERE c_id = $del");
header("Location: all_categories.php");  

?>