<?php
include "../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['Email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO contacts (firstname, lastname, email, message, created_at)
    VALUES ('$firstname', '$lastname', '$email', '$message', CURRENT_TIMESTAMP)";

    if ($conn->query($sql) === TRUE) {
        header('location:contactus.php');
        //echo "New record created successfully";
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
<link href="../asset/css/sscontact.css" rel="stylesheet" type="text/css" media="screen" />
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
				<h1><a href="#">Lost And Found Management System</a></h1>
			</div>
		</div>
	</div>
	<!-- end #header -->
	<div id="menu-wrapper">
		<ul id="menu">
			<li><a href="../index.php"><span>Homepage</span></a></li>
			<li><a href="blog.php"><span>Blog</span></a></li>
			<li ><a href="about.php"><span>About</span></a></li>
			<li class="current_page_item"><a href="contactus.php"><span>Contact</span></a></li>
			<li><a href="../logout.php"><span>logout</span></a></li>
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
							<li><a href="register.php">Register</a></li>
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
				<h2 class="title"><a href="#">Contact Us</a></h2>				
	<!-- Default Page Content (contact form) -->
					<div class="container">
						  <form action="contactus.php" method="post" >
					        <label for="fname">Name*:</label><br>
					        <input type="text" id="fname" name="firstname" placeholder="Your name" required><br><br>
					        
					        <label for="lname">Last name:</label><br>
					        <input type="text" id="lname" name="lastname" placeholder="Your last name"><br><br>
					        
					        <label for="Email">Your email*:</label><br>
					        <input type="email" id="Email" name="Email" placeholder="Your email address" required><br><br>
					        
					        <label for="message">Message*:</label><br>
					        <textarea id="message-box" rows="4" cols="50" name="message" placeholder="Enter your message" required> </textarea><br><br>
					        <input type="submit" value="Submit">
					    </form>
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
