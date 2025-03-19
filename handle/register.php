<?php
session_start();
require_once '../inc/connect.php' ;
if(isset($_POST['submit'])){
// catch   // name   // email  // password // phone 
$name =trim(htmlspecialchars($_POST['name']));
$email =trim(htmlspecialchars($_POST['email']));
$password =trim(htmlspecialchars($_POST['password']));

// validation 
$errors=[];
// validatio name
if( $name==""){
    $errors[] = "name is required";
  }elseif(!is_string( $name)){
    $errors[]="name ust be string";
  }elseif(strlen( $name)>70){
    $errors[]="name must be less than 70 char ";
  }
// validation email
    if( $email==""){
        $errors[] = "email is required";
      }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors[]="email not correct";
      }
  
// validation pass
  if( $password==""){
    $errors[] = "password is required";
  }elseif(!is_numeric($password)){
    $errors[]="password must be number";
  }elseif(strlen($password)<6){
    $errors[]="password must be more than 6 ";
  }

// hash pass
    $hashedpassword = password_hash($password,PASSWORD_DEFAULT);
if(!empty($errors)){
    $_SESSION['errors']=$errors;
    $_SESSION['name']=$name;
    $_SESSION['email']=$email;
    header('location:../Register.php');
    exit ;
}
    $query = "INSERT INTO users(`name`,`email`,`password`)VALUES('$name','$email','$hashedpassword')";
    $run=mysqli_query($conn,$query);
    if($run) {
        $_SESSION['success'][] = " Registered successfully!";
    } else {
        $_SESSION['errors'][] = "Database error: Could not add post.";
    }
  
    mysqli_close($conn);
    header("Location: ../index.php");
    exit();
}
else{
    header('location:../Register.php');
}


