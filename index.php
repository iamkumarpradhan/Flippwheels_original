
<?php 
include_once('./template/header.php');
?>
<!--  <link rel="stylesheet" href="http://localhost/flippwheels/css/styles.css">
    <h1>ARE YOUR READY TO FLIPP YOUR OLD AUTOWHEELS?</h1> -->   
    <!-- <div class="photos"> -->
        <!-- ?<img src="./uploads/marchie.jpg"> -->

 <!-- --><div class="tesla"> -->
<!--  <video autoplay muted loop id="myVideo">  -->
<!--   <source src="tesla.mp4" type="video/mp4">
  <Your browser does not support HTML5 video>
</video>
</div> --> 
 <!-- /<video width="1280" height="400" controls autoplay> -->
  <!-- <source src="./uploads/tesla.mp4" type="video/mp4"> -->
  <!-- Your browser does not support the video tag. -->
<!-- </video> -->
 <!-- <h3>SELL YOUR WHEELS AT BEST PRICE!</h3> -->
    

<hr>
    <div class="two">
    <left> <h2 style="color:white;">Used Two Wheeler's<i class="fa fa-motorcycle" aria-hidden="true"></i>  in Nepal</h2></left>
<style >
    

.a {
 

  text-decoration: white;
</style>
<!-- <img src="rider.gif" height="10px" width="10px"></img> -->
<hr> 
<br>
<?php 

try{
    $conn = $pdo->open();
    $stmt = $conn->prepare("SELECT * FROM products where type='two'");
    $stmt->execute();
    $products = $stmt->fetchAll();
    $pdo->close();
}
catch(PDOException $e){
    echo $e->getMessage();
}
?>

<div class="flex">
    <?php foreach($products as $product): ?>
    <div class="item">
        <img src="<?php echo "http://localhost/flippwheels/uploads/".$product['photo'] ;?>" alt="" width="200px" height="200px">

        <h2><?php echo $product['name'];
$_SESSION['name']= $product['name'];
        ?></h2>

        <h4 class="txt">USD.<?=$product['price'];?></h4>
        <h4><?php echo $product['fuel'];?></h4>


        <a href="knowmore.php?id=<?php echo $product['id'];?>">
  
            <button type="button" class="btn btn-success" data-toggle="modal" data-targets="#details-1" >Know More</button>
        </a>       
        <!-- <button type="submit" class="btn btn-info"><a href="register.php"> Add to Cart</a></button> -->
    </div>
    <?php endforeach;?>

</div>
    </div>
    <hr>
    <div class="four">
  <left><h2 style="color:white;">Used Four Wheeler's   <i class="fa fa-car" aria-hidden="true"></i>  In Nepal</h2></left>
  
<!--  <style >
.a {
  text-decoration: white;
</style>
 -->
<hr><br>
<?php 

try{
    $conn = $pdo->open();
    $stmt = $conn->prepare("SELECT * FROM products where type='four'");
    $stmt->execute();
    $products = $stmt->fetchAll();
    $pdo->close();
}
catch(PDOException $e){
    echo $e->getMessage();
}
?>

<div class="flex">
    <?php foreach($products as $product): ?>
    <div class="item">
        <img src="<?php echo "http://localhost/flippwheels/uploads/".$product['photo'] ;?>" alt="" width="200px" height="200px">

        <h2><?php echo $product['name'];
$_SESSION['name']= $product['name'];
        ?></h2>

        <h4 class="txt">Rs.<?=$product['price'];?></h4>
        <h4><?php echo $product['fuel'];?></h4>


        <a href="knowmore.php?id=<?php echo $product['id'];?>">
  
            <button type="button" class="btn btn-success" data-toggle="modal" data-targets="#details-1" >Know More</button>
        </a>
  
  
        <!-- <button type="submit" class="btn btn-info"><a href="register.php"> Add to Cart</a></button> -->
    </div>
    <?php endforeach;?>
</div>
</div>


<hr>
 <!-- <div class="image">
       <center> <h3 style="color:white;">All in 3 Simple Steps</h3></center>
        <img src="./uploads/allin3.png">
    </div>

 -->

    <div class="image">
        <h3 >Why should you choose Flippwheels?</h3>
        <img src="./uploads/choose.png">
    </div>
</div>
<hr>



<!-- <div class="threedlocation"> -->
    <!-- <center><h1>Flippwheels:Operating Location📍</h1></center> -->
<!-- <hr> -->
    <!-- <video width="1200" height="350" controls> -->
  <!-- <source src="location.mp4" type="video/mp4"> -->
  <!-- <source src="movie.ogg" type="video/ogg"> -->
  <!-- Your browser does not support the video tag. -->
<!-- </video> -->
<!-- <center> -->
    <!-- <video autoplay muted loop id="myVideo" width="1200" height="400">  -->
  <!-- <source src="location.mp4" type="video/mp4" > -->
   <!-- Your browser does not support HTML5 video.  -->
<!-- </video>  -->
<!-- </center> -->
<!-- </div> -->





<?php include_once("./template/footer.php"); ?> 