<?php
include_once('../template/session.php');

$conn = $pdo->open();
    if (isset($_POST['submit']))
    {
         try{

            $names=$_POST['name'];
            $emails=$_POST['email'];
            $messages=$_POST['message'];
           
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt ="INSERT INTO `contact_us`(`Name`, `Email_id`, `Message`) VALUES ('$names', '$emails','$messages')";
            $kumar = $conn->exec($stmt);
            if($kumar){
            echo "<script>alert('Your suggestion has been successfully delivered to flippwheels teams.Thank you, Have a wonderful day 😊');location.href='http://localhost/flippwheels';</script>";

            // header('Location: http://localhost/flippwheels');
            }
        }   
        catch(PDOException $e)
        {
            echo "Error inserting into database";
        }
	$pdo->close();
    }
    else
    {	
    echo"All field are required";
	die();
}
?>