<?php
ob_start();
define('myheader',TRUE);
require('header.php');
?>
<html>
<head>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  document.getElementById("logout").style.display = "block";
  document.getElementById("drop").style.display = "none";
  document.getElementById("menu-toggle").style.display = "none";
</script>
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
            <a href="manage_fee.php" class="list-group-item list-group-item-action bg-light">Manage Fees</a>
            <a href="manage_notice.php" class="list-group-item list-group-item-action bg-light">Notice/Events</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Setting</a>
          </div>
      </div>
      <div id="page-content-wrapper">
          <div class="container-fluid">
<?php
$con = mysqli_connect('localhost','root','','building_data');
echo"<br><br><br>";
echo"<div style='margin-left:50px;margin-right:50px;'>";
echo"<form action='fee_add.php' method='post'>";
echo"<div class='form-row'>";
echo'<div class="form-group col-md-4">
    <label for="id">Select Student ID </label>
      <select id="id" name="id" class="form-control" required>';
      $query="SELECT ID from student_table";
      $run = mysqli_query($con,$query);
      if($run){
	       while($row=mysqli_fetch_array($run)){
        ?>
          <option>
          <?php echo $row['ID'] ?>
          </option>
        <?php
        }
   echo"</select></div>";
   echo'<div class="form-group col-md-4">
          <label for="date">Payment Date</label>
          <input type="date" class="form-control" id="date" name="date" required>
        </div>';     
   echo'<div class="form-group col-md-4">
            <label for="month">Month of Payment</label>
            <select id="month" name="month" class="form-control" required>
              <option>January</option><option>February</option><option>March</option><option>April</option><option>May</option><option>June</option><option>July</option><option>August</option><option>September</option><option>October</option><option>November</option><option>December</option>
            </select>
          </div>'; 
    echo"</div>";
    echo"<div class='form-row'>";      
    echo'<div class="form-group col-md-4">
            <label for="paid">Mode of Payment</label>
            <select id="paid" name="paid" class="form-control" required>
              <option>Cash</option><option>NEFT</option><option>UPI</option><option>DD</option>
            </select>
          </div>';      
    echo'<div class="form-group col-md-4">
            <label for="trans">Transaction Number</label>
            <input type="text" class="form-control" id="trans" name="trans" placeholder="Transaction/Cheque No." required>
          </div>';
    echo'<div class="form-group col-md-4">
            <label for="amount">Amount Paid</label>
            <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount Paid " required>
          </div>';
    echo'</div>';   
    echo "<div class='form-row'>";   
    echo'<div class="form-group col-md-4">
            <label for="remark">Remark</label>
            <input type="text" class="form-control" id="remark" name="remark" placeholder="Remarks" required>
          </div>';
    echo'</div>'; 
    echo"<center>";     
   echo"<input type='submit' value='Proceed' name='submit' class='btn btn-primary'>";
   echo"</center>";
   echo"</form>";
   echo"</div>";
  if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $date=$_POST['date']; 
    $paid=$_POST['paid'];
    $transaction=$_POST['trans'];
    $amount=$_POST['amount'];
    $remark=$_POST['remark'];
    $month=$_POST['month'];
    $con = mysqli_connect('localhost','root','','building_data');
    $query="INSERT into fee values('$id','$date','$paid','$transaction','$amount','$remark','$month')";
    $run = mysqli_query($con,$query);
    if($run){
      echo'<br>';
      echo'<div class="alert alert-success" role="alert">
          Success! Data Recorded SuccesFully.
          </div>';
    }else{
      $con->error;
    }
}   
}
?>
 </div>
      </div>
    </div>
</body>
</html>