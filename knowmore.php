<link rel="stylesheet" href="<?php echo 'http://localhost/flippwheels/css/style.css'?>">

<?php 
include_once('./template/header.php');
$user_id = $_SESSION['USER_ID'] ?? null;
$user_type = $_SESSION['USER_TYPE'] ?? null;
try{
    $conn = $pdo->open();
     $id = $_GET['id'];
    // $search = $_GET['search'];
    // die($search)
    $stmt = $conn->prepare("SELECT * FROM products WHERE id='$id' ");
    $stmt->execute();
    $products = $stmt->fetchAll();
    $pdo->close();
}
catch(PDOException $e){
    echo $e->getMessage();
}
?>
<style type="text/css">
    .knowmore{
        width: 90%;
        left: 3.5%;
        transform: translate(3.5%);
        border: none;
        outline: none;
        margin: 40px 0 40px 0;
        box-shadow: 0px 0px 10px 10px #ddd;
        background-color: #fff; 
        border-radius: 5px 5px 5px 5px;  
        font-family: sans-serif; 
        padding:20px 20px 20px 20px; 
        
    }
    .descriptionsss{

        text-align: center;
    }

    .cartbuttons{
        font-size: 20px;
        margin-left: 410px;
    border-left: 50%;
    color:white; 
     padding: 12px;
      background-color:orange;
      border-radius: 5px; 
      text-decoration:white;
      width: 8%;
      left: 50%;
    transform: translate(50%);
}

/*.cartbuttons{
    border-left: 30%;
    color:white; 
     padding: 10px;
      background-color:orange;
      border-radius: 3px; 
      text-decoration:none;
      width: 7%;
      left: 45.5%;
    transform: translate(45.5%);
}*/
</style>

 <div class="knowmore"> 
 <?php 
 $product_id = '';
 foreach($products as $product):
    $product_id = $product['id'];
  ?>
    <div class="item"> 
        <center><img src="<?php echo "http://localhost/flippwheels/uploads/".$product['photo'] ;?>" alt="" width="350px" height="350px"> </center>
        <div class="detailsinsame " style="width: 100%; transform: translate(36.5%);text-align: left;">


    <h2>Product:<?php echo $product['name'];?></h2> 
    <h4>Vehicle Category(Wheeler): <?php echo $product['type'];?></h4> 
    <h4>Fuel Used: <?php echo $product['fuel'];?></h4> 
    <h4>Kilometeres Driven: <?php echo $product['kmdriven'];?></h4>
    <h4>Engine in CC: <?php echo $product['engineincc'];?></h4> 
    <h4> Color: <?php echo $product['color'];?></h4> 
    <h4>Year Model :<?php echo $product['makeyear'];?></h4>  
    <h4>Registration No: <?php echo $product['registration_number'];?></h4> 
    <h4>Products Used(in yrs.): <?php echo $product['productused'];?></h4>
    <h4>Engine in CC: <?php echo $product['engineincc'];?></h4>  
    <h4>Negotiable: <?php echo $product['negotiable'];?></h4> 
    <h4>Price (USD.): <?php echo $product['price'];?></h4><br>
    
<!-- <form action="register.php?page=cart" method="post">
           <input type="submit" value="Add To Cart" style="  margin-left: :-200px;color: #fff; left:26.5%;transform: translate(36.5%);text-align:left; padding: 10px; background-color:orange; border-radius: 3px;"> 
   -->      <!-- </form> -->
</div>
      
      </div>
            <div class="descriptionsss">
            <left><h4>Features: <?=$product['description']?></h4></left>
            </div>
<br>
<?php if($user_id != $product['seller_id']):?>

<div class="cartbuttons">
    <a href="http://localhost/flippwheels/add_to_cart.php?user=<?php echo $product_id; ?>">Add to cart</a>
</div>
<?php endif;?>

<!--    
          </div>
    </div>
 -->

    <?php endforeach;?> 
</div>

<?php include_once('./template/footer.php'); ?> 