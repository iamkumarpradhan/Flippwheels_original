<?php 
include_once('../template/header.php');
try{
    $conn = $pdo->open();
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM blogs WHERE ID = '$id'");
    $stmt->execute();
    $products = $stmt->fetchAll();
    $pdo->close();
}
catch(PDOException $e){
    echo $e->getMessage();
}
?>
<style type="text/css">
    .blogsdescription{
        width: 90%;
        left: 5%;
        transform: translate(5%);
        border: none;
        outline: none;
        margin: 40px 0 40px 0;
        box-shadow: 0px 0px 10px 10px #ddd;
        background-color: #fff; 
        border-radius: 5px 5px 5px 5px;  
        font-family: sans-serif; 
        padding:20px 20px 20px 20px; 
    }

</style>


<div class="blogsdescription"> 
    <?php foreach($products as $product): ?>
    <div class="bloggingdetails"> 
      <center>  <img src="<?php echo "http://localhost/flippwheels/uploads/".$product['Add_medias'] ;?>" alt="" width="350px" height="350px"> </center>
        
    <center><h2>Title of Blog:<?php echo $product['Title_of_blog'];?></h2> </center> 
    <center><h4>Published Date: <?php echo $product['Published_date'];?></h4> </center>
    </div>
<br>
    <div class="bloggingdescription">
        <left><h3><center>Features</center> </h3><br><h4><?=$product['Descriptions']?></h4></left>
    </div>
    <?php endforeach;?> 
</div>


<footer class="sticky-footer">
<div class="whatsapp_float">
  <a href="http://wa.me/9779816097031" target="_blank" rel="noopener noreferrer">
    <i class="fab fa-whatsapp"></i>
  </a>
</div>
        <ul>
            <li><a href="./aboutus.php"><i class="fa fa-users" aria-hidden="true"></i>About Us</a></li>
            <li><a href="./ourmission.php">⌖🎯⌖Our Mission</a></li>
            <li><a href="./privacypolicy.php">🔐Privacy Policy</a></li>
            <li><a href="./contactus_form.php">📞Contact Us</a></li>
            <li><a href="./faqs.php">❓FAQ'S</a></li>
        </ul>
        <br>
        <div class="socialicons">

   <a href="http://localhost/flippwheels/"><img src="../fb.gif" height="37" width="37"></a>  

   <a href="http://localhost/flippwheels/"><img src="../ig.gif" height="37" width="37">  </a>

   <a href="http://localhost/flippwheels/"><img src="../twitter.gif" height="37" width="37"> </a> 

   <a href="http://localhost/flippwheels/"><img src="../li.gif" height="37" width="37"></a>

   <a href="http://localhost/flippwheels/"><img src="../youtube.gif" height="37" width="37"></a>

   <a href="http://localhost/flippwheels/"><img src="../tiktok.gif" height="37" width="37">  </a>

</div>

        <p> © Copyright FLIPPWHEELS(2021-2022)</p>
        </footer>
    
</body>
</html>