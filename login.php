<?php
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $user, $pass);

    // Execute the statement
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User found
        //echo "Login successful!";
         header('location:index.php');
    } else {
        // User not found
       // echo "Invalid username or password.";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Lost and Found</title>
<link href="http://fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<link href="asset/css/sslogin.css" rel="stylesheet" type="text/css" media="screen" />
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
				<h1><a href="index.php">Lost And Found Management System</a> </h1>
				
			</div>
		</div>
	</div>
	<!-- end #header -->
	<div id="menu-wrapper">
		<ul id="menu">
			<li ><a href="index.php"><span>Homepage</span></a></li>
			<li><a href="inc/blog.php"><span>Blog</span></a></li>
			<li><a href="inc/about.php"><span>About</span></a></li>
			<li><a href="inc/contactus.php"><span>Contact</span></a></li>
			<li class="current_page_item"><a href="login.php"><span>login</span></a></li>
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
							<li><a href="inc/register.php">Register</a></li>
							<li><a href="inc/lost.php">Lost & Found Item Entry</a></li>
							<li><a href="inc/lostreport.php">Lost Item Report</a></li>
							<li><a href="inc/foundreport.php">Found Item Report</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		<!-- end #sidebar -->



		<div id="content">
			<div class="contentbg">
				
				
				<div class="post">
					<h2 class="title"><a href="#">Login</a></h2>
					
	<!-- Default Page Content (login form) -->

					

	<div class="container">
    <div class="d-flex justify-content-center">
        <div class="card">
            
            <div class="card-body"><br>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <label for="user_name">User Name:</label>
                     <input type="text" class="form-control" placeholder="username" name="username">     
                     <br>
                    <label for="pwd">Password:</label>
                        <input type="password" class="form-control" placeholder="password" name="password">
                     <br>
                    
                    <input type="submit" value="Login" class="btn btn-primary" name="submit">
                    <input type="reset" value="Clear">
                    <a href="inc/register.php">Register</a>
                    
                   
                    </form> <br>
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
</div> <br>
<div id="footer">
	<p>2024. Untitled. All rights reserved. Design by <a href="" rel="nofollow">Fahad & Co. </a>.</p>
</div>
<!-- end #footer -->
</body>
</html>
