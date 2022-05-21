 <?php
    include "dbconn.php";
    if(isset($_GET['del'])){
        $id=$_GET['del'];
        mysqli_query($con,"DELETE FROM users WHERE id = '$id'");
    }    
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="device-width, initial-scale=1.0">

   
    <script src="https://kit.fontawesome.com/8ae2387575.js" crossorigin="anonymous"></script>

    <!--Google Font links-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora&display=swap" rel="stylesheet">

    <!--CSS styling-->
    <link rel="stylesheet" href="adminstyle/Admin_panel_css.css">
    <title>Admin- manage sellers</title>
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
    <!-- <div class="admin-wrapper"> -->

        <!--Left side bar-->
        <!-- <div class="left-sidebar">
            <ul>
                <li><a href="index.php">Manage Products</a></li>
                <li><a href="manage_buyer.php">Manage Buyers</a></li>
                <li><a href="manage_seller.php">Manage Sellers</a></li>
            </ul>
        </div>
 -->
        <!--Admin Content-->
        <div class="admin-content">
            <div class="content">
               <center> <h2 class="page-title">Manage Sellers</h2></center>
               <table  border="3">
                    <thead>
                      <th>Id</th>
                        <th>Full name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Type</th>
                        <th colspan="2">Action</th>
                    </thead>
                    <tbody>
                    <?php
                        include "dbconn.php";
                        $sql = mysqli_query($con, "SELECT * FROM `users` WHERE `type`='SELLER'");

                        if(mysqli_num_rows($sql)>0){
                            while($data = mysqli_fetch_assoc($sql)){?>
                                <tr>
                                <td><?php echo $data['id'];?></td>
                                <td><?php echo $data['fullname'];?></td>
                                <td><?php echo $data['username'];?></td>
                                <td><?php echo $data['email'];?></td>
                                <td><?php echo $data['phone'];?></td>
                                <td><?php echo $data['address'];?></td>
                                <td><?php echo $data['type'];?></td>
                      

                                 <td><a href="http://localhost/flippwheels/flippwheelsadmin/update_seller.php?sr_id=<?php echo $data["id"];?>" class="edit">Update</a></td>


                                 <td><a href="http://localhost/flippwheels/flippwheelsadmin/manage_seller.php?del=<?php echo $data["id"];?>" onclick="return confirm('Are you sure?');" class="delete">Delete</a></td>

                            </tr>
                            <?php
                                }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
 <div class="getbacktohome">


 <br><br>
        <center> <a href="http://localhost/flippwheels/flippwheelsadmin/products/Admin_panel.html"><button style="padding: 10px 20px 10px 20px;background-color: green;color: white;cursor:pointer;border:none;border-radius: 5px;">Back to Home🏠</button></a>
        </center>
   
</div>


    </div>
    <!--JQuery-->
   <!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="../js/script.js"></script>
</body>
 -->
</html> 