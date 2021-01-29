<?php include"functions.php";?>
<?php include_once"db.php";?>
<?php ob_start()?>
<html>
  <head>
    <title>Facebook</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="style1.css">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <div class="fb-profile-block">
            <div class="fb-profile-block-thumb cover-container"></div>
            <div class="profile-img">
              <a href="#">
                <img src="amr.jpg" alt="" title=""/>
              </a>
            </div>
              <?php 
        $id=$_GET['id'];
              
        ?>
            <span class="text" name="name"><?php echo $id?></span>

      </div>
      <div class="col-sm">
        <div class="card pl-2 pt-2 pr-2" style="height:250px">
          <a href="#" style="color: #1c1e21">

            <button class="btn btn-primary" name= "edit">Edit</button>
          </a>
          <div class="bio d-flex justify-content-center">
            <img src="msg.png" style="width: 40px; margin-right: 4px" />
          </div>
          <div class="add bio d-flex justify-content-center"style="font-size: 12px; color: gray">
            Add a short bio to tell people more about yourself.
          </div>
          <br>
          <div class="addBio d-flex justify-content-center">
          <button class="btn btn-primary" name= "edit">Add Bio</button>
        </div>
        <hr/>
        <div class="job pl-2 pt-2 pr-2">
            <a href="#" style="color: #1c1e21">
          <img  src="job.png"style="width: 22px; margin-right: 4px"/>Works at<span style="color: #385898;"> Company</span>
              </a>
        </div>

      </div>
    </div>
          </div>
        </div>
        
      <div class="container"id="test">
        <br />
        <div class="row">
          <div class="col-md-12">
              
              <form action="profile.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data"> 
                  <input type="hidden"name="size"value="1000000">
                  <div>
                  <input type="file"name="image">
                  </div>
                  <div>
                  <textarea name="text"cols="40"rows="4" style="width:900px;height:100px;"placeholder="Write What you want?"></textarea>
                  </div>
                  <div>
                      <input type="submit"name="upload"value="Upload Image">
                    
                  </div>
                   
                <?php
    
              create($id);
             
              ?>
              
            
              </form>
              
    
              
              
          </div>
        </div>
        <br/>
        <div class="row">
          <div class="col-md-12">
            <div class="container">
            <?php
                global $connection;
                $id=$_GET['id'];
                
                $query="SELECT * FROM posts WHERE username = '$id' ORDER BY date DESC ";
               
                
                $select_all_post_query=mysqli_query($connection,$query);
                
                
                while($row=mysqli_fetch_assoc($select_all_post_query)){
                    $post_id=$row['post_id'];
                    $post_author=$row['username'];
                    $post_date=$row['date'];
                    $post_image=$row['image'];
                    $post_content=substr($row['post_content'],0,50);
                
                    
                    ?>
                
                
                
                
                <h1 class="page-header">
                   
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php  echo $post_id; ?>"></a>
                </h2>
                <p class="lead">
                  <a href="profile.php?id=<?php echo $id; ?>" style="display:inline;"><?php echo "<h1>$post_author</h1>"; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date;?></p>
                <hr>
               <a href="post.php?p_id=<?php  echo $post_id; ?>">    
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                    </a>
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                <a class="btn btn-primary" href="#">like </a>
                <a class="btn btn-primary" href="#">comment</a>

            
               <?php }  ?> 
        
                 
                <hr>
            </div>
          </div>
        </div>
        <br/>
      </div>
      </div>
  </body>



 
    

</html>
