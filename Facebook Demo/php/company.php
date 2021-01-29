<?php include"functions.php";?>
<?php include_once"db.php";?>

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
              $type=$_GET['type'];
        ?>
            <span class="text" name="name"><?php echo $id?></span>

            

      </div>
      <div class="col-sm">
        <div class="card pl-2 pt-2 pr-2" style="height:200px">

          <br>
        <hr/>
        <div class="job pl-2 pt-2 pr-2">
            <a href="#" style="color: #1c1e21">
          <img  src="job.png"style="width: 22px; margin-right: 4px"/>Works in<span style="color: #385898;"> Cars</span>
              </a>
              <br>
              <a href="#" style="color: #1c1e21">
            <img  src="job.png"style="width: 22px; margin-right: 4px"/>Number of user is<span style="color: #385898;"> 100</span>
                </a>

        </div>

      </div>
    </div>
          </div>
        </div>
        <div class="contatiner">
            <form action=""method="post">
  <div class="form-group">
    <label for="ADDING Admin">Add Admin:</label>
  </div>
  <div class="form-group">
    <label for="Admin Name">Admin Name:</label>
    <input type="text" style="width:900px;" class="form-control"name="adminname" >
  </div>
  <button type="submit" name="addadmin" class="btn btn-primary">Submit</button>
                
    <?php
    
    if(isset($_POST['addadmin'])){
        $admin_name=$_POST['adminname'];
        $company_name=$id;
         $sql = "select * from register where name = '$admin_name'";
        $result =    mysqli_query($connection, $sql);  
        $row    =    mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count  =    mysqli_num_rows($result);
        
          
        if($count == 1){  
            
            $sql="SELECT * FROM admin Where admin_name ='$admin_name' AND company_name='$company_name'";
            
            $res =    mysqli_query($connection, $sql);  
            $row    =    mysqli_fetch_array($res, MYSQLI_ASSOC);  
            $coun  =    mysqli_num_rows($res);
            if($coun==1){
                 echo "<h1><center> user already admin </h1>";
            }else{
            
            $query="INSERT INTO admin (admin_name, company_name)";
            $query.="VALUES('{$admin_name}','{$company_name}') ";
                
            $adding=mysqli_query($connection,$query);
            
            echo "<h1><center> Admin added successfully </h1>";  
            
            }
        }  
        else{  
            echo "<h1> Adding failed. Invalid username </h1>";  
        }
    }
                
    ?>
                
</form>
        
        </div>
     <div class="container"id="test">
        <br />
        <div class="row">
          <div class="col-md-12">
              <form action="company.php?id=<?php echo $id ?>&type=<?php echo $type ?>" method="post" enctype="multipart/form-data"> 
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
            
              </form>
              <?php 
              createforcompany($id,$type);
              ?>
              
              
          </div>
        </div>
        <br/>
       <div class="row">
          <div class="col-md-12">
            <div class="container">
            <?php
                global $connection;
                $id=$_GET['id'];
                
                $query="SELECT * FROM companyposts WHERE companyName = '$id' ORDER BY date DESC ";
               
                
                $select_all_post_query=mysqli_query($connection,$query);
                
                
                while($row=mysqli_fetch_assoc($select_all_post_query)){
                    $post_id=$row['post_id'];
                    $post_author=$row['companyName'];
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
                  <a href="company.php?id=<?php echo $id; ?>&type={}" style="display:inline;"><?php echo "<h1>$post_author</h1>"; ?></a>
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
