<?php
include_once('./template/session.php');
$conn = $pdo->open();

$folder=__DIR__.'/uploads/';
$upfile=$_FILES["upfile"]["name"];
$tmpname=$_FILES["upfile"]["tmp_name"];
$name=$_POST['pname'];
$registration_number=$_POST['pnumber'];
$description=$_POST['descriptions'];
$negotiable=$_POST['negotiable'];
$makeyear=$_POST['makeyear'];
$color=$_POST['color'];
$kmdriven=$_POST['kmdriven'];
$fuel=$_POST['fuels'];
$engineincc=$_POST['engineincc'];
$productused=$_POST['productused'];
$delivery=$_POST['delivery'];
$type=$_POST['type'];
$price=$_POST['priceoffered'];
$seller_id =$_SESSION['USER_ID'] ?? null;
$posted_date = date('Y/m/d');
$status = 'unsold';

if (!empty($upfile) || !empty($pname) || !empty($pnumber) || !empty($kmdriven) || !empty($productused) || !empty($priceoffered))
{
    if (isset($_POST['submit']))
    {
        move_uploaded_file($tmpname,$folder.$upfile);
        try{
            $stmt = $conn->prepare("INSERT INTO products(name, registration_number, description, price , photo , negotiable, makeyear, color, kmdriven, fuel, engineincc, productused , delivery , type, seller_id, posted_date, status ) VALUES (:name, :registration_number,:description, :price, :photo, :negotiable, :makeyear, :color, :kmdriven, :fuel, :engineincc, :productused, :delivery, :type, :seller_id, :posted_date, :status) ");

            $stmt->execute(['name'=>$name, 'registration_number'=>$registration_number, 'description'=>$description, 'price'=>$price, 'photo'=>$upfile, 'negotiable'=>$negotiable, 'makeyear'=>$makeyear, 'color'=>$color, 'kmdriven' => $kmdriven, 'fuel' => $fuel, 'engineincc' => $engineincc, 'productused'=>$productused, 'delivery'=>$delivery, 'type'=>$type,'seller_id'=>$seller_id,'posted_date'=>$posted_date,'status'=>$status]);
            
            header('Location: http://localhost/flipwheels/products.php');
        }
        catch(PDOException $e){
           echo "Error inserting into datebase";
        }
    
    }else 
    {
        echo"Error Occured";
    }
	$pdo->close();

}else
{
	echo"All field are required";
	die();
}
?>


