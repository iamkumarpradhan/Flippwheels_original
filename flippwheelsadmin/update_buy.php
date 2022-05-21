<?php
    include "dbconn.php";
    // If save button is clicked ...
    if (isset($_POST['update'])) {
        $pid = $_GET['pr_id'];
    // image file directory
    // $target = "C:/xampp/htdocs/flippwheels/buyer/buyer.php/".basename($_FILES['Image']['name']);

    //connect to the database
    // $con = mysqli_connect("localhost","root","","flippwheels");
  	// $image = $_FILES['Image']['name'];
    // $id = $_POST['pr_id'];
    $fnam = $_POST['fname'];
    $uname = $_POST['uname'];
    $emailid = $_POST['emails'];
    $phn = $_POST['phones'];
    $addresses = $_POST['addres'];
    // $b_id = $_POST['bid'];
    
    // move_uploaded_file($_FILES['Image']['tmp_name'], $target);

    $sql = "UPDATE `users` SET `fullname`='$fnam',`username`='$uname',`email`='$emailid',`phone`='$phn',`address`='$addresses', WHERE id='$pid'";
    // echo $sql;
    $query_run = mysqli_query($con, $sql);

    if ($query_run){
      echo '<script type="text/javascript">alert("data are edited successfully...");window.location.href="http://localhost/flippwheels/flippwheelsadmin/manage_buyer.php"</script>';
      }
    else{
      die("failed to insert ".mysqli_error($con));
      echo "<script>window.location.href='http://localhost/flippwheels/flippwheelsadmin/update_buyer.php'</script>";
      }
    }
?>