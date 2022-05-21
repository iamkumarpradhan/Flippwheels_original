<?php
include_once('session.php'); 
$user_id = $_SESSION['USER_ID'] ?? null;
$user_type = $_SESSION['USER_TYPE'] ?? null;
if ($user_type == 'SELLER') {
	$dashboard1 = 'http://localhost/flippwheels/seller/seller.php/';
}elseif($user_type == 'BUYER'){
	$dashboard2 = 'http://localhost/flippwheels/buyer/buyer.php/';

}else{
	$dashboard3 = 'http://localhost/flippwheels/blogger/blogger.php';
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Flippwheels : Buy and sell your used automobiles</title>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
	<link rel="stylesheet" href="http://localhost/flippwheels/css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
</head>

<body>
	<?php if($user_id && $user_type == 'BUYER'){ ?>
	<div class="bannercommercial" style="display: block;">
		<a href="http://localhost/flippwheels/buyer/buyer.php"><img src="http://localhost/flippwheels/bannercommercial.gif" width="100%" height="150">	</img></a>
	</div>
	<?php }else if($user_id && $user_type == 'SELLER'){ ?>
	<div class="bannercommercial" style="display: block;">
		<a href="http://localhost/flippwheels/seller/seller.php"><img src="http://localhost/flippwheels/bannercommercial.gif" width="100%" height="150">	</img></a>
	</div>
	<?php }else if($user_id && $user_type == 'BLOGGER'){ ?>
	<div class="bannercommercial" style="display: block;">
		<a href="http://localhost/flippwheels/blogger/blogger.php"><img src="http://localhost/flippwheels/bannercommercial.gif" width="100%" height="150">	</img></a>
	</div>
	<?php }else{ ?>
	<div class="bannercommercial" style="display: block;">
		<a href="http://localhost/flippwheels"><img src="http://localhost/flippwheels/bannercommercial.gif" width="100%" height="150">	</img></a>
	</div>
	<?php } ?>
<div class="wrapper">
<header>
	<nav class="navbar">
		<?php if($user_id && $user_type == 'BUYER'){ ?>
		<a href="http://localhost/flippwheels/buyer/buyer.php"><img class="logo" src="<?php echo 'http://localhost/flippwheels/uploads/logo.jpg';?>"></a>
		<?php }else if($user_id && $user_type == 'SELLER'){ ?>
		<a href="http://localhost/flippwheels/seller/seller.php"><img class="logo" src="<?php echo 'http://localhost/flippwheels/uploads/logo.jpg';?>"></a>
		<?php }else if($user_id && $user_type == 'BLOGGER'){ ?>
		<a href="http://localhost/flippwheels/blogger/blogger.php"><img class="logo" src="<?php echo 'http://localhost/flippwheels/uploads/logo.jpg';?>"></a>
		<?php }else{ ?>
		<a href="http://localhost/flippwheels"><img class="logo" src="<?php echo 'http://localhost/flippwheels/uploads/logo.jpg';?>"></a>
			<?php }
		if($user_type == 'SELLER'){ ?>
		<ul class="ul" style="display: flex;">
            
            <!-- <li><a href="review.html"> REVIEW </a></li> -->
            <li><a class="cta" href="<?php echo 'http://localhost/flippwheels/product_form.php'; ?>"><button>💰Sell</button> </a></li>
            <li><a class="cta" href="<?php echo 'http://localhost/flippwheels/seller/seller.php'; ?>"><button>🛒My Products</button> </a></li>
                <li style="margin-left: 40px;"><a href="http://localhost/flippwheels/seller/seller.php" style="font-size: 20px"><i class="fas fa-user"></i> <?php echo strtoupper($_SESSION['USER_NAME'] ?? ''); ?></a></li>
                <li><a href="http://localhost/flippwheels/logout.php" style="font-size: 20px"><i class="fas fa-user"></i> LOGOUT</a></li>
        </ul>
        <?php } else if($user_id && $user_type == 'BUYER'){?>
		<ul>
			<li><a class="cta" href="<?php echo 'http://localhost/flippwheels/fourwheeler.php'; ?>">
			<button>🚗Four Wheelers</button> </a></li>
			<li><a class="cta" href="<?php echo 'http://localhost/flippwheels/twowheeler.php'; ?>">
            <button>🏍️Two Wheelers</button> </a></li>
			<!-- <li><a href="review.html"> REVIEW </a></li> -->
			<li><a class="cta" href="<?php echo 'http://localhost/flippwheels/blogs.php'; ?>"><button>📄Blogs</button> </a></li>
				 <li style="margin-left: 40px;"><a href="http://localhost/flippwheels/buyer/buyer.php" style="font-size: 20px"><i class="fas fa-user"></i> <?php echo strtoupper($_SESSION['USER_NAME'] ?? ''); ?></a></li>
                <li><a href="http://localhost/flippwheels/logout.php" style="font-size: 20px"><i class="fas fa-user"></i> LOGOUT</a></li>
            </ul>
	<?php }
		else if($user_type == 'BLOGGER'){ ?>
		<ul class="ul" style="display: flex;">
            
           

            <li><a class="cta" href="<?php echo 'http://localhost/flippwheels/blogger/blogging_form.php'; ?>"><button>📰Write new blogs</button> </a></li>
                <li style="margin-left: 40px;"><a href="http://localhost/flippwheels/blogger/blogger.php" style="font-size: 20px"><i class="fas fa-user"></i> <?php echo strtoupper($_SESSION['USER_NAME'] ?? ''); ?></a></li>
                <li><a href="http://localhost/flippwheels/logout.php" style="font-size: 20px"><i class="fas fa-user"></i> LOGOUT</a></li>
        </ul>



			<?php } else{?>
			<ul>
			<li><a class="cta" href="<?php echo 'http://localhost/flippwheels/fourwheeler.php'; ?>">
			<button>🚗Four Wheelers</button> </a></li>
			<li><a class="cta" href="<?php echo 'http://localhost/flippwheels/twowheeler.php'; ?>">
            <button>🏍️Two Wheelers</button> </a></li>
			<!-- <li><a href="review.html"> REVIEW </a></li> -->
			<li><a class="cta" href="<?php echo 'http://localhost/flippwheels/blogs.php'; ?>"><button>📄Blogs</button> </a></li>

			<li><a class="cta" href="<?php echo 'http://localhost/flippwheels/login.php'; ?>"><button> 👤Login</button> </a></li>
			<li><a  class="cta" href="<?php echo 'http://localhost/flippwheels/register.php'; ?>"><button>👥Register</button> </a></li>
			<li><form action="http://localhost/flippwheels/search.php" method="POST"><input type="text" name="search" placeholder="🔍Search your product..."></form></li>

			<?php } ?>
		</ul>

	</nav>
</header>