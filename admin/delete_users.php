<?php
include("../connections/db.php");

if(isset($_GET['user_del'])){
    $user_id = $_GET['user_del'];

    // Prepare the delete statement
    $sql = "DELETE FROM users WHERE u_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);

    if($stmt->execute()){
        // Redirect back to the users page after deletion
        header("Location: adm_user.php");
        exit();
    } else {
        echo "Error deleting user: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>