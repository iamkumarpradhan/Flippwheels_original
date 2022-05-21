<?php
include_once('../template/session.php');
$user_id = $_SESSION['USER_ID'] ?? null;

$conn = $pdo->open();
    if (isset($_POST['Publish']))
    {
         try{

            // $bloggerid=$_SESSION[''];
            $title_blog=$_POST['Title_of_blog'];
            $description_blog=$_POST['Descriptions'];
            $Add_medias=$_FILES["Add_medias"]["name"];
            $tempname=$_FILES["Add_medias"]["tmp_name"];
            $folder=__DIR__.'/uploads/';
            // $media='';
            $publish_date= date('Y/m/d');

           
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt ="INSERT INTO `blogs`( `blogger_id`,`Title_of_blog`, `Descriptions`,`Add_medias`,`Published_date`) VALUES ('$user_id', '$title_blog','$description_blog','$Add_medias','$publish_date')";
            $kumar = $conn->exec($stmt);
            if($kumar){
            // echo "<script>alert('Hello blogger,Your's blogs has been successfully published.Thank  for your effort , Have a wonderful day sir/maa\'m 😊');location.href='http://localhost/flippwheels/blogger/blogger.php';</script>";
            echo "<script>alert('Hello blogger,Yours blogs has been successfully published.Thank  for your effort');location.href='http://localhost/flippwheels/blogger/blogger.php';</script>";

            }else{
                echo "Error inserting data";
                die();
            }
        }   
        catch(PDOException $e)
        {
            echo "Error inserting into database". $e->getMessage();
        }
    $pdo->close();
    }
    else
    {   
    echo"All field are required";
    die();
}
?>