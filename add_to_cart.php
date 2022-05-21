	<style>
	.paymentmerchant
	{

 margin-left: 80%;
 transform: translate(80%);
 display: inline-block;
  margin: 10px 15px;
}	
/*.paymentmerchant.p
{
	font-size: 100px;
}*/
	.head
	{
		font-size: 25px;
		height:100px;
		width:100%;

	}
		
	.front
	{
	font-size: 20px;
		height: 600px;
		width:100%;
		min-height: 2vh;
		
		
		
	}
	.front td
	{
		font-size: 25px;
		border-radius: 10px;
		color:orange;
		border:3px solid #262626;
	
		}
		.detail
		{
			height: 400px;
			width:100%;
			overflow-y: scroll;
			background-color: white;
		}
		.table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
.table tr td
{
 color: black;
}
</style>
<?php
include_once('./template/session.php');
$user_id = $_SESSION['USER_ID'] ?? null;
$user_type = $_SESSION['USER_TYPE'] ?? null;

    if(empty($user_id) || ($user_id && $user_type == "SELLER"))
    {
        echo "<script>alert('Hello, Please create your buyer id to buy the products.Thank you, have a wonderful day🙂');location.href='http://localhost/flippwheels/register.php';</script>";
        exit;
     }


								  
	
$connect=mysqli_connect('localhost','root','','flippwheels');
if(isset($_SESSION['USER_ID'])){
$pro_id=$_GET['user'];

$sql = "SELECT * FROM products where id='$pro_id' ";
$result = $connect->query($sql);
?>
<?php
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
?>


<table class="front">

<tr><td>
	<center>

	<div class="head">
		<center><a href="http://localhost/flippwheels/buyer/buyer.php">
<img src="uploads/logo.jpg"  style="border-radius: 10px; float: left; width:190px;height: 190px;"></a></center>
 
	<center><h1 style="color: green;"> Flippwheels</h1></center>
	<center> Billing details of Product</center>
</div>
<!--  -->
<br>
<center><img src="<?php echo 'http://localhost/flippwheels/uploads/'.$row['photo'] ;?>" alt="" width="320px" height="270px"> </center>
<br>
<?php
									  
	$nam=	$row["name"];
	
?>


	<div class="detail">
<table class="table table-bordered table-striped table-hover">
  <tr>

     <td ><strong> Registration no:</strong> </td>
      <td><strong><?php echo $row['registration_number'];?></strong></td>
     
  </tr>
  <tr>

      <td>Product name</td>
      <td> <?php echo $nam;?></td>
     
  </tr>
  <tr>
      <td>Make year</td>
      <td><?php echo $row['makeyear'];?></td>
     
  <tr>
      <td>Color</td>
      <td><?php echo $row['color'];?></td>
      
  </tr>
  <tr>
      <td>Kilometer Driven</td>
      <td><?php echo $row['kmdriven'];?></td>
      
  </tr>
  <tr>
      <td>Engine</td>
      <td><?php echo $row['fuel'];?></td>
      
  </tr>
  <tr>
      <td>Engine in CC</td>
      <td><?php echo $row['engineincc'];?></td>
      
  </tr>
  <tr>
      <td>Category(in Wheeler)</td>
     <td><?php echo $row['type'];?></td>
  </tr>
   <tr>
      <td>Duration used(In Year)</td>
      <td><?php echo $row['productused'];?></td>
      
  </tr>
  <tr>
      <td>Priced(USD)</td>
      <td><?php echo $row['price'];?></td> 
  </tr>
</table>

  </div>
	<!-- </td></tr>	 -->
</div>
<div class="paymentmerchant">
<center>
<p>Payment Via</p>
   <a href="http://localhost/flippwheels/Paypal_gateway/paypal_pay.php?pid=<?php echo $row['id'];?>"><img src="http://localhost/flippwheels/uploads/paypal.jpg" height="100" width="170"> </a>

   <a href="https://esewa.com.np/#/home"><img src="http://localhost/flippwheels/uploads/esewa.jpg" height="100" width="170"></a>  

   <a href="https://khalti.com/"><img src="http://localhost/flippwheels/uploads/khalti.jpg" height="100" width="170">  </a>

</center>
</div>
    <?php
} }else {
    echo "<tr><td colspan='5'>0 results<td></tr>";
}
}?>


	


