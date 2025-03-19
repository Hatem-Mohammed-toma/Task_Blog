<?php
session_start();
require_once '../inc/connect.php' ;
if (!isset($_SESSION['user_id']) && $_SESSION['role'] !== 'admin') {
    header("location:../Login.php");
}
if(isset($_POST['submit']) && isset($_GET['id'])){
        $id=$_GET['id'] ;

    $title = trim(htmlspecialchars($_POST['title']));
    $content =trim(htmlspecialchars($_POST['content']));
 
    $errors=[];
    // Title validation
    if(empty($title)) {
        $errors[] = "Title is required.";
    } elseif(is_numeric($title)) {
        $errors[] = "Title must be a string.";
    } elseif(strlen($title) < 5) {
        $errors[] = "Title must be at least 5 characters long.";
    }
     // Content validation
     if(empty($content)) {
        $errors[] = "Content is required.";
    } elseif(strlen($content) < 20) {
        $errors[] = "Content must be at least 100 characters long.";
    }elseif(is_numeric($content)) {
        $errors[] = "content must be a string.";
    }
   //
    $query = "select * from posts where id=$id";
    $run = mysqli_query($conn,$query);
    if(mysqli_num_rows($run)==1){
        $post= mysqli_fetch_assoc($run);
    }else{
        header("location:../index.php");
    }
    if(!empty($errors)){
        $_SESSION["errors"] = $errors;
        $_SESSION['title']=$title;
        $_SESSION['body']=$body;
        header("Location: ../EditPost.php?id=$id");
            exit;
    }
     $query = "UPDATE posts SET title = '$title', content = '$content' WHERE id = $id";
         $run = mysqli_query($conn, $query);
     if($run) {
             $_SESSION['success'][] = "Post updated successfully";
     }else {
             $_SESSION['errors'][] = "Database error: Could not update post.";
      }
      header("location:../viewPost.php?id=$id");              
      exit();

    }else{
        header('Location:../index.php');
    }

    