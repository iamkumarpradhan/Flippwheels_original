<?php
include_once('../template/session.php'); 
$user_id = $_SESSION['USER_ID'] ?? null;
$user_type = $_SESSION['USER_TYPE'] ?? null;
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Flippwheels</title>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo 'http://localhost/flippwheels/css/style.css'?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
</head>

<body>
    <div class="bannercommercial" style="display: block;">
        <a href="http://localhost/flippwheels/seller/seller.php"><img src="http://localhost/flippwheels/bannercommercial.gif" width="100%" height="150">  </img></a>

    </div>
<div class="wrapper">
<header>
    <nav class="navbar" style="display: flex;">
        <a href="http://localhost/flippwheels/seller/seller.php"><img class="logo" src="<?php echo 'http://localhost/flippwheels/uploads/logo.jpg';?>"></a>
        <ul class="ul" style="display: flex;">
            
            <!-- <li><a href="review.html"> REVIEW </a></li> -->
            <li><a class="cta" href="<?php echo 'http://localhost/flippwheels/product_form.php'; ?>"><button>💰Sell</button> </a></li>
            <li><a class="cta" href="<?php echo 'http://localhost/flippwheels/seller/myproducts.php'; ?>"><button>🛒My Products</button> </a></li>
            

                
            
            <?php if($user_id){
         ;    ?>
                <li style="margin-left: 40px;"><a href="http://localhost/flippwheels/seller/seller.php" style="font-size: 20px"><i class="fas fa-user"></i> <?php echo strtoupper($_SESSION['USER_NAME'] ?? ''); ?></a></li>
                <li><a href="../logout.php" style="font-size: 20px"><i class="fas fa-user"></i> LOGOUT</a></li>
                <?php }?>
        </ul>
    </nav>
</header>
<?php 
try{
    $conn = $pdo->open();
    $stmt = $conn->prepare("SELECT * FROM products");
    $stmt->execute();
    $products = $stmt->fetchAll();
    $pdo->close();
}
catch(PDOException $e){
    echo $e->getMessage();
}
?>

<br>
<br>
<br>
<br>


<div class="flex">
    <?php foreach($products as $product): ?>
    <div class="item">
        <img src="<?php echo "http://localhost/flippwheels/uploads/".$product['photo'] ;?>" alt="" width="220px" height="220px">

        <h2><?php echo $product['name'];
$_SESSION['name']= $product['name'];
        ?></h2>

        <h4 class="txt">USD.<?=$product['price'];?></h4>
        <h4><?php echo $product['fuel'];?></h4>


       
        <a href="http://localhost/flippwheels/knowmore.php?id=<?php echo $product['id'];?>">
  
            <button type="button" class="btn btn-success" data-toggle="modal" data-targets="#details-1" style="color: white">Know More</button>
        </a>
  

    </div>
    <?php endforeach;?>
</div>
<link rel="stylesheet" href="<?php echo 'http://localhost/flippwheels/css/style.css'?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
<footer class="sticky-footer">
        <ul>
            <li><a href="http://localhost/flippwheels/aboutus.php"><i class="fa fa-users" aria-hidden="true"></i>About Us</a></li>
            <li><a href="http://localhost/flippwheels/ourmission.php">⌖🎯⌖Our Mission</a></li>
            <li><a href="http://localhost/flippwheels/privacypolicy.php">🔐Privacy Policy</a></li>
            <li><a href="http://localhost/flippwheels/contactus_form.php">📞Contact Us</a></li>
            <li><a href="http://localhost/flippwheels/faqs.php">❓FAQ'S</a></li>
        </ul>
        <br>
        <div class="socialicons">

   <a href="http://localhost/flippwheels/"><img src="../fb.gif" height="37" width="37"></a>  

   <a href="http://localhost/flippwheels/"><img src="../ig.gif" height="37" width="37">  </a>

   <a href="http://localhost/flippwheels/"><img src="../twitter.gif" height="37" width="37"> </a> 

   <a href="http://localhost/flippwheels/"><img src="../li.gif" height="37" width="37"></a>

   <a href="http://localhost/flippwheels/"><img src="../youtube.gif" height="37" width="37"></a>

   <a href="http://localhost/flippwheels/"><img src="../tiktok.gif" height="37" width="37">  </a>

</div>

        <p> © Copyright FLIPPWHEELS(2021-2022)</p>
        </footer>
    
</body>
</html>