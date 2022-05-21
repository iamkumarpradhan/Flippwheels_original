    <?php
    include "dbconn.php";
    // If save button is clicked ...
    if (isset($_POST['update'])) {
        $pid = $_POST['id'];
        $fnam = $_POST['fname'];
        $uname = $_POST['uname'];
        $emailid = $_POST['emails'];
        $phn = $_POST['phones'];
        $addresses = $_POST['addres'];

    $sql = "UPDATE `users` SET `fullname`='$fnam',`username`='$uname',`email`='$emailid',`phone`='$phn',`address`='$addresses' WHERE `id`='$pid'";
    $query_run = mysqli_query($con, $sql);

    if ($query_run){
    
      echo '<script type="text/javascript">alert("data are edited successfully...");window.location.href="http://localhost/flippwheels/flippwheelsadmin/manage_seller.php"</script>';
      }
    else{
      die("failed to insert ".mysqli_error($con));
     echo "<script>window.location.href='http://localhost/flippwheels/flippwheelsadmin/update_seller.php?sr_id=<?php echo $pid;?>'</script>";
      }
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="device-width, initial-scale=1.0">

    <!--Fontawesome for icon-->
    <script src="https://kit.fontawesome.com/8ae2387575.js" crossorigin="anonymous"></script>

    <!--Google Font links-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora&display=swap" rel="stylesheet">

    <!--CSS styling-->
    <link rel="stylesheet" href="adminstyle/Admin_panel_css.css">
    <title>Admin- edit product</title>
</head>

<body>
    <header>
        <div class="logo">
            <div class="logo1"><a href="http://localhost/flippwheels/flippwheelsadmin/products/Admin_panel.html">
            <img src="http://localhost/flippwheels/uploads/logo.jpg" style="width: 70px; height: 70px;"></a>
            </div>
            <h1 class="logo-text"><span>FLIPP</span>WHEELS</h1>
        </div>
        <i class="fas fa-bars menu-toggle"></i>
        <ul class="nav">
            <li>
                <a href="#">
                    <i class="fas fa-user"></i> Admin
                    <i class="fas fa-chevron-down"></i>
                </a>
                <ul>
                    <li><a href="#" class="logout">Logout</a></li>
                </ul>
            </li>
        </ul>
    </header>

    <!--Admin Page wrapper-->
   <!--  <div class="admin-wrapper"> -->

        <!--Left side bar--><!-- 
        <div class="left-sidebar">
            <ul>
                <li><a href="index.php">Manage Products</a></li>
                <li><a href="manage_buyer.php">Manage Buyers</a></li>
                <li><a href="manage_seller.php">Manage Sellers</a></li>
            </ul>
        </div> -->

        <!--Admin Content-->
        <div class="admin-content">
            <div class="content">
                <div class="customer-list">
            <div class="placee">
                <form name="form" method="post" action="http://localhost/flippwheels/flippwheelsadmin/update_seller.php" enctype="multipart/form-data" id="uploadForm">
                <?php
                    include "dbconn.php";
                    if(isset($_GET['sr_id'])){
                        $pid = $_GET['sr_id'];
                        $sql = "SELECT * FROM `users` WHERE id = '$pid'";
                        $result = mysqli_query($con,$sql);
                        while($data = mysqli_fetch_array($result)){?>
                    <
                    <div class="editseller">
                        <div class="pheader">
                          <!--   <h3>Place details</h3> -->
                        </div>
                <center><h2 class="page-title">Manage Seller</h2></center>
                        <div class="input">
                          <label for="">Full Name</label><br>
                            <input type="hidden" name="id" value="<?php echo $data['id']?>">
                            <input type="text" name="fname" id="" required class="form-control" value="<?php echo $data['fullname']?>"><br>
                            <label for="">Username</label><br>
                            <input type="text" name="uname" id="" required class="form-control" value="<?php echo $data['username']?>"><br>   
                            <label for="">Email ID</label><br>
                            <input type="text" name="emails" id="" required class="form-control" value="<?php echo $data['email']?>"><br>
                            <label for="">Phone Number</label><br>
                            <input type="number" name="phones" id="" required class="form-control" value="<?php echo $data['phone']?>"><br>   
                            <label for="">Address</label><br>

                            <input type="text" name="addres" id="" required class="form-control" value="<?php echo $data['address']?>"><br> <!-- <a href="http://localhost/flippwheels/flippwheelsadmin/update_buyer.php?pid=<?php echo $pid;?>">Update Buyer</a> -->  
                            <input type="submit" name="update" value="Update Seller">

                        </div>
                    </div>
                    <?php } } ?>
                </form>
            </div>
        </div>
        </div>
         <div class="getbacktohome">


 <br><br>
        <center> <a href="http://localhost/flippwheels/flippwheelsadmin/products/Admin_panel.html"><button style="padding: 10px 20px 10px 20px;background-color: green;color: white;cursor:pointer;border:none;border-radius: 5px;">Back to Home🏠</button></a>
        </center>
   
</div>
    </div>
    <!--JQuery-->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="../js/script.js"></script>
    <script>
            function triggerClick(){
                document.querySelector('#file').click();
            }
            function filePreview(e) {
                if (e.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        document.querySelector('#imagedisplay').setAttribute('src',e.target.result);
                    };
                    reader.readAsDataURL(e.files[0]);
                }
            }
        </script> -->
</body>

</html>
