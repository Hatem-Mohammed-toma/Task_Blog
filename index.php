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
     require_once 'inc/success.php'
     ?>
<br>
<br>
<nav>
        <ul>
            <li><a href="index.php">All Posts</a></li>
            <li><a href="AddPost.php">Add New Post</a></li>
            <li><a href="Register.php">Register</a></li>

            <?php if(isset($_SESSION['user_id'])): ?>
                <li><a href="handle/logout.php">Logout</a></li>
            <?php else: ?>
                <li><a href="Login.php">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>
<br>

<?php 
require_once 'inc/connect.php'; 

 $query="select * from  posts ";
 $run = mysqli_query($conn,$query);
 if(mysqli_num_rows($run) >0 ){
   $posts=mysqli_fetch_all($run,MYSQLI_ASSOC);
 }else{
   $msg = "no posts founded";
 }
 ?>

<div class="latest-posts">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest Posts</h2>
            </div>
          </div>
          <div class="col-md-4">

          <?php if (!empty($posts)): ?>
        <?php 
        $index = 1;
        foreach ($posts as $post): ?>
            <div class="post-item">
                <div class="down-content">
                    <h4><?= $post['title'] ."<br>" ?></h4>
                    <div class = "m-3"></div>
                    <p class="body-content"><?= $post['content']?></p>
                    <h6><?= $post['created_at'] ?></h6>
                  
                    <div >
                        <a href="viewPost.php?id=<?= $post['id'] ?>" >View</a>
                    </div>
                </div>
            </div>
        <?php 
        $index++;
      endforeach; ?>
    <?php else: ?>
        <?php echo $msg; ?>
    <?php endif; ?>
          </div>
          
        </div>
      </div>
    </div>

 
</body>
</html>