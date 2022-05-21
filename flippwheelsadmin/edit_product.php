    <?php
    include "dbconn.php";
    // If save button is clicked ...
    if (isset($_POST['update'])) {
        // $pid = $_POST['id'];
        // $fnam = $_POST['fname'];
        // $uname = $_POST['uname'];
        // $emailid = $_POST['emails'];
        // $phn = $_POST['phones'];
        // $addresses = $_POST['addres'];
    $pid = $_POST['id'];
    $nam = $_POST['name'];
    $num = $_POST['rnum'];
    $desc = $_POST['pdesc'];
    $price = $_POST['price'];
    $nego = $_POST['negotiable'];
    $myear = $_POST['year'];
    $color = $_POST['color'];
    $driven = $_POST['km'];
    $fuel = $_POST['fuel'];
    $cc = $_POST['cc'];
    $puse = $_POST['use'];
    $del = $_POST['deliver'];
    $type = $_POST['type'];
    $s_id = $_POST['sid'];
    $pdate = $_POST['date'];
    $stat = $_POST['status'];

// <?php
//     // If save button is clicked ...
//     if (isset($_POST['update'])) {
//     // image file directory
//     $target = "C:/xampp/htdocs/flippwheels/uploads/".basename($_FILES['Image']['name']);

    //connect to the database
   //  $con = mysqli_connect("localhost","root","","flippwheels");
  	// $image = $_FILES['Image']['name'];
   //  $id = $_POST['pr_id'];
   //  $nam = $_POST['name'];
   //  $num = $_POST['rnum'];
   //  $desc = $_POST['desc'];
   //  $price = $_POST['price'];
   //  $nego = $_POST['negotiable'];
   //  $myear = $_POST['year'];
   //  $color = $_POST['color'];
   //  $driven = $_POST['km'];
   //  $fuel = $_POST['fuel'];
   //  $cc = $_POST['cc'];
   //  $puse = $_POST['use'];
   //  $del = $_POST['deliver'];
   //  $type = $_POST['type'];
   //  $s_id = $_POST['sid'];
  	// $pdate = $_POST['date'];
  	// $stat = $_POST['status'];

   //  move_uploaded_file($_FILES['Image']['tmp_name'], $target);
    $sql = "UPDATE `products` SET `name`='$nam',`registration_number`='$num',`description`='$desc',`price`='$price',`negotiable`='$nego',`makeyear`='$myear',`color`='$color',`kmdriven`='$driven',`fuel`='$fuel',`engineincc`='$cc',`productused`='$puse',`delivery`='$del',`type`='$type',`seller_id`='$s_id',`posted_date`='$pdate',`status`='$stat' WHERE id='$pid'";
    $query_run = mysqli_query($con, $sql);

    if ($query_run){
      echo '<script type="text/javascript">alert("data are edited successfully...");window.location.href="http://localhost/flippwheels/flippwheelsadmin/manage_product.php"</script>';
      }
    else{
      die("failed to insert ".mysqli_error($con));
  echo "<script>window.location.href='http://localhost/flippwheels/flippwheelsadmin/edit_product.php?product_id=<?php echo $pid;?>'</script>";
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
                <form name="form" method="post" action="" enctype="multipart/form-data" id="uploadForm">
                <?php
                    include "dbconn.php";
                    if(isset($_GET['product_id'])){
                        $pid = $_GET['product_id'];
                        $sql = "SELECT * FROM `products` WHERE id = '$pid'";
                        $result = mysqli_query($con,$sql);
                        while($data = mysqli_fetch_array($result)){?>
                    <div class="pro-image">
                        <div class="pimage">
                            <!-- <h3>Product image</h3> -->
                        </div>
                        <input type="hidden" name="pr_id" id="product_id" value="<?php echo $id;?>">
                        <img src='<?php echo 'uploads/'.$data['images'];?>' onclick="triggerClick()" id="imagedisplay">
                        <input type="file" name="Image" id="file" onchange="filePreview(this)" style="display: none;">
                        <!--div class="image">
                        </div-->
                    </div>
                    <div class="productsedit">
                        <div class="pheader">
                          <!--   <h3>Place details</h3> -->
                        </div>
                <center><h2 class="page-title">Manage Product</h2></center>
                        <div class="input">
                            <label for="">Name</label><br>
                            <input type="hidden" name="id" value="<?php echo $data['id']?>">
                            <input type="text" name="name" id="" required class="form-control" value="<?php echo $data['name']?>"><br>
                            <label for="">Registration Number</label><br>
                            <input type="text" name="rnum" id="" required class="form-control" value="<?php echo $data['registration_number']?>"><br>   
                            <label for="">Description</label><br>
                            <input type="text" name="pdesc" id="" required class="form-control" value="<?php echo $data['description']?>"><br>
                            <label for="">Price(USD.)</label><br>
                            <input type="number" name="price" id="" required class="form-control" value="<?php echo $data['price']?>"><br>   
                            <label for="">Negotiable</label><br>
                            <input type="text" name="negotiable" id="" required class="form-control" value="<?php echo $data['negotiable']?>"><br>   
                            <label for="">make year</label><br>
                            <input type="text" name="year" id="" required class="form-control" value="<?php echo $data['makeyear']?>"><br>
                            <label for="">Color</label><br>
                            <input type="text" name="color" id="" required class="form-control" value="<?php echo $data['color']?>"><br>   
                            <label for="">Km driven</label><br>
                            <input type="text" name="km" id="" required class="form-control" value="<?php echo $data['kmdriven']?>"><br>
                            <label for="">Fuel</label><br>
                            <input type="text" name="fuel" id="" required class="form-control" value="<?php echo $data['fuel']?>"><br>   
                            <label for="">Engine in cc</label><br>
                            <input type="text" name="cc" id="" required class="form-control" value="<?php echo $data['engineincc']?>"><br>
                            <label for="">Product used</label><br>
                            <input type="text" name="use" id="" required class="form-control" value="<?php echo $data['productused']?>"><br>   
                            <label for="">Delivery</label><br>
                            <input type="text" name="deliver" id="" required class="form-control" value="<?php echo $data['delivery']?>"><br>
                            <label for="">Type</label><br>
                            <input type="text" name="type" id="" required class="form-control" value="<?php echo $data['type']?>"><br>   
                            <label for="">Seller id</label><br>
                            <input type="number" name="sid" id="" required class="form-control" value="<?php echo $data['seller_id']?>"><br>
                            <label for="">Posted_date</label><br>
                            <input type="date" name="date" id="" required class="form-control" value="<?php echo $data['posted_date']?>"><br>   
                            <label for="">Status</label><br>
                            <input type="text" name="status" id="" required class="form-control" value="<?php echo $data['status']?>"><br>
                           <input type="submit" name="update" value="Update Product">
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