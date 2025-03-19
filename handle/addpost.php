<?php
session_start();
require_once '../inc/connect.php';
if(isset($_POST['submit'])){
   
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
   
  if(!empty($errors)){
    $_SESSION["errors"] = $errors;
    $_SESSION['title']=$title;
    $_SESSION['content']=$content;
    header('Location:../AddPost.php');
    exit ;
  }
 
  $query = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";
  $run = mysqli_query($conn, $query);

  if($run) {
      $_SESSION['success'][] = "Post added successfully!";
  } else {
      $_SESSION['errors'][] = "Database error: Could not add post.";
  }

  mysqli_close($conn);
  header("Location: ../index.php");
  exit();

}else{
    
     header('Location:../index.php');
 }