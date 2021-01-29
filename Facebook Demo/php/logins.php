<?php include"db.php"?>
<?php
    if(isset($_POST["loggedin"])){
    global $connection;
        $name="";
        $type="";
    
   $username = $_POST['email'];  
    $password = $_POST['password'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($connection, $username);  
        $password = mysqli_real_escape_string($connection, $password);  
      
        $sql = "select * from register where email = '$username' and password = '$password'";  
        $query="SELECT * FROM register WHERE email = '$username' ";
         
        $selecting=mysqli_query($connection,$query);
        
        $result =    mysqli_query($connection, $sql);  
        $row    =    mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count  =    mysqli_num_rows($result);
         
         
        while($col=mysqli_fetch_assoc($selecting)){
            $nn=$col['name'];
            $typing=$col['type'];
            $name=$nn;
            $type=$typing;
        }
        if($type=='NormalUser'){
        header("Location:homepage.php?id={$name}&type={$type}");
        }else{
                   header("Location:homepage2.php?id={$name}&type={$type}");
 
        }
        if($count == 1){  
            
            echo "<h1><center> Login successful </center></h1>";  
            
            //echo"<a href='homepage.php?id={$username}";
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }
    }
?>  
