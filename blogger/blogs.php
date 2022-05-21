<?php
include_once('template/session.php'); 
include_once('template/header.php'); 
$user_id = $_SESSION['USER_ID'] ?? null;
$user_type = $_SESSION['USER_TYPE'] ?? null;
if ($user_type == 'SELLER') {
	$dashboard = 'http://localhost/flippwheels/seller/seller.php/';
}elseif($user_type == 'BUYER'){
	$dashboard = 'http://localhost/flippwheels/buyer/buyer.php/';

}else{
	$dashboard = 'http://localhost/flippwheels/blogger/blogger.php';
}
?>
<link rel="stylesheet" href="<?php echo 'http://localhost/flippwheels/css/style.css'?>">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
<?php 
include_once('./template/header.php');
try{
    $conn = $pdo->open();
    $stmt = $conn->prepare("SELECT * FROM blogs");
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
<table>
	<thead>
		<th>ID</th>
		<th>PHOTO</th>
		<th>TITLE OF BLOG</th>
		<th>DESCRIPTION</th>
		<th>PUBLISHED DATE</th>
	</thead>
	<tbody>
		<?php foreach($products as $product): ?>
		<td><?php echo $product['ID'];?></td>
		<td>
			<img src="<?php echo "http://localhost/flippwheels/uploads/".$product['Add_medias'] ;?>" alt="" width="200px" height="200px">
		</td>
		<td><?php echo $product['Title_of_blog'];?></td>
		<td><?php echo $product['Descriptions'];?></td>
		<td><?php echo $product['Published_date'];?></td>
	</tbody>
	<?php endforeach;?>
</table>

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