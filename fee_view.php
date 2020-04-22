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
	   $(function () {
	    $('#datepicker').datepicker();
	 }); 
       document.getElementById("logout").style.display = "block";
  document.getElementById("drop").style.display = "none";
  document.getElementById("menu-toggle").style.display = "none";
    </script>
	<title>view fee</title>
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
	         <form action='fee_view.php' method='post'>
            <div class="form-row">
            <div class="form-group col-md-4">
            <label for="choice">Please select from the following option </label>
            <select id="choice" name="choice" class="form-control" required>
              <option>Date Wise</option>
              <option>Student Wise</option>
              <option>Month Wise</option>
              <option>Transaction Wise</option>
              <option>All</option>
            </select>
          </div>
        </div>
<input type='submit' name='submit' value='Next' id='btn' class="btn btn-primary">
</form>

<?php
if(isset($_POST['submit'])){
    $choice=isset($_POST['choice'])?$_POST['choice']:'';
    if($choice=='Date Wise'){
       ?>
        <script type="text/javascript">
          document.getElementById("choice").disabled = true;
          document.getElementById("choice").value = "<?php echo $choice ?>";
          document.getElementById("btn").disabled = true;
        </script>
      <?php
	        echo"<form action='fee_view.php' method='post'>";
          echo"<div class='form-row'>";
          echo'<div class="form-group col-md-4">
                <label for="date">Date of Payment</label>
                <input type="date" class="form-control" id="date" name="date" required>
                </div>';
          echo'</div>';
          echo"<input type='submit' value='Proceed' name='submitd' class='btn btn-primary'>";
    }
    else if($choice=='Student Wise'){
       ?>
        <script type="text/javascript">
          document.getElementById("choice").disabled = true;
          document.getElementById("choice").value = "<?php echo $choice ?>";
          document.getElementById("btn").disabled = true;
        </script>
      <?php
       $con = mysqli_connect('localhost','root','','building_data');
	     echo"<form action='fee_view.php' method='post'>";
       echo"<div class='form-row'>"; 
       echo'<div class="form-group col-md-4">
            <label for="id">Select Student ID</label>
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
        echo"</select>
          </div>";
        echo"</div>";  
        echo"<input type='submit' value='Proceed' class='btn btn-primary' name='submits'>";
        }
    }
    else if($choice=='Month Wise'){
      ?>
        <script type="text/javascript">
          document.getElementById("choice").disabled = true;
          document.getElementById("choice").value = "<?php echo $choice ?>";
          document.getElementById("btn").disabled = true;
        </script>
      <?php
      echo"<form action='fee_view.php' method='post'>";
      echo"<div class='form-row'>";
      echo'<div class="form-group col-md-4">
            <label for="month">Select the payment month</label>
            <select id="month" name="month" class="form-control" required>
                <option>January</option><option>February</option><option>March</option><option>April</option><option>May</option><option>June</option><option>July</option><option>August</option><option>September</option><option>October</option><option>November</option><option>December</option>
            </select>
          </div>';
      echo'</div>';    
      echo"<input type='submit' value='Proceed' name='submitm' class='btn btn-primary'>";
    }
    else if($choice=='All'){
       $con = mysqli_connect('localhost','root','','building_data');
       $query="SELECT * from fee order by 'date1' desc";
       $run = mysqli_query($con,$query);
       $row = mysqli_num_rows($run);
       if($row>=1){
            if($run){
              echo"<br><br>";
              echo"<div style='margin-left:50px;margin-right:50px;'>";
              echo "<table class='table table-striped'>";
              echo "<tr>";
              echo "<th> Student Id </th>";
              echo "<th> Transaction Date </th>";
              echo "<th> Paid </th>";
              echo "<th> Transaction NUmber </th>";
                    echo "<th> Amount </th>";
                    echo "<th> Remark </th>";
                    echo "<th> Transaction Month </th>";
              echo "</tr>";
              while($row = mysqli_fetch_array($run)){   
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['date1']."</td>";
                echo "<td>".$row['paid']."</td>";
                echo "<td>".$row['transaction']."</td>";
                echo "<td>".$row['amount']."</td>";
                echo "<td>".$row['remark']."</td>";
                echo "<td>".$row['month']."</td>";
                echo "</tr>";   
              }
                echo "</table>";
                echo"</div>";
            }
        }  
        else{
          echo'<div class="alert alert-danger" role="alert">
                Opps! No Record Found.
              </div>';
        }    
    }
    else if($choice=='Transaction Wise'){
      ?>
        <script type="text/javascript">
          document.getElementById("choice").disabled = true;
          document.getElementById("choice").value = "<?php echo $choice ?>";
          document.getElementById("btn").disabled = true;
        </script>
      <?php
      echo"<form action='fee_view.php' method='post'>";
      echo"<div class='form-row'>";
      echo'<div class="form-group col-md-4">
            <label for="trans">Transaction Number</label>
            <input type="text" class="form-control" id="trans" name="trans" placeholder="Enter Transaction No." required>
          </div>';
      echo"</div>";      
      echo"<input type='submit' value='Proceed' name='submitt' class='btn btn-primary'>";
  }
}
else if(isset($_POST['submitd'])){
  $date=$_POST['date'];
  $con = mysqli_connect('localhost','root','','building_data');
  $query="SELECT * from fee where date1='$date'";
  $run = mysqli_query($con,$query);
  $row = mysqli_num_rows($run);
  if($row>=1){
      if($run){
          echo"<br><br>";
          echo"<div style='margin-left:50px;margin-right:50px;'>";
          echo "<table class='table table-striped'>";
          echo "<tr>";
          echo "<th> Student Id </th>";
          echo "<th> Transaction Date </th>";
          echo "<th> Paid </th>";
          echo "<th> Transaction NUmber </th>";
                    echo "<th> Amount </th>";
                    echo "<th> Remark </th>";
                    echo "<th> Transaction Month </th>";
          echo "</tr>";
            while($row = mysqli_fetch_array($run)){   
            echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['date1']."</td>";
                echo "<td>".$row['paid']."</td>";
                echo "<td>".$row['transaction']."</td>";
                echo "<td>".$row['amount']."</td>";
                echo "<td>".$row['remark']."</td>";
                echo "<td>".$row['month']."</td>";
            echo "</tr>";   
            }
        echo "</table>";
        echo'</div>';
      }
   }
   else{
    echo'<div class="alert alert-danger" role="alert">
        Opps! No Record Found.
        </div>';
   }   
}
else if(isset($_POST['submits'])){
    $id=$_POST['id'];
    $con = mysqli_connect('localhost','root','','building_data');
    $query="SELECT * from fee where id='$id'";
    $run = mysqli_query($con,$query);
    $row = mysqli_num_rows($run);
    if($row>=1){
        if($run){
          echo"<br><br>";
          echo"<div style='margin-left:50px;margin-right:50px;'>";
          echo "<table class='table table-striped'>";
          echo "<tr>";
          echo "<th> Student Id </th>";
          echo "<th> Transaction Date </th>";
          echo "<th> Paid </th>";
          echo "<th> Transaction NUmber </th>";
                    echo "<th> Amount </th>";
                    echo "<th> Remark </th>";
                    echo "<th> Transaction Month </th>";
          echo "</tr>";
          while($row = mysqli_fetch_array($run)){   
          echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['date1']."</td>";
                echo "<td>".$row['paid']."</td>";
                echo "<td>".$row['transaction']."</td>";
                echo "<td>".$row['amount']."</td>";
                echo "<td>".$row['remark']."</td>";
                echo "<td>".$row['month']."</td>";
            echo "</tr>";   
          }
          echo "</table>";
          echo"</div>";
        }
    }
    else{
      echo'<div class="alert alert-danger" role="alert">
           Opps! No Record Found.
          </div>';
    }    
}  
else if(isset($_POST['submitm'])){
  $month=$_POST['month'];
  $con = mysqli_connect('localhost','root','','building_data');
  $query="SELECT * from fee where month='$month'";
  $run = mysqli_query($con,$query);
  $row = mysqli_num_rows($run);
  if($row>=1){
      if($run){
          echo"<br><br>";
          echo"<div style='margin-left:50px;margin-right:50px;'>"; 
          echo "<table class='table table-striped'>";
          echo "<tr>";
          echo "<th> Student Id </th>";
          echo "<th> Transaction Date </th>";
          echo "<th> Paid </th>";
          echo "<th> Transaction NUmber </th>";
                    echo "<th> Amount </th>";
                    echo "<th> Remark </th>";
                    echo "<th> Transaction Month </th>";
          echo "</tr>";
          while($row = mysqli_fetch_array($run)){   
          echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['date1']."</td>";
                echo "<td>".$row['paid']."</td>";
                echo "<td>".$row['transaction']."</td>";
                echo "<td>".$row['amount']."</td>";
                echo "<td>".$row['remark']."</td>";
                echo "<td>".$row['month']."</td>";
            echo "</tr>";   
            }
        echo "</table>";
        echo"</div>";
      }
  }    
  else{
      echo'<div class="alert alert-danger" role="alert">
           Opps! No Record Found.
          </div>';
  }   
}
else if(isset($_POST['submitt'])){
    $trans=$_POST['trans'];
    $con = mysqli_connect('localhost','root','','building_data');
    $query="SELECT * from fee where transaction='$trans'";
    $run = mysqli_query($con,$query);
    $row = mysqli_num_rows($run);
    if($row>=1){
        if($run){
          echo"<br><br>";
          echo"<div style='margin-left:50px;margin-right:50px;'>";
          echo "<table class='table table-striped'>";
          echo "<tr>";
          echo "<th> Student Id </th>";
          echo "<th> Transaction Date </th>";
          echo "<th> Paid </th>";
          echo "<th> Transaction NUmber </th>";
                    echo "<th> Amount </th>";
                    echo "<th> Remark </th>";
                    echo "<th> Transaction Month </th>";
          echo "</tr>";
          while($row = mysqli_fetch_array($run)){   
          echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['date1']."</td>";
                echo "<td>".$row['paid']."</td>";
                echo "<td>".$row['transaction']."</td>";
                echo "<td>".$row['amount']."</td>";
                echo "<td>".$row['remark']."</td>";
                echo "<td>".$row['month']."</td>";
            echo "</tr>";   
          }
          echo "</table>";
          echo"</div>";
        }
    }
    else{
       echo'<div class="alert alert-danger" role="alert">
           Opps! No Record Found.
          </div>';
  }
}
?>
 </div>
      </div>
    </div>
</body>
</html>    