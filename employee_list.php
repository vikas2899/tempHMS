<?php
ob_start();
define('myheader',TRUE);
require('header.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script>
       document.getElementById("drop").style.display = "none";
       document.getElementById("logout").style.display = "block";
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
            <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Setting</a>
          </div>
      </div>
      <div id="page-content-wrapper">
          <div class="container-fluid">
              <form action="employee_list.php" method="post">
                <div class="form-row">
                   <div class="form-group col-md-4">
                    <label for="choice">Please select the option : </label>
                    <select  name="choice" id="choice" class="form-control" >
                        <option>All Employees Record</option>
                        <option>View By Employee ID</option>
                    </select>
               </div> 
            </div>
            <input type="submit" id="btn" value="Proceed" name="submit" class="btn btn-primary">
            </form>

<?php
$choice=isset($_POST['choice'])?$_POST['choice']:'';
if(isset($_POST['submit'])){
if($choice=='All Employees Record'){
	$con = mysqli_connect('localhost','root','','building_data');
	$query="SELECT * from employee";
    $run = mysqli_query($con,$query);
    if($run){
       echo"<div class='form-row'>"; 
       while($row=mysqli_fetch_array($run)){
        $ename = $row['name'];
        $empid = $row['empid'];
        $eimage = $row['image'];
        if($eimage)
            $path = 'Employee_image/'.$eimage;
        else
            $path = 'Employee_image/host1.jpg';
        echo"<div class='form-group col-md-4'>";
        echo"<div class='card' style='width: 18rem;'>";
        echo"<img src='$path' class='card-img-top' height=200 alt='Card image cap'>";
            echo"<div class='card-body'>";
                echo"<h5 class='card-title'>Name : $ename</h5>";
                echo"<a href='#' class='card-link'>View</a>";
            echo"</div>";
        echo"</div>";
        echo"</div>";
       } 
       echo"</div>";
  ?>
<?php    
    }          
    else{
	    $con->error;
    }
}else if($choice=='View By Employee ID'){
    ?>
        <script type="text/javascript">
            
            document.getElementById("choice").disabled = true;
            document.getElementById("choice").value = "<?php echo $choice ?>";
            document.getElementById("btn").disabled = true;
        </script>
    <?php
    echo"<form action='employee_list.php' method='post'>";
    echo'<div class="form-row">
        <div class="form-group col-md-4">
            <label for="eid">Enter the Employee ID</label>
            <input type="text" class="form-control" id="eid" name="eid" placeholder="Employee ID" required>
        </div> 
    </div>';
    echo"<input type='submit' value='Proceed' name='submitf' class='btn btn-primary'>";
    echo"</form>";    
   }
}    
if(isset($_POST['submitf'])){
    $eid=$_POST['eid'];
    $con = mysqli_connect('localhost','root','','building_data');
    $query="SELECT * from employee where empid='$eid'";
    $run = mysqli_query($con,$query);
    $row = mysqli_num_rows($run);
    if($row<1){
        ?>
            <script type="text/javascript">
                alert("No Employee Found!");
            </script>
        <?php
        header( "refresh:0.5;url=employee_list.php" );
    }
    else{
            if($run){
                   echo"<div class='form-row'>"; 
                   while($row=mysqli_fetch_array($run)){
                    $ename = $row['name'];
                    $empid = $row['empid'];
                    $eimage = $row['image'];
                    if($eimage)
                    $path = 'Employee_image/'.$eimage;
                    else
                    $path = 'Employee_image/host1.jpg';
                    echo"<div class='form-group col-md-4'>";
                    echo"<div class='card' style='width: 18rem;'>";
                    echo"<img src='$path' class='card-img-top' height=200 alt='Card image cap'>";
                    echo"<div class='card-body'>";
                    echo"<h5 class='card-title'>Name : $ename</h5>";
                    echo"<a href='#' class='card-link'>View</a>";
                    echo"</div>";
                    echo"</div>";
                    echo"</div>";
                    } 
                    echo"</div>";
                    }          
    else{
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