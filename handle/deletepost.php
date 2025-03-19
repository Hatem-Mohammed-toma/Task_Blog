<?php
session_start();
require_once '../inc/connect.php';
if (!isset($_SESSION['user_id']) && $_SESSION['role'] !== 'admin') {
    header("location:../Login.php");
}
if(isset($_GET['id'])) {  
    $id = intval($_GET['id']); // Ensure it's a number

    $query = "DELETE FROM posts WHERE id = $id";
    $run = mysqli_query($conn, $query);

    if($run) {
        $_SESSION['success'][] = "Post deleted successfully!";
    } else {
        $_SESSION['error'][] = "Failed to delete post.";
    }
}else {
    $_SESSION['error'] = "Invalid request.";
}

header("Location: ../index.php");
exit();