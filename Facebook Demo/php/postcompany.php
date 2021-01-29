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
				echo'<li><a href="homepage.php">Home</a></li>';
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
                       

            
            <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
               
                 <?php
                if(isset($_GET['p_id'])){
                    $the_post_id = $_GET['p_id'];
                
                
                $query="SELECT * FROM companyposts WHERE post_id = $the_post_id ";
                $select_all_post_query=mysqli_query($connection,$query);
                
                    while($row=mysqli_fetch_assoc($select_all_post_query)){
                    $post_author=$row['companyName'];
                    $post_date=$row['date'];
                    $post_image=$row['image'];
                    $post_content=$row['post_content'];
                
                    
                    
                    ?>
                
                
                
                
                <!-- First Blog Post -->
                
                <p class="lead">
                    by <a href='company.php?id=<?php echo $post_author; ?>&type=<?php echo "Company" ?>'><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date;?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <form class="form-group" method="post">
                    <button class="pull-left" name="liking"><span class='glyphicon glyphicon-thumbs-up'></span>Like</button>
                </form>

                <hr>
            
               <?php 
                    
                    likes($id,$the_post_id);
                    }}  ?> 
                
                
                
                
                
                
                
                
                
                
                <!-- Blog Comments -->
                
                <?php 
                if(isset($_POST['create_comment'])){
                    $the_post_id=$_GET['p_id'];
                    $comment_author=$_POST['comment_author'];
                   $comment_content=$_POST['comment_content'];
                $query="INSERT INTO companycomments (comment_post_id, comment_author, comment_content, comment_date)";
                $query.="VALUES($the_post_id, '{$comment_author}', '{$comment_content}', now())";
                $create_comment_query=mysqli_query($connection,$query);
                    if(!$create_comment_query){
                        die('query failed'.mysqli_error($connection));
                    }
                }
                ?>

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form  action="" method="post"role="form">
                        <div class="form-group">
                        <label for="Author">Author</label>
                            <input type="text"name="comment_author"class="form-control"name="comment_author"value="<?php echo $id ?>">
                        </div>
                        
                        <div class="form-group">
                        <label for="comment">Your Comment</label>
                            <textarea type="text"name="comment_content"class="form-control"rows="3"></textarea>
                        </div>
                        
                        
                        <button type="submit" name="create_comment"class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
  <!-- Posted Comments -->
                
                
                
                <?php 
                $query="SELECT * FROM companycomments WHERE comment_post_id = {$the_post_id} ";
                $query.="ORDER BY comment_id DESC ";
                $select_comment_query=mysqli_query($connection,$query);
                if(!$select_comment_query){
                    die('QUERY FIELD'.mysqli_error($connection));
                }
                while($row=mysqli_fetch_assoc($select_comment_query)){
                    $comment_date=$row['comment_date'];
                    $comment_content=$row['comment_content'];
                    $comment_author=$row['comment_author'];
                
                
                ?>
                
                
                
                
                
                
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author ;?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                    </div>
                </div> 
                
                
                
                
                
                <?php } ?>

                
            </div>
                </div>
            </div>
             </header>
            
    </body>
</html>
                
                
                
            
            