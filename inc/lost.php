<?php
    include "../connection.php";

    if (isset($_POST['submit'])) 
    {
        if (isset($_FILES["choosefile"]) && isset($_POST['name']) && isset($_POST['des']) && isset($_POST['status'])) 
        {
            $filename = $_FILES["choosefile"]["name"];    
            $tempname = $_FILES["choosefile"]["tmp_name"]; 
            $folder = "../res/images/".$filename;      
            $name = $_POST['name'];
            $des = $_POST['des']; // Corrected to match form field name
            $status = $_POST['status'];

            // SQL query to insert values in db
            $insertsql = "INSERT INTO product(name, des, image_URL, status) VALUES ('$name', '$des', '$filename', '$status')";
            
            if (mysqli_query($conn, $insertsql)) 
            {
                // Add the image to the "image" folder
                if (move_uploaded_file($tempname, $folder)) 
                {            
                  header('location:lost.php');
                  //  echo "New record created successfully";
                } 
                else 
                {
                   // echo "Error moving the uploaded file.";
                }
            } 
            else 
            {
               // echo "Error: " . mysqli_error($conn);
            }
        } 
        else 
        {
          //  echo "Please fill in all required fields and choose a file to upload.";
        }
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
<link href="../asset/css/sslost.css" rel="stylesheet" type="text/css" media="screen" />
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
            <li><a href="about.php"><span>About</span></a></li>
            <li><a href="contactus.php"><span>Contact</span></a></li>
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
              <li><b><a href="lost.php">Lost & Found Item Entry</a></b></li>
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
          <h2 class="title"><a href="#">Item Entry</a></h2>
  <!-- Lost item entry form start-->

    <div class="container">
       
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="exampleInputName" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputName">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputDes" class="form-label">Description</label>
    <textarea name="des" class="form-control" id="exampleInputDes"  style="width:610px;" rows="4" cols="50"></textarea>
    <!--input type="text" name="des" class="form-control" id="exampleInputDes"-->
  </div>
  <div class="mb-3">
    <label for="exampleInputUnit" class="form-label">Status</label>
    <select name="status" id="status">
    <option value="Lost"> Lost </option>
    <option value="Found"> Found </option>
    </select>

  </div>
  <div class="mb-3">
    <label for="exampleInputUnitprice" class="form-label">Image</label>
    <input type="file" name="choosefile" value="" />           
         
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
    </div>

   <!-- Lost item entry form end-->

    
    <div style="clear: both;">&nbsp;</div>
  </div>
  <!-- end #page -->
</div>
<div id="footer">
   <p>2024. Untitled. All rights reserved. Design by <a href="" rel="nofollow">Fahad & Co. </a>.</p>
</div>
<!-- end #footer -->
</body>
</html>












