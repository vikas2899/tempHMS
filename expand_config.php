<?php
ob_start();
define('myheader',TRUE);
require('header.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		document.getElementById("logout").style.display = "block";
  	 	document.getElementById("drop").style.display = "none";
  	 	document.getElementById("menu-toggle").style.display = "none";
	</script>
</head>
<body>
<div class="d-flex" id="wrapper">
      <div class="bg-light border-right" id="sidebar-wrapper" style="margin-top:-7px;">
          <div class="sidebar-heading"><?php echo "Welcome Admin"?></div>
          <div class="list-group list-group-flush">
            <a href="login_configure.php" class="list-group-item list-group-item-action bg-light" id="dash" href="student_form.php">Dashboard</a>
            <a href="manage_student.php" class="list-group-item list-group-item-action bg-light" id="alloc">Manage Student</a>
            <a href="manage_building.php" class="list-group-item list-group-item-action bg-light">Manage Building</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Manage Employee</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Setting</a>
          </div>
      </div>
      <div id="page-content-wrapper">
          <div class="container-fluid">
<?php
	session_start();
	// echo $_SESSION['fromExpand'];
	// if($_SESSION['fromExpand'] == '1'){
	// 	$_SESSION['fromExpand'] = '0';
		$hostel=$_POST['hostel'];
		$building=$_POST['build1'];
		$floor=$_POST['floor'];
		$room=$_POST['room'];
		$capacity=2;
		$availability=2;
		if($hostel=='Boys'){
			$con = mysqli_connect('localhost','root','','building_data');
			$query = "insert into boys_hostel values('$building','$capacity','$floor','$room','$availability')";
			$run = mysqli_query($con,$query);
			echo"<div class='alert alert-success' role='alert'>
  				<h4 class='alert-heading'>Successfully Added New Building Data</h4>
  				<p>Details of Newly Added Building : </p>
  				<hr>";
  			echo"<p class='mb-0'>Hostel Type : ".$hostel."</p>";
  			echo"<br>";	
  			echo"<p class='mb-0'>Building Name : ".$building."</p>";
  			echo"<br>";	
  			echo"<p class='mb-0'>Floor Name : ".$floor."</p>";
  			echo"<br>";	
  			echo"<p class='mb-0'>Room No. : ".$room."</p>";
  			echo"<br>";	

			echo"</div>";
		}else{
			$con = mysqli_connect('localhost','root','','building_data');
			$query = "insert into girls_hostel values('$building','$capacity','$floor','$room','$availability')";
			$run = mysqli_query($con,$query);
			echo"<h5> Girls Hostel is successfully expanded!!</h5>";
		}
}
else{
}
?>
 		</div>
      </div>
</div>
</body>
</html>