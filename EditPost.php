<?php session_start(); ?>
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
<?php 
require_once 'inc/connect.php';
if(isset($_GET['id'])){
  $id = $_GET['id'];

  $query = "select * from posts where id=$id";
  $runQuery = mysqli_query($conn,$query);
  if(mysqli_num_rows($runQuery) == 1){
    $post = mysqli_fetch_assoc($runQuery);
  }else{
    header("location:index.php");
  }
}
?>
<div class="container">
    <div>
    <h3 >edit Post</h3>
  </div>

    <form method="POST"  action="handle/editpost.php?id=<?=$post['id']?>">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($post['title']); ?>">
            </div>
            <br>
        <div class="mb-3">
            <label for="body" class="form-label">content</label>
            <textarea class="form-control" id="content" name="content" rows="5"><?php echo ($post['content']); ?></textarea>
            </div>
       <br>
        <button type="submit"  name="submit">Submit</button>
    </form>
</div>

</body>
</html>