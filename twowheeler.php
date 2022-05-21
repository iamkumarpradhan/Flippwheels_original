<style >
.a {
  text-decoration: white;
</style>


<?php
include_once('./template/session.php');
include_once('template/header.php');
// session_start();
 // echo $_SESSION['name'];
 // echo $_SESSION['price'];
//  // echo $_SESSION['fuel'];
// $user_id = $_SESSION['USER_ID'] ?? null;
// $user_type = $_SESSION['USER_TYPE'] ?? null;

//     if(empty($user_id) || ($user_id && $user_type == "SELLER"))
//     {
//         echo "<script>alert('Hello, Please create your buyer id to buy the products.Thank you, have a wonderful day');location.href='http://localhost/flippwheels/register.php';</script>";
//         exit;
//      }
// // <?php
// // include_once('template/session.php');

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

<br>
<br>
<br>
<br>


<div class="fourwheeler">
    <?php foreach($products as $product): ?>
    <div class="item">
        <img src="<?php echo "http://localhost/flippwheels/uploads/".$product['photo'] ;?>" alt="" width="200px" height="200px">

        <h2><?php echo $product['name'];
$_SESSION['name']= $product['name'];
        ?></h2>

        <h4 class="txt">USD<?=$product['price'];?></h4>
        <h4><?php echo $product['fuel'];?></h4>


        <a href="knowmore.php?id=<?php echo $product['id'];?>">
  
            <button type="button" class="btn btn-success" data-toggle="modal" data-targets="#details-1" >Know More</button>
        </a>
  
   <a href="http://localhost/flippwheels/add_to_cart.php?user=<?php echo $product['id'];?>">
        <button type="submit" class="btn btn-info" style="color:yellow"> Add to Cart</button></a>
    </div>
    <?php endforeach;?>
</div>
<br>
<br>
<?php include_once('./template/footer.php'); ?> 