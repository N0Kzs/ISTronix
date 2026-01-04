<html>
<?php
include("../connections/db.php");

if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if(!empty($_POST["submit"])){
	    $loginquery ="SELECT * FROM admin WHERE admin_username='$username' && admin_password='$password'";
	    $result = $conn->query($loginquery);
	    $row=mysqli_fetch_array($result);
	
	    if(is_array($row)){
            $_SESSION["admin_id"] = $row['admin_id'];
			header("Location: dashboard.php");
	    }else{
			header("Location: index.php");
        }
	}
}

?>

<head>
  <title>Admin Login</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <h1>Admin Panel </h1>
  <form action="index.php" method="post">
    <input type="text" placeholder="Username" name="username"/>
    <input type="password" placeholder="Password" name="password"/>
    <input type="submit"  name="submit" value="Login" />
  </form>
</body>

</html>
