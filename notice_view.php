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
            <a href="manage_employee.php" class="list-group-item list-group-item-action bg-light">Manage Employee</a>
            <a href="manage_attendance.php" class="list-group-item list-group-item-action bg-light">Manage Attendance</a>
            <a href="manage_vendor.php" class="list-group-item list-group-item-action bg-light">Vendor Payments</a>
            <a href="manage_expense.php" class="list-group-item list-group-item-action bg-light">Manage Expense</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Manage Fees</a>
            <a href="manage_notice.php" class="list-group-item list-group-item-action bg-light">Notice/Events</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Setting</a>
          </div>
      </div>
      <div id="page-content-wrapper">
          <div class="container-fluid">

<?php
// while($row = mysqli_fetch_array($run)){ 
$con = mysqli_connect('localhost','root','','building_data');
$query="SELECT * from notice_board order by 'date1' desc";
$run = mysqli_query($con,$query);
// echo "<form action='notice_view.php' method='post'>";
      echo"<table>";
        echo"<tr>";
            echo"<th>Sno</th>";
            echo"<th>Subject</th>";
            echo"<th>Action</th>";
            echo"<th>Created on</th>";
        echo"</tr>";  
        while($row = mysqli_fetch_array($run)){
            echo"<tr>";
                $serial = $row['serial'];
                echo"<td name='serial1' value='$serial'>".$row['serial']."</td>";
                echo"<td>".$row['notice']."</td>";
                 echo"<td><button><a href='notice_view.php?serial=".$serial."'>Submit</a></button>";
               echo"<td>".$row['createdDate']."</td>";
            echo"</tr>";
        }    
      echo"</table>";
// echo"</form>";
// if(isset($_GET['submit'])){
        $t=isset($_GET['serial'])?$_GET['serial']:'';
        echo $t;
     // }
?>
 </div>
      </div>
    </div>
</body>
</html>