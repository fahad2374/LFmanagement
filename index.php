<?php
    
    include "connection.php";

$sql = "SELECT * FROM product";
$result = $conn -> query ($sql);



if(isset($_POST['update_btn'])){
  $update_id = $_POST['update_id'];
  $name = $_POST['update_name'];
  $des = $_POST['update_des'];
  $image = $_POST['update_imgurl'];
  $status = $_POST['update_status'];
   

  $update_query = mysqli_query($conn, "UPDATE `product` SET name='$name' , des='$des' , status = '$status'  WHERE id = '$update_id'");
  if($update_query){
   header('location:index.php');
  };
};

if(isset($_GET['remove'])){
  $remove_id = $_GET['remove'];
  mysqli_query($conn, "DELETE FROM `product` WHERE id = '$remove_id'");
  header('location:index.php');
};


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
<link href="asset/css/ssindex.css" rel="stylesheet" type="text/css" media="screen" />
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
			<li class="current_page_item"><a href="index.php"><span>Homepage</span></a></li>
			<li><a href="inc/blog.php"><span>Blog</span></a></li>
			<li><a href="inc/about.php"><span>About</span></a></li>
			<li><a href="inc/contactus.php"><span>Contact</span></a></li>
			<li><a href="logout.php"><span>logout</span></a></li>
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
					<h2 class="title"><a href="#">Item Details</a></h2>
	<!-- Default Page Content (login form) -->

	  <div class="container">
    <table class="table table-striped">
  <thead>
    <tr>
      <!--<th scope="col">#</th>-->
      <th scope="col">Item Name</th>
      <th scope="col">Description</th>
      <th scope="col">Image URL</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   
      <?php
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              ?>
             <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
               <tr>
                <input type="hidden" name="update_id"  value="<?php echo $row['id'];?>">
                <td><input type="text" name="update_name"  value="<?php echo $row['name'];?>"></td>
                <td><textarea name="update_des" rows="4" cols="50"><?php echo $row['des']; ?></textarea></td>
                <td>
                	<img name="update_imgurl" src="res/images/<?php echo $row['image_URL']; ?>" alt="No image Found" style="width:200px;height:200px;">
								</td>
                <td>
                	<input type="text" name="update_status"  value="<?php echo $row['status'];?>">
								</td>
                <td><button type="submit" class="btn btn-primary" name="update_btn">update</button></td>
                <td><a  class="btn btn-primary" href="index.php?remove=<?php echo $row['id']; ?>">delete</a></td>
                </tr>
                </form>
                <?php }
        } else {
            echo "0 results";
        }
        ?>
     
      
  </tbody>
</table>
</div>
				
				<div style="clear: both;">&nbsp;</div>
			</div>
		</div>
		<!-- end #content -->

		
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
