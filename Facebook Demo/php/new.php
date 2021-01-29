<?php include"register.php"?>
<html>
<head>
 <title>Register</title>
 <link rel="stylesheet" href="styler.css">
</head>
<body>
    <div class="container">
        <form method="post">
 <h2>Enter Your info </h2>
  <input type="text" name ="name" placeholder="Enter Your Name" id="N">
    <br>
  <input type="email" name ="email" placeholder="Enter Your Email" id="E">
    <br>
  <input type="password" name ="password" placeholder="Enter Your Password" id="P">
    <br>     
  <input type="date" name ="dateOfbirth" placeholder="Enter Your Date Of Birth" id="D">
            <br>
  <input type="radio" name="type" value="NormalUser"> 
            <label>Normal User</label>
            <input type="radio" name="type" value="Company"> <label>Company</label> 
            
            <br>
            <br>
             <input type="file"name="image">
            <div>
                      <input type="submit"name="upload"value="Upload Image">
                  </div>
            <br>
            <p>
           Already a member? <a href ="login.php">Sign in</a>
            </p>
  <button name="submitt" id="S">Submit</button>
            </form>
    </div>
     
</body>
</html>