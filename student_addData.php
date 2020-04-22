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
   </script>
</head>
<body>
<div class="d-flex" id="wrapper">
      <div class="bg-light border-right" id="sidebar-wrapper" style="margin-top:-7px;">
          <div class="sidebar-heading"><?php echo "Welcome Admin"?></div>
          <div class="list-group list-group-flush">
            <a href="login_configure.php" class="list-group-item list-group-item-action bg-light" id="dash" href="student_form.php">Dashboard</a>
            <a href="manage_student.php" class="list-group-item list-group-item-action bg-light" id="alloc">Manage Student</a>
            <a href="expand.php" class="list-group-item list-group-item-action bg-light">Manage Building</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Manage Employee</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Setting</a>
          </div>
      </div>
         <div id="page-content-wrapper">
            <div class="container-fluid">

            

<?php
session_start();
$_SESSION["fromData"] = '1';
if($_SESSION['fromMain']==true && isset($_POST['submit'])){
            $_SESSION['fromMain'] = false;  
            $_SESSION['fromData'] = '1';
            $file = $_FILES['userimage'];
            $filename = $file['name'];
            $fileTempName = $file['tmp_name'];
            $fileSize = $file['size'];
            $fileError = $file['error'];
            $fileExt = explode('.',$filename);
            $fileActualExt = strtolower(end($fileExt));
            $allowed = array('jpg','jpeg','png','pdf');
            if(in_array($fileActualExt,$allowed)){
                  if($fileError===0){
                        if($fileSize<1000000){
                           $fileNameNew = uniqid('',true).".".$fileActualExt;
                           $fileDestination = 'uploads/'.$fileNameNew;
                           move_uploaded_file($fileTempName,$fileDestination);
                        }else{
                        echo "File too big";
                        }
            }
    
            }else{
               echo "File is not allowed";
            }   


            $_SESSION['fname'] = $_POST['firstname'];
            $_SESSION['gname'] = $_POST['gname'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['addrs'] = $_POST['raddress'];   
            $_SESSION['phone'] = $_POST['phone'];
            $_SESSION['inst'] = $_POST['institute'];
            $_SESSION['gender'] = $_POST['gender'];
            $_SESSION['pass'] = $_SESSION['phone'];
            $_SESSION['dob'] = $_POST['dob'];
            $_SESSION['doa'] = $_POST['doa'];
            $_SESSION['nationality'] = $_POST['nationality'];
            $_SESSION['nationalID'] = $_POST['nationalID'];
            $_SESSION['city'] = $_POST['city'];
            $_SESSION['state'] = $_POST['state'];
            $_SESSION['zip'] = $_POST['zip'];   
            $_SESSION['file'] = $fileNameNew;
            $con = mysqli_connect('localhost','root','','building_data');
// $query = "INSERT INTO student_table(NAME, G_NAME, EMAIL, ADDRESS, PHONE, INSTITUTE, GENDER) VALUES ('$fname','$gname','$email','$addrs','$phone','$inst','$gender')";
// $query2 = "INSERT INTO student_login(ID,NAME,PASSWORD) VALUES ('$email','$fname','$phone')";
// if(isset($_POST['submit'])){
// $run = mysqli_query($con,$query);
// $run2 = mysqli_query($con,$query2);
// }
            $pp = $_SESSION['phone'];
            $query = "SELECT `ID` FROM `student_table` WHERE PHONE = '$pp'";
            $run = mysqli_query($con,$query);
            $row = mysqli_num_rows($run);
            if($row>=1){
      ?>
                     <script type="text/javascript">
                     document.getElementById("pmessage").style.display = "block";    
                     </script>
      <?php 
                     header( "refresh:1.5;url=login.php" );
            }
            else{
                     if(true){
                                 if ($_SESSION['gender']=='male') {
                        ?>
                                       <form method ="post" action="room.php" enctype="multipart/form-data">
                                          <br>
                                          <center>
                                             <p>Please Select the Building No. and Floor No. to Allocate room to Student.</p>
                                          </center>
                                          <br><br><br><br>
                              
                                          <div class="form-row">
                                             <div class="form-group col-md-1">
                                                
                                             </div>
                                             <div class="form-group col-md-3">
                                                <div class="card" style="width: 18rem;">
                                                   <div class="card-body">
                                             <p align="center">Building Number</p><hr>
                                             <label for="building">Select Building No. : </label>
                                                <select id="building" name="building" class="form-control" required>
                                             
                        <?php
                                       $res = mysqli_query($con,"select distinct(building_no) from boys_hostel");
                                       while($row=mysqli_fetch_array($res)){
                        ?>
                                             <option>
                                             <?php echo $row['building_no'] ?>
                                             </option>
                        <?php
                                       }
                        ?>
                                       </select>
                                       </div>
                                       <br><br><br>
                                       </div>

                                       </div>
                                       <div class="form-group col-md-3">
                                                
                                             </div>
                                       
                                       <div class="form-group col-md-3">
                                          <div class="card" style="width: 18rem;">
                                                <div class="card-body">  
                                                   <p align="center">Floor Number</p><hr>
                                             <label for="floor">Select Floor No. : </label>
                                                <select id="floor" name="floor" class="form-control" required>
            
                        <?php
                                       $res = mysqli_query($con,"select distinct(floor_no) from boys_hostel");
                                       while($row=mysqli_fetch_array($res)){
                        ?>
                                       <option>
                                       <?php echo $row['floor_no'] ?>
                                       </option>
                        <?php
                                       }
                        ?>
                                       </select>
                                    </div>
                                    <br><br><br>   
                                    </div>
                                    </div>
                                    <div class="form-group col-md-1">
                                                
                                             </div>
                                    </div> 
                                       <br>
                                       <center>
                                       <input type="submit" class="btn btn-primary" name="submitb" value="Proceed"/>
                                       </center> 
                                       </form>   
<?php
                                 }  
                                 else{
?>                                      <form method ="post" action="room.php" enctype="multipart/form-data">                             
                                       <br>
                                          <center>
                                             <p>Please Select the Building No. and Floor No. to Allocate room to Student.</p>
                                          </center>
                                          <br><br><br><br>   
                                       <div class="form-row">
                                          <div class="form-group col-md-1">
                                                
                                             </div>
                                             <div class="form-group col-md-3">
                                                <div class="card" style="width: 18rem;">
                                                   <div class="card-body">
                                             <p align="center">Building Number</p><hr>
                                             <label for="building">Select Building No. : </label>
                                                <select id="building" name="building" class="form-control" required>
            
                                 <?php
                                          $_SESSION['fromData'] = '1'; 
                                          $res = mysqli_query($con,"select distinct(building_no) from girls_hostel");
                                       while($row=mysqli_fetch_array($res)){
                  ?>
                                       <option>
                                       <?php echo $row['building_no'] ?>
                                        </option>
                  <?php
                                       }
                  ?>
                                       </select>
                                       </div>
                                        <br><br><br>
                                    </div>
                                 </div>
                                 <div class="form-group col-md-3">
                                                
                                             </div>
                                       <div class="form-group col-md-3">
                                          <div class="card" style="width: 18rem;">
                                                   <div class="card-body">
                                             <p align="center">Floor Number</p><hr>
                                             <label for="floor">Select Floor No. : </label>
                                                <select id="floor" name="floor" class="form-control" required>
            
            <?php
                                        $res = mysqli_query($con,"select distinct(floor_no) from girls_hostel");
                                          while($row=mysqli_fetch_array($res)){
                  ?>
                                          <option>
                                          <?php echo $row['floor_no'] ?>
                                          </option>
                  <?php
                                          }
            ?>
                                       </select>
                                       </div>
                                        <br><br><br>
                                    </div>
                                     </div>
                                     <div class="form-group col-md-1">
                                                
                                             </div>  
                                    </div>
                                    <center>
                                    <input type="submit" class="btn btn-primary" name="submitb" value="Proceed"/></center>
                                       </form>
           <?php
                                 }
                     }
// $id = "SELECT ID from student_table where PHONE='$phone'";
// $run1 = mysqli_query($con,$id);
// if($run1){
//    while($row = mysqli_fetch_array($run1)){
//       $id_send = $row['ID'];
//    }
//    $_SESSION['uid'] = $id_send;
//    $_SESSION['fromData'] = '1';
// }
         $_SESSION['fromData'] = '1';   
         }      
}

else{
  header('location:login.php');
}
?>
<style>
   #navbarDropdownMenuLink{
      display: none;
   }
</style>
            </div>
         </div>
    </div>
</body>
</html>
