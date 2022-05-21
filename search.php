<?php 
include_once('./template/header.php');
try{
    $conn = $pdo->open();
    $search = $_POST['search'];
    // die($search);
    $stmt = $conn->prepare("SELECT * FROM products WHERE name like '%$search%'");
    // die($stmt);
    $stmt->execute();
    $products = $stmt->fetchAll();
    	// die($products);
    // foreach ($products as $product) {
    // 	$url = "http://localhost/flippwheels/knowmore.php?search=".$product['name'];
    // 	header("location: $url");
    // }
    // else{
    // 	echo"<script>alert('Sorry!!! your product is not available right now.');location.href='http://localhost/flippwheels/';</script>";
    // }
    $pdo->close();
}
catch(PDOException $e){
    echo $e->getMessage();
}
?>

<div class="searchproducts"> 
	<?php 
	if(!empty($products)):
		foreach ($products as $key => $product): ?>
			<div class="item">
				<br><br>
        <img src="<?php echo "http://localhost/flippwheels/uploads/".$product['photo'] ;?>" alt="" width="200px" height="200px">

        <h2><?php echo $product['name'];
$_SESSION['name']= $product['name'];
        ?></h2>

        <h4 class="txt">Rs.<?=$product['price'];?></h4>
        <h4><?php echo $product['fuel'];?></h4>


        <a href="knowmore.php?id=<?php echo $product['id'];?>">
  
            <button type="button" class="btn btn-success" data-toggle="modal" data-targets="#details-1" >Know More</button>
        </a>
  
   <a href="register.php?user=<?php echo $product['id'];?>">
        <button type="submit" class="btn btn-info" style="color:yellow"> Add to Cart</button></a>
    </div>
		<br>
<?php endforeach; else:?>


<h4 style="color:white; font-family: sans-serif;font-size: 20px;">Sorry! No matching products found <a href="http://localhost/flippwheels"></a></h4>

<?php endif?>
</div>

<br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>

<link rel="stylesheet" href="<?php echo 'http://localhost/flippwheels/css/style.css'?>">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
<footer class="sticky-footer">
<div class="whatsapp_float">
  <a href="http://wa.me/9779816097031" target="_blank" rel="noopener noreferrer">
    <i class="fab fa-whatsapp"></i>
  </a>
</div>
        <ul>
            <li><a href="./aboutus.php"><i class="fa fa-users" aria-hidden="true"></i>About Us</a></li>
            <li><a href="./ourmission.php">⌖🎯⌖Our Mission</a></li>
            <li><a href="./privacypolicy.php">🔐Privacy Policy</a></li>
            <li><a href="./contactus_form.php">📞Contact Us</a></li>
            <li><a href="./faqs.php">❓FAQ'S</a></li>
        </ul>
        <br>
        <div class="socialicons">

   <a href="http://localhost/flippwheels/"><img src="fb.gif" height="37" width="37"></a>  

   <a href="http://localhost/flippwheels/"><img src="ig.gif" height="37" width="37">  </a>

   <a href="http://localhost/flippwheels/"><img src="twitter.gif" height="37" width="37"> </a> 

   <a href="http://localhost/flippwheels/"><img src="li.gif" height="37" width="37"></a>

   <a href="http://localhost/flippwheels/"><img src="youtube.gif" height="37" width="37"></a>

   <a href="http://localhost/flippwheels/"><img src="tiktok.gif" height="37" width="37">  </a>

</div>

        <p> © Copyright FLIPPWHEELS(2021-2022)</p>
        </footer>
    
</body>
</html>


