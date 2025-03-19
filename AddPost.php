 <?php session_start(); ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


 
    <h3>add new Post</h3>
   <?php
     require_once 'inc/errors.php';
              ?>

  <form method="POST" action="handle/addpost.php" >
        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="<?php if(isset($_SESSION["title"])) echo $_SESSION["title"] ; unset( $_SESSION["title"])?>">
    <br>
    <br>
        <label for="content" >Content</label>
        <textarea id="content" name="content" rows="5"><?= isset($_SESSION['content']) ? htmlspecialchars($_SESSION['content']) : '' ?></textarea>
        <?php unset($_SESSION['content']); ?>
    <br>
    <br>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  </form>

</body>
</html>