<!-- 
 is of blogs, read more sections
 is of blogs, read more sections
this is of blogs, read more sections
this is of blogs, read more sections
this is of blogs, read more sections
this is of blogs, read more sections

this is of blogs, read more sections
this is of blogs, read more sections
this is of blogs, read more sections
this is of blogs, read more sections
this is of blogs, read more sections
thisthisthisthis
this is of blogs, read more sections

this is of blogger.php
 is of blogs, read more sections
 is of blogs, read more sections
 is of blogs, read more sections
 is of blogs, read more sections
 is of blogs, read more sections
 is of blogs, read more sections
 is of blogs, read more sections -->

/*
*/
<!-- <?ph
	
}

p
include_once('../template/header.php'); 
 
try{
    $conn = $pdo->open();
    $stmt = $conn->prepare("SELECT * FROM products");
    $stmt->execute();
    $products = $stmt->fetchAll();
//     $pdo->close();
// }
// catch(PDOException $e){
//     echo $e->getMessage();
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

        <h4 class="txt">Rs.<?=$product['price'];?></h4>
        <h4><?php echo $product['fuel'];?></h4>


       
        <a href="knowmore.php?id=<?php echo $product['id'];?>">
  
            <button type="button" class="btn btn-success" data-toggle="modal" data-targets="#details-1" style="color: white">Know More</button>
		        </a>
  

    </div>
    <?php endforeach;?>
</div> -->





<link rel="stylesheet" href="<?php echo 'http://localhost/flippwheels/css/style.css'?>">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
<!-- <?php 
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
 -->



















