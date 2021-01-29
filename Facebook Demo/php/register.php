<?php 
include_once"db.php";
?>
<?php include"functions.php"?>
<?php 
session_start();
$errors = array(); 

 global $connection;



if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $date_of_birth=$_POST["dateOfbirth"];
    
     $target="images/".basename($_FILES['image']['name']);
     $images=$_FILES['image']['name'];
    
    $type=$_POST["type"];
    
    //
    $user_check_query = "SELECT * FROM register WHERE name='$name' OR email='$email' LIMIT 1";
    $result = mysqli_query($connection, $user_check_query);
    $user= mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['name'] === $name) {
      array_push($errors, "Username already exists");
        function_alert("username already exists");
       
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
        echo"email already exists";
        function_alert("email already exists");
    }
  }
    else{
        
        
        
    
        $query="INSERT INTO register (name,email,password,dateOfbirth,type,photo) VALUES('$name','$email','$password','$date_of_birth','$type','$images');";
        mysqli_query($connection, $query);
  	$_SESSION['name'] = $name;
  	$_SESSION['success'] = "You are now logged in";
  	
    }
    if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
                      $msg="Image Uploaded Successfully";
                  }else{
                      $msg="there is problem uploading images";
                  }
    
}

?>