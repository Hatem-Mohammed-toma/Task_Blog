<?php 
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
</head>
<body>
   
<?php require_once 'inc/success.php';
      require_once 'inc/errors.php';
?>
<br>
<br>

<?php 
 require_once 'inc/connect.php' ;

 if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = (int)$_GET['id'];

$query = "select * from posts where id = $id";
$run = mysqli_query($conn, $query);
if(mysqli_num_rows($run)==1){
  $post= mysqli_fetch_assoc($run);
}else{
 $msg="no post founded ";
}
?>
<div class="best-features about-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>View Post</h2>
            </div>
          </div>
      
          <div class="col-md-6">
          <div>
    <h4><?= $post['title'] ?></h4>
    <p><?= $post['content'] ?></p>

    <?php if (isset($_SESSION['user_id']) && $_SESSION['role'] == 'admin'): ?>
        <div>
            <a href="EditPost.php?id=<?= $post['id'] ?>">Edit Post</a>
            <br><br>
            <form action="handle/deletepost.php?id=<?= $post['id'] ?>" method="POST">            
                <button type="submit" name="delete" class="btn btn-danger">Delete Post</button>
            </form>  
        </div>
    <?php endif; ?>
</div>
          </div>
        </div>
      </div>
</div>
</body>
</html>