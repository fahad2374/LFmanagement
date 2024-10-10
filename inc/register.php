<?php
include "../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO user (firstname, lastname, email, username, password, created_at)
    VALUES ('$first_name', '$last_name', '$email', '$username', '$password', CURRENT_TIMESTAMP)";

    if ($conn->query($sql) === TRUE) {
        header('location:register.php');
       // echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Lost and Found</title>
<link href="http://fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css" />
<link href="../style.css" rel="stylesheet" type="text/css" media="screen" />
<link href="../asset/css/ssregister.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="asset/js/jquery.slidertron-1.0.js"></script>
<script type="text/javascript" src="asset/js/jquery.dropotron-1.0.js"></script>
<script type="text/javascript" src="asset/js/jquery.poptrox-1.0.js"></script>
</head>
<body>
<div id="wrapper">
    <div id="header-wrapper">
        <div id="header">
            <div id="logo">
                <h1><a href="#">Lost And Found Management System</a> </h1>
                
            </div>
        </div>
    </div>
    <!-- end #header -->
    <div id="menu-wrapper">
        <ul id="menu">
              <li><a href="../index.php"><span>Homepage</span></a></li>
            <li><a href="blog.php"><span>Blog</span></a></li>
            <li><a href="about.php"><span>About</span></a></li>
            <li><a href="contactus.php"><span>Contact</span></a></li>
            <li><a href="../login.php"><span>login</span></a></li>
        </ul>
        <script type="text/javascript">
            $('#menu').dropotron();
        </script>
    </div>
    <!-- end #menu -->


    <div id="page">
        <div id="sidebar-bg">
            <div id="sidebar">
                <ul>
                    
                    <li>
                        <h2>Menu</h2>
                        <ul>
                          <li><b><a href="register.php">Register</a></b></li>
                          <li><a href="lost.php">Lost & Found Item Entry</a></li>
                          <li><a href="lostreport.php">Lost Item Report</a></li>
                          <li><a href="foundreport.php">Found Item Report</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- end #sidebar -->



        <div id="content">
            <div class="contentbg">
                
                
                <div class="post">
                    <h2 class="title"><a href="#">Registration Form</a></h2>
                    
    <!-- Default Page Content (login form) -->

                    

    <div class="container">
    <div class="d-flex justify-content-center">
        <div class="card">
            
            <div class="card-body">
    
    <form action="register.php" method="post">
        <label for="first_name">First Name:</label>
        <input type="text" id="firstname" name="firstname" required><br><br>
        
        <label for="last_name">Last Name:</label>
        <input type="text" id="lastname" name="lastname" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="hidden" name="created_at" value="<?php echo date('Y-m-d H:i:s'); ?>">
        
        <button type="submit">Register</button>
    </form>
            </div>
        </div>
    </div>
</div>

    </div>
                
                
            </div>
        </div>
        <!-- end #content -->
    
        
    </div>
    <!-- end #page -->
</div>
<div id="footer">
    <p>2024. Untitled. All rights reserved. Design by <a href="" rel="nofollow">Fahad & Co. </a>.</p>
</div>
<!-- end #footer -->
</body>
</html>

