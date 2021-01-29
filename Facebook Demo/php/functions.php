
<?php
function function_alert($message) { 
      
    // Display the alert box  
    echo "<script>alert('$message');</script>"; 
} 

function create($id){
    
   
              $msg="";
              global  $connection;
              if(isset($_POST['upload'])){
                  $post_date=date('d-m-y');
                  
                  $post_coment_count=4;
                  $target="images/".basename($_FILES['image']['name']);
                  $images=$_FILES['image']['name'];
                  $text=$_POST['text'];
                  $query="INSERT INTO posts (date,post_content,post_comment_count,image,username)";
                  $query.="VALUES(now(),'$text','$post_coment_count','$images','$id')";
                  mysqli_query($connection,$query);
                  if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
                      $msg="Image Uploaded Successfully";
                      header("Location:profile.php?id={$id}");
                  }else{
                      $msg="there is problem uploading images";
                  }
              }
              
    

}
function createforcompany($id,$type){
    $msg="";
              global  $connection;
              if(isset($_POST['upload'])){
                  $post_date=date('d-m-y');
                  
                  $post_coment_count=4;
                  $target="images/".basename($_FILES['image']['name']);
                  $images=$_FILES['image']['name'];
                  $text=$_POST['text'];
                  $query="INSERT INTO companyposts (date,post_content,post_comment_count,image,companyName)";
                  $query.="VALUES(now(),'$text','$post_coment_count','$images','$id')";
                  mysqli_query($connection,$query);
                  if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
                      $msg="Image Uploaded Successfully";
                      header("Location:company.php?id={$id}&type={$type}");
                  }else{
                      $msg="there is problem uploading images";
                  }
              }
}

function likes($id,$p_id){
    $posst_id;
    if(isset($_POST['liking'])){
        global $connection;
        $sql = "select * from likes where user_id = '$id' ";
        $selecting=mysqli_query($connection,$sql);
        while($row=mysqli_fetch_assoc($selecting)){
            $post_id=$row['post_id'];
            $posst_id=$post_id;
        }
        
        if($p_id==$posst_id){
           
            function_alert("you are already like this post");
        }
        else{
            $query="INSERT INTO likes (user_id,post_id)";
            $query.="VALUES('$id','$p_id') ";
            $liking=mysqli_query($connection,$query);
        }
        
    }
    
    
    
}

function numberOfLikes($post_id){
    global $connection;
    $query = "SELECT * FROM likes WHERE post_id = $post_id";
    $getnumber=mysqli_query($connection,$query);
    $number=mysqli_num_rows($getnumber);
    echo $number;
}

function showlikes($post_id){
    global $connection; 
    $query="SELECT * FROM likes WHERE post_id = $post_id";
    $queryshowing=mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($queryshowing)){
        $name=$row['user_id'];
       echo "<table class='table'>";
  echo"<thead>";
    echo"<tr>";
      
     echo "<th scope='col'>Image</th>";
     echo"  <th scope='col'>NAME</th>";
      
   echo "</tr>";
  echo"</thead>";
  echo"<tbody>";
    echo"<tr>";
     
     echo" <td><img class='media-object' src='http://placehold.it/64x64' alt=''></td>";
     echo" <td>$name</td>";
     
    echo"</tr>";
    
    }
}




?>