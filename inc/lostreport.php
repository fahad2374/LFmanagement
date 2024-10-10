<?php
   
    include "../connection.php";
    $t=0;
if (isset($_POST['submit'])) 
{
    $name=$_POST['search_name'];
    $des=$_POST['des'];

$sql = "SELECT * FROM product WHERE (name='$name' OR des = '$des') AND (status='Lost' OR status='lost')";
$res = $conn -> query ($sql);
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
<link href="../asset/css/sslostitemreport.css" rel="stylesheet" type="text/css" media="screen" />
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
                            <li><a href="lost.php">Lost & Found Item Entry</a></li>
                            <li><b><a href="lostreport.php">Lost Item Report</a></b></li>
                            <li><a href="foundreport.php">Found Item Report</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- end #sidebar -->
        <div id="content">
            <div class="contentbg">
                <h2 class="title"><a href="#">Lost Item Report</a></h2>               
    <!-- Default Page Content (contact form) -->
                    <div class="container">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
   <label for="search_name">Search By Item Name:</label>
  <input type="text" id="search_name" name="search_name">
  <label for="des">Description:</label>
  <input type="text" id="des" name="des">
  <input type="submit" name="submit" value="Search">
  <button type="submit" name="lostItemsButton">All Lost Items</button>
  <input type="submit" name="clear" value="Clear">
  <button type="button" onclick="window.print();return false;">Pdf Report</button>
</form>

<h3><b>Lost Item Report</b></h3>
<table class="table table-striped">
  <thead>
    <tr>
      <!--<th scope="col">#</th>-->
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
 <?php
 if(isset($_POST['submit']))
 {
          if (mysqli_num_rows($res) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($res)) {
                //$t=$t+($row['des']*$row['status']);
              ?>
               <tr>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['des'];?></td>
                <td><?php echo $row['status'];?></td>
                </tr>
                </form>
                <?php
                 }
        } 
        else 
        {
            echo "0 results";
        }
}
        if (isset($_POST['clear'])) {
    // Clear the entries
    $res = []; // Assuming $res is the result set, reset it to an empty array
}

        if(isset($_POST['lostItemsButton']))
        {
            $sql_all = "SELECT * FROM product WHERE status='Lost'";

            $res_all = $conn->query($sql_all);

            if ($res_all->num_rows > 0) {
            while($row = $res_all->fetch_assoc()) {
                ?>
               <tr>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['des'];?></td>
                        <td><?php echo $row['status'];?></td>
                        </tr>
                        </form>
               <?php

            }
                } 
                else 
                {
                    echo "0 results";
                }
        }
                $conn->close();

        ?>
    </tbody>
</table><br><br>

</div>
            </div>
        </div><br><br>
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
