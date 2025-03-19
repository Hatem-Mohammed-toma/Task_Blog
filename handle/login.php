<?php
session_start();
require_once '../inc/connect.php';
if(isset($_POST['submit'])){
    $email =trim(htmlspecialchars($_POST['email']));
    $password =trim(htmlspecialchars($_POST['password']));
  

    $errors = [];
    //validation email
    if($email==""){
        $errors[] = "email is required";
      }elseif(is_numeric($email)){
        $errors[]="password must be number";
      }
      elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
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
    

      if(!empty($errors)){
        $_SESSION['errors'] = $errors;
        header('Location:../Login.php');
        exit ;
      } 
        $query= "select * from users where `email`='$email'";
        $run = mysqli_query($conn,$query);

        if(mysqli_num_rows($run)==1){
            $user=mysqli_fetch_assoc($run);
            $id =$user['id'];
            $user_name =$user['name']; //welcome
            $oldpassword =$user['password'];
           $password_verified= password_verify($password,$oldpassword);           
           if($password_verified){
            $_SESSION['user_id']= $id; 
            $_SESSION['role'] = $user['role'];            
            $_SESSION['success'][] = "welcome $user_name"; 
            header("location:../index.php");
            exit;
           }else{
                 $_SESSION['errors'][] = "credentials are not correct";
                header("location:../Login.php");
           }

        }else{
            $_SESSION['errors'][] = "email doesn't exit";
            header("location:../Login.php"); 
        }

}else{
    
     header('Location:../index.php');
   
}