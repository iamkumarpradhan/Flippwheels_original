<?php 
include_once('../template/header.php'); 
$user_id = $_SESSION['USER_ID'] ?? null;
$user_type = $_SESSION['USER_TYPE'] ?? null;
?>

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

        <!-- <a href="knowmore.php?id=<?php echo $product['id'];?>">
  
            <button type="button" class="btn btn-success" data-toggle="modal" data-targets="#details-1" style="color: white">Know More</button>
        </a> -->
  
  
        <a href="http://localhost/flippwheels/add_to_cart.php?user=<?php echo $product['id'];?>">
        <button type="submit" class="btn btn-info" style="color:yellow"> Add to Cart</button></a>

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