<?php include"logins.php"?>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="styleelogin.css">
</head>
<body>
    <div class="container">
    <h1>Welcome To The Website</h1>
    <p>Enter Your Info </p>
    <div class="center">
        <form method="post">
    <input type="email" name="email" placeholder="Enter Your Mail" id="E">
        <br>
    <input type="password" name="password" placeholder="Enter Your Password" id="P">
        <br>
            
            <p>
    Not a user? <a href ="new.php">Sign Up</a>
</p>
            <br>
    <button id="L" name="loggedin">Login</button>
            
        </form>
        </div>
        </div>
</body>
</html>