<?php 
session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    require_once 'inc/errors.php';
     ?>
<br>

<form method="POST" action="handle/register.php">
    <label for="name">Full Name:</label>
    <input type="text" name="name" id="name" value="<?php if(isset($_SESSION['name'])) echo $_SESSION['name'] ; unset( $_SESSION['name'])?>">
<br>
    <label for="email">Email Address:</label>
    <input type="email" name="email" id="email value="<?php if(isset($_SESSION['email'])) echo $_SESSION['email'] ; unset( $_SESSION['email'])?>">
<br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password"  >
<br>
    <button type="submit" name="submit">Register</button>
</form>

</body>
</html>