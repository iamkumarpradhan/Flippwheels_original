<style>
.paymentdollar
{
    text-align: center;
    font-size: 2rem;
    background-color: #fff;
    padding: 25px 25px;
    margin: 0 auto;
    border-radius: 10px;
    box-shadow: 10px 5px 10px rgba(0, 0, 0, 0.15);
/*
  font-family: sans-serif;
  margin-top: 50p
  font-size: 20px;x;
text-align: center;*/
}
#paypal-button-container
{
  width: 20%;
margin:0px auto;
text-align: center;
}
#pay{
  font-size: 1.5rem;
  line-height: 1.1;
  border: 1px solid #eff019;
}



</style>

<?php
include_once('../template/session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paypal Pay</title>
    <link rel="shortcut icon" href="images/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="paypal" style="padding:20px; border-radius:5px;box-shadow: 0 .3rem .5rem rgba(0,0,0,.3);">
      <?php 
try{
    $conn = $pdo->open();
    $id = $_GET['pid'];
    $stmt = $conn->prepare("SELECT `price` FROM products WHERE id = $id ");
    $stmt->execute();
    $products = $stmt->fetchAll();
    $pdo->close();
}
catch(PDOException $e){
    echo $e->getMessage();
}
?>
<?php
foreach ($products as $product):
?>
<div class="paymentdollar">
          <p><strong>USD</strong></p>   
          <input type="text" name="" id="pay" style="text-align:center; color:#30637c;padding:10px;outline:none;border:none;" value="<?php echo $product['price'];?>">  

<div id="paypal-button-container">          
<script src="https://www.paypal.com/sdk/js?client-id=AWfe-PPSC8CtTPfWFhs1oANgDSZdLUClKvTMB9yS8r7g8iLH4KBzVhm_WZRr1SNo33jKn4MYwLW5Pnky&disable-funding=credit,card&currency=USD">
</script>
<script>
paypal.Buttons(
{
    style:
    {
      // margin-top:'50%',
        color:'blue',
        shape:'pill'
    },
  // Sets up the transaction when a payment button is clicked
  createOrder: function(data, actions) {
    return actions.order.create({
      purchase_units: [{
        amount: {
          value: document.getElementById('pay').value // Can reference variables or functions. Example: `value: document.getElementById('...').value`
        }
      }]
    });
  },
  // Finalize the transaction after payer approval
  onApprove: function (data, actions) {
  return actions.order.capture().then(function (details) {
    console.log(details)
    window.location.replace("http://localhost/flippwheels/Paypal_gateway/success.php")
  })
},
onCancel: function (data) {
  window.location.replace("http://localhost/flippwheels/Paypal_gateway/oncancel.php")
}
})

.render('#paypal-button-container');
</script>

        </div>

          </div>
    </div>
    <?php
          endforeach;
    ?>

</body>
</html>