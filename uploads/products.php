<?php 
include_once('./template/header.php');
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

<div class="flex">
    <?php foreach($products as $product): ?>
    <div class='item'>
        <img src="<?php echo "http://localhost/flipwheels/uploads/".$product['photo'] ;?>" alt="" width="200px" height="200px">
        <h4><?php echo $product['name'];?></h4>
        <h5><?php echo $product['price'];?></h4>
    </div>
    <?php endforeach;?>
</div>


<?php include_once('./template/footer.php'); ?> 
