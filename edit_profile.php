<?php
// Include database connection file
include("connections/db.php"); 

// Start the session and check if the user is logged in
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch user details
$query = $conn->prepare("SELECT * FROM users WHERE u_id = ?");
$query->bind_param('i', $user_id);
$query->execute();
$user = $query->get_result()->fetch_assoc();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $u_Fname = $_POST['u_Fname'];
    $u_Lname = $_POST['u_Lname'];
    $u_email = $_POST['u_email'];
    $u_phone = $_POST['u_phone'];
    $u_password = $_POST['u_password'];
    $u_address = $_POST['u_address'];
    $u_date = $_POST['u_date'];

    // Use existing password if not changed
    $u_password = !empty($u_password) ? $u_password : $user['u_password'];

    // Update user details
    $update_query = $conn->prepare("UPDATE users SET u_Fname = ?, u_Lname = ?, u_email = ?, u_phone = ?, u_password = ?, u_address = ?, u_date = ? WHERE u_id = ?");
    $update_query->bind_param('sssssssi', $u_Fname, $u_Lname, $u_email, $u_phone, $u_password, $u_address, $u_date, $user_id);

    if ($update_query->execute()) {
        $_SESSION['success_message'] = "Profile updated successfully.";
        header('Location: index.php');
        exit();
    } else {
        $_SESSION['error_message'] = "An error occurred while updating the profile. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
    <style>
        /* Your provided CSS styles here */
        @import url('https://fonts.googleapis.com/css?family=Poppins');
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Poppins',sans-serif;
        }
        .welcome, .edit-profile-h1{
            margin-top: 40px;
            font-size: 2.5rem;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .updatebtn{
            background-color: #0a61e4;
            color: white;
            padding: 5px;
            border-radius: 8px;
            border-color: #0d6efd;
            margin-top: 15px;
            margin-bottom: 30px;
            float: right;
        }

        .updatebtn:hover{
            background-color: #22549F ;
        }

    </style>
    <!-- Bootstrap CSS -->
    <link link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
    <?php include("includes/header.php"); ?>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="welcome">
                    
                    <h1 class="edit-profile-h1">Welcome <?php echo $user['u_Fname']; ?>!</h1>
                </div>
                <h2 class="text-center mb-4">Edit Profile</h2>
                <?php
                if (isset($_SESSION['error_message'])) {
                    echo '<p style="color:red;">' . $_SESSION['error_message'] . '</p>';
                    unset($_SESSION['error_message']);
                }
                ?>
                <form action="edit_profile.php" method="post">
                    <div class="form-group">
                        <label for="u_Fname" placeholder="">First Name:</label>
                        <input type="text" class="form-control" id="u_Fname" name="u_Fname" value="<?php echo $user['u_Fname']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="u_Lname">Last Name:</label>
                        <input type="text" class="form-control" id="u_Lname" name="u_Lname" value="<?php echo $user['u_Lname']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="u_email">Email:</label>
                        <input type="email" class="form-control" id="u_email" name="u_email" value="<?php echo $user['u_email']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="u_phone">Phone:</label>
                        <input type="text" class="form-control" id="u_phone" name="u_phone" value="<?php echo $user['u_phone']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="u_password">Password:</label>
                        <input type="password" class="form-control" id="u_password" name="u_password">
                        <small class="form-text text-muted">Leave blank if you don't want to change the password</small>
                    </div>
                    <div class="form-group">
                        <label for="u_address">Address:</label>
                        <input type="text" class="form-control" id="u_address" name="u_address" value="<?php echo $user['u_address']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="u_date">Date:</label>
                        <input type="date" class="form-control" id="u_date" name="u_date" value="<?php echo $user['u_date']; ?>" required>
                    </div>
                    <input type="submit" class="updatebtn" value="Update Profile">
                </form>
            </div>
        </div>
    </div>
    <footer>
    <?php include("includes/footer.php");  ?>
    </footer>

</body>
</html>

<?php $conn->close(); ?>