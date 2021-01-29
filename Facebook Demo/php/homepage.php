<?php include"functions.php";?>
<?php include_once"db.php";?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="homepagestyle.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	</head>

		<body>
		<header>
			<div class="wrapper">
				<div class="logo">
					<img src="" alt="">
				</div>
                <?php 
                $id=$_GET['id'];
                $type=$_GET['type'];
                if($type=="Company"){
                
				echo'<ul class="nav-area">';
				echo"<li><a href='company.php?id={$id}&type={$type}'>Profile</a></li>";
				echo"<li></li>";
				echo"<li><a href='homepage.php?id={$id}&type={$type}'>Home</a></li>";
				echo"<li></li>";
					
				echo" </ul>";
                }else{
                    echo'<ul class="nav-area">';
				echo"<li><a href='profile.php?id={$id}&type={$type}'>Profile</a></li>";
				echo"<li></li>";
                echo"<li><a href='homepage.php?id={$id}&type={$type}'>Home</a></li>";
				echo"<li></li>";
                }
                
                    ?>
			</div>
            <br>
            <hr>

            <br>
            <br>
            <br>
            <br>
            <div class="container">
                <?php 
                global $connection;
                $query="SELECT * FROM posts ";
                $posting=mysqli_query($connection,$query);
                while($row=mysqli_fetch_assoc($posting)){
                    $post_id=$row['post_id'];
                    
                    $post_author=$row['username'];
                    $post_date=$row['date'];
                    $post_image=$row['image'];
                    $post_content=substr($row['post_content'],0,50);
               
                
                ?> 
                
            


                <h2>
                    <a href="post.php?p_id=<?php  echo $post_id; ?>"></a>
                </h2>
                <p class="lead">
                  <a href="profile.php?id=<?php echo $post_author; ?>" style="display:inline;"><?php echo "<h1>$post_author</h1>"; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date;?></p>
                <hr>
               <a href="post.php?p_id=<?php  echo $post_id; ?>&id=<?php echo $id ?>&type=<?php echo $type?>">    
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                    </a>
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php  echo $post_id; ?>&id=<?php echo $id ?>&type=<?php echo $type?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                
                <div class="row">
                <p class="pull-right" style="dispay:inline">Like:<a href="like.php?p_id=<?php echo $post_id ?>"><?php numberOfLikes($post_id) ?></a></p>
                </div>
                <div class="clearfix"></div>
                <a class="btn btn-primary" href="post.php?p_id=<?php  echo $post_id; ?>&id=<?php echo $id ?>&type=<?php echo $type?>">comment</a>
                <hr>
                
                <?php      
                   }
                ?>
                
                <?php  
                
                $query="SELECT * FROM companyposts ";
                $posting=mysqli_query($connection,$query);
                while($row=mysqli_fetch_assoc($posting)){
                    $post_id_company=$row['post_id'];
                    
                    $post_author_company=$row['companyName'];
                    $post_date_company=$row['date'];
                    $post_image_company=$row['image'];
                    $post_content_company=substr($row['post_content'],0,50);
                
                ?>
                
                
                <h2>
                    <a href="post.php?p_id=<?php  echo $post_id_company; ?>"></a>
                </h2>
                <p class="lead">
                  <a href="company.php?id=<?php echo $post_author_company; ?>&type=<?php $type ?>" style="display:inline;"><?php echo "<h1>$post_author_company</h1>"; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date_company;?></p>
                <hr>
               <a href="postcompany.php?p_id=<?php  echo $post_id_company; ?>&id=<?php echo $id ?>&type=<?php echo $type ?>">    
                <img class="img-responsive" src="images/<?php echo $post_image_company ?>" alt="">
                    </a>
                <hr>
                <p><?php echo $post_content_company; ?></p>
                <a class="btn btn-primary" href="postcompany.php?p_id=<?php  echo $post_id_company; ?>&id=<?php echo $id ?>&type=<?php echo $type ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                
                <div class="row">
                    <p class="pull-right" style="dispay:inline">Likes : <a href="like.php?p_id=<?php echo $post_id_company?>"><?php numberOfLikes($post_id_company) ?></a></p>
                </div>
                <a class="btn btn-primary" href="postcompany.php?p_id=<?php  echo $post_id_company; ?>&id=<?php echo $id ?>&type<?php echo $type ?>">comment</a>
                <?php }?>
            </div>
		</header>

            
       
	</body>
</html>
