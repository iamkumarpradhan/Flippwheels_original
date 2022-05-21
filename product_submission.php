<?php
include_once('./template/session.php');

$conn = $pdo->open();
    if (isset($_POST['submit']))
    {
         try{

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
            $price= $_POST['priceoffered'];
            $seller_id =$_SESSION['USER_ID'] ?? 0;
            $posted_date = date('Y/m/d');
            $status = 'unsold';
            // $place=$_POST['place'];
            
            move_uploaded_file($tmpname,$folder.$upfile);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("INSERT INTO products(name, registration_number, description, price, photo, negotiable, makeyear, color, kmdriven, fuel, engineincc, productused, delivery, type, seller_id, posted_date, status) VALUES (:name, :registration_number,:description, :price, :upfile, :negotiable, :makeyear, :color, :kmdriven, :fuel, :engineincc, :productused, :delivery, :type, :seller_id, :posted_date, :status)");

            $stmt->bindParam(':name',$name);
            $stmt->bindParam(':registration_number',$registration_number);
            $stmt->bindParam(':description',$description);
            $stmt->bindParam(':price',$price);
            $stmt->bindParam(':upfile',$upfile);
            $stmt->bindParam(':negotiable',$negotiable);
            $stmt->bindParam(':makeyear',$makeyear);
            $stmt->bindParam(':color',$color);
            $stmt->bindParam(':kmdriven',$kmdriven);
            $stmt->bindParam(':fuel',$fuel);
            $stmt->bindParam(':engineincc',$engineincc);
            $stmt->bindParam(':productused',$productused);
            $stmt->bindParam(':delivery',$delivery);
            $stmt->bindParam(':type',$type);
            $stmt->bindParam(':seller_id',$seller_id);
            $stmt->bindParam(':posted_date',$posted_date);
            $stmt->bindParam(':status',$status);
            $stmt->execute();
            //$stmt ="INSERT INTO `products`(`name`, `registration_number`, `description`, `price`, `photo`, `negotiable`, `makeyear`, `color`, `kmdriven`, `fuel`, `engineincc`, `productused`, `delivery`, `type`, `seller_id`, `posted_date`, `status`) VALUES ('$name', '$registration_number','$description', '$price', '$upfile', '$negotiable', '$makeyear', '$color', '$kmdriven', '$fuel', '$engineincc', '$productused', '$delivery', '$type', '$seller_id', '$posted_date', '$status')";
            // $stmt ="INSERT INTO products(name, registration_number, `description`, price , photo , negotiable, makeyear, color, kmdriven, fuel, engineincc, productused , delivery , type, seller_id, posted_date, status ,Place) VALUES ('$name', '$registration_number','$description', '$price', '$upfile', '$negotiable', '$makeyear', '$color', '$kmdriven', '$fuel', '$engineincc', '$productused', '$delivery', '$type', '$seller_id', '$posted_date', '$status', '$place') ";

            // $conn->exec($stmt);

           header('Location: http://localhost/flippwheels/seller/seller.php');





        }   
        catch(PDOException $e)
        {
            echo "Error inserting into database. $e";
        }
	$pdo->close();
    }
    else
    {	
    echo"All field are required";
	die();
}
?>




