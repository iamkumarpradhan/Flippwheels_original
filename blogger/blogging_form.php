<?php
include_once('../template/header.php'); 
// $user_id = $_SESSION['USER_ID'] ?? null;
// $user_type = $_SESSION['USER_TYPE'] ?? null;
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <title>Flippwheels</title>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/Et" aria-hidden="true"></i>Sell</button></a></li>  -->
<style>
.blog_form {
  font-size: 17px;
    width: 50%;
    height:70vh; 
    background-color: #fff;
    padding: 25px 25px;
    margin-bottom:25px;
    border-radius: 10px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
    left:50%;
    transform:translate(50%);
}
.blog_form .input-box{
    margin:1rem;
    display:block;
}
.blog_form input[type="text"],
textarea
{

  padding:0.5rem;
    margin:0.5rem;
    width:95%;
    background:#ddd;
    border:none;
}
/*.container input[type="text"],
.container input[type="number"],
.container input[type="date"],
.container input[type="password"]{
    padding:0.5rem;
    margin:0.5rem;
    width:95%;
    background:#ddd;
    border:none;
}*/
/*label,
p{
  margin-left:0.5rem;
}*/
.blog_form input[type="submit"]{
  padding:10px;
  margin-top:10px;
  width:150px;
  background:blue;
  border:none;
  color:#fff;
  border-radius:5px 5px 5px 5px;
}
.blog_form input[type="submit"]:hover{
  background:blue;
  color:#fff;
  cursor:pointer;
}
</style>
<br>
<!-- <div class="container"> -->
    <!-- <center><h3>Hi👋, you can Write your Blogs📄 right here!</h3></Center> -->
    <div class="blog_form">
      <form action="blogging_form_submission.php" method="POST" enctype="multipart/form-data">
            <label>Title of Blog</label><br><br>
            <input type="text" name="Title_of_blog" placeholder="Your's title of blog here!"required><br><br>
            <label>Descriptions</label><br>
            <textarea name="Descriptions" placeholder="Your's blogs reviews details here!"  rows="10"  ></textarea>
           <!--  <input type="text" class="txt" name="Descriptions" placeholder="Your's blogs reviews details here!" required><br> -->
            
<br>
            <label>Add Media </label>
            <input type="file" class="txt" name="Add_medias" placeholder="Any images or Videos"required>

        
<br><br>

            <input type="submit" name="Publish" class="btn-btn-success" value="Publish">
        </form>
    </div>
        
<!-- </div> -->
<!-- <?php
include_once('../template/footer.php'); 
?>  -->





<link rel="stylesheet" href="<?php echo 'http://localhost/flippwheels/css/style.css'?>">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
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
