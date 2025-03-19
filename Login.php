<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php require_once 'inc/success.php';
      require_once 'inc/errors.php';
?>
<form class="form" action="handle/Login.php" method="post">           
    <label for="email">Email Address:</label>
    <input type="email" name="email" id="email">
    <br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password">
<br>
    <button type="submit" name="submit">Login</button>
</form>

</body>
</html>