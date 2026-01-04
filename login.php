
<head>
  <meta charset="UTF-8">
  <title>Login</title>
     

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">



</head>

<body>


<?php
include("connections/db.php"); 
error_reporting(0); 
session_start(); 
if(isset($_POST['submit']))  
{
    $username = $_POST['username'];  
    $password = $_POST['password'];
    
    if(!empty($_POST["submit"]))   
     {
    $loginquery ="SELECT * FROM users WHERE u_name='$username' && u_password='$password'"; //selecting matching records
    $result=mysqli_query($conn, $loginquery); //executing
    $row=mysqli_fetch_array($result);
    
                            if(is_array($row)) 
                                {
                                        $_SESSION["user_id"] = $row['u_id']; 
                                         header("refresh:1;url=index.php"); 
                                } 
                            else
                                {
                                    $error_message = "The username or password you've entered does not match. Please try again."; 
                                }
     }
    
    
}
?>
  
  <div class="log-container" id="signIn">
        <h1 class="form-title">Login to your account</h1>
        <a href="index.php" class="logclose-icon"><i class="fas fa-times"></i></a>
        <!--Error Pop Up-->
        <?php if(isset($error_message)): ?>
        <div class="error-message show"><?php echo $error_message; ?></div>
        <?php endif; ?>
          <form class="login-form" method="post" action="">
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input class="log-input" type="text" placeholder="Username"  name="username"/>
                <label class="unclick" for="email">Username</label>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input class="log-input" type="password" placeholder="Password" name="password"/>
                <label class="unclick" for="password">Password</label>
            </div>
              <input class="log-input" type="submit" id="log-btn" name="submit" value="Login" />
          </form>
          

          <div class="cta"><p>Not registered? <a href="registration.php" style="color:#5c4ac7;">Create an account.</a></p></div>
        </div>
    </form>



  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>



</body>

