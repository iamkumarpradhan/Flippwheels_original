<?php 
include_once('./template/header.php');
try{
    $conn = $pdo->open();
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = '$id'");
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
        <img src="<?php echo "http://localhost/flippwheels/uploads/".$product['photo'] ;?>" alt="" width="300px" height="300px">
        <h2><?php echo $product['name'];?></h2>
        <h4 class="txt">Rs.<?=$product['price'];?></h4>
        <h4><?php echo $product['fuel'];?></h4>
<!-- 
        <a href="details.php?id=<?php echo $product['id'];?>">
            <button type="button" class="btn btn-success" data-toggle="modal" data-targets="#details-1" >Know More</button>
        </a>
        <button type="submit" class="btn btn-info">Add to Cart</button> -->
    </div>
    <?php endforeach;?>
</div>
<?php include_once('./template/footer.php'); ?> 