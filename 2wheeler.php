<style >
    

.a {
 

  text-decoration: white;
</style>
<?php 
include_once('./template/header.php');

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

<br>
<br>
<br>
<br>


<div class="2wheeler">
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
  
  
        <button type="submit" class="btn btn-info"><a href="add_to_cart.php?user=<?php echo $product['id'];?>" style="text-decoration: none;"> Add to Cart</a></button>
    </div>
    <?php endforeach;?>
</div>
<?php include_once('./template/footer.php'); ?> 