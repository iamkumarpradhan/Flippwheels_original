<?php 
  include_once('./template/header.php' );
  include_once('./template/session.php');
$conn=mysqli_connect('localhost','root','','flippwheels');
// $email = "";
// $name = "";

$errors = array();

//if user click submit button
// if(isset($_POST['submit'])){
    // if(isset($_SESSION['id'])){
        // $id = $row['id'];
        // $sql = "SELECT email, password FROM users WHERE id = $id";
        // $run_query = mysqli_query($conn,$sql);
        // $row = mysqli_fetch_array($run_query);
        // $email = $row['email'];
        // $password = $row['password'];

        // $type = mysqli_real_escape_string($conn, $_POST['username']);
        // $place = mysqli_real_escape_string($conn, $_POST['password']);
        // $number = mysqli_real_escape_string($conn, $_POST['reme']);
        // $arrive = mysqli_real_escape_string($conn, $_POST['arrival']);
        // $leave = mysqli_real_escape_string($conn, $_POST['leaving']);
        // $cost = mysqli_real_escape_string($conn, $_POST['qty']);
        // $tot = mysqli_real_escape_string($conn, $_POST['total']);
        // $vcost = mysqli_real_escape_string($conn, $_POST['vehicle']);
    
        // if(count($errors) === 0){
        //     $code = rand(999999, 111111);
        //     $status = "Not verified";
        //     // $p_status = "incomplete";
        //     $data = "UPDATE `users` SET `code`='$code',`status`='$status' WHERE id = '$id'";

        //    $data_check = mysqli_query($conn,$data);
        //     if($data_check){

        //         $headers  = 'MIME-Version: 1.0' . "\r\n";
        //         $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";    
        //         $headers .= "From:sanishaphuyal1@gmail.com";
        //         $subject = "Booking Verification Code";
        //         $message = "Your verification code is $code. <br> Click <a href='localhost/tms/user-otp.php?code=$code'>here</a> to visit the site";
        //         if(mail($email, $subject, $message, $headers)){
        //             $info = "We've sent a verification code to your email - $email";
        //             $_SESSION['info'] = $info;
        //             $_SESSION['email'] = $email;
        //             $_SESSION['password'] = $password;
        //             header("location: user-otp.php");
        //             exit();
        //         }
        //         else{
        //             echo "Failed while sending code!";
        //         }
        //     }else{
        //         echo "Failed while inserting data into database!";
        //     }
        // }
    // }
    // else{
    //     echo "<script>alert('Operation Unsuccessful..!')</script>";
    //     echo "<script> location.href='login.php'; </script>";
    //     exit();
    // }
// }

//if user signup button
if(isset($_POST['register'])){
    $name = mysqli_real_escape_string($conn, $_POST['Username']);
    $email = mysqli_real_escape_string($conn, $_POST['Email']);
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['confirm_password']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $fullname = mysqli_real_escape_string($conn, $_POST['FullName']);
    $type = mysqli_real_escape_string($conn, $_POST['idtype']);
    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }
    $email_check = "SELECT * FROM users WHERE email = '$email'";
    $res = mysqli_query($conn, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email that you have entered is already exist!";
    }
    if(count($errors) === 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "notverified";
        $insert_data = "INSERT INTO `users`(`fullname`, `username`, `email`, `phone`, `password`, `address`, `type`,`code`,`status`) VALUES ('$fullname','$name','$email','$phone','$password','$address','$type','$code','$status')";
        $data_check = mysqli_query($conn, $insert_data);

        // die($data_check);

        if($data_check){

            $subject = "Email Verification Code";
            $message = "Your verification code is $code";
            $sender = "From:flippwheelsteams@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "Hello,We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: user-otp.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }

}

//if user click verification code submit button
if(isset($_POST['check'])){
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
    $check_code = "SELECT * FROM users WHERE code = $otp_code";
    $code_res = mysqli_query($conn, $check_code);
    if(mysqli_num_rows($code_res) > 0){
        $fetch_data = mysqli_fetch_assoc($code_res);
        $fetch_code = $fetch_data['code'];
        $email = $fetch_data['email'];
        $code = 0;
        $status = 'verified';
        $update_otp = "UPDATE users SET code = $code, status = '$status' WHERE code = $fetch_code";
        $update_res = mysqli_query($conn, $update_otp);
        if($update_res){
            $_SESSION['username'] = $name;
            $_SESSION['email'] = $email;
            header("location: index.php");
            exit();
        }else{
            echo "Failed while updating code!";
        }
    }else{
        echo "You've entered incorrect code!";
    }
}
?>

<style>
.container {
  font-family: sans-serif;
  font-size: 20px;
  margin-top: 20px;
    width: 40%;
    /* height:100vh; */
    background-color: #fff;
    padding: 25px 30px;
    margin-bottom:25px;
    border-radius: 10px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
    left:65%;
    transform:translate(65%);
}
.container .input-box{
    margin:1rem;
    display:block;
}
.container input[type="text"],
.container input[type="number"],
.container input[type="date"],
.container input[type="password"]{
    padding:0.5rem;
    width:100%;
    background:#ddd;
    border:none;
}
.user-details span{
  margin-bottom:5px;
}
.container input[type="submit"]{
  padding:10px;
  width:150px;
  background:green;
  border:none;
  color:#fff;
  border-radius:5px 5px 5px 5px;
}
.container input[type="submit"]:hover{
  background:gray;
  color:#fff;
  cursor:pointer;
}

.container input[type="radio"]{
  padding:15px;
  width:50px;
  background:green;
  border:none;
  color:#fff;
  border-radius:5px 5px 5px 5px;
}


</style>
  <div class="container">
    <div class="title"><b><center>Registration Form</center></b></div>
    <div class="content">
      <form action="" method="POST">
        <div class="user-details">
          <table style="width:100%;">
            <tr>
              <td style="width:50%;">
                <div class="input-box">
                  <span class="details">Full Name</span><br>
                  <input type="text" id="FullName" name="FullName" placeholder="Enter your name" required>
                </div>
              </td>
              <td style="width:50%;">
                <div class="input-box">
                  <span class="details">Username</span><br>
                  <input type="text" id="Username" name="Username" placeholder="Enter your username" required>
                </div>
              </td>
            </tr>
            <tr>
              <td style="width:50%;">
                <div class="input-box">
                  <span class="details">Email</span><br>
                  <input type="text" id="Email" name="Email" placeholder="Enter your email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                </div>
              </td>
              <td style="width:50%;">
                <div class="input-box">
                  <span class="details">Confirm Email</span><br>
                  <input type="text" id="confim-email" name="confirm-email" placeholder="Re-enter your email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                </div>
              </td>
            </tr>
            <tr>
              <td style="width:50%;">
                <div class="input-box">
                  <span class="details">Phone Number</span><br>
                  <input type="number" id="phone" name="phone" placeholder="98XXXXXXXX" pattern="[0-9]{10}" required>
                </div>
              </td>
              <td style="width:50%;">
                <div class="input-box">
                  <span class="details">Password</span><br>
                  <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
              </td>
            </tr>
            <tr>
              <td style="width:50%;">
                <div class="input-box">
                  <span class="details">Confirm Password</span><br>
                  <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirm your password" required>
                </div>
              </td>
              <td style="width:50%;">
                <div class="input-box">
                  <span class="details">Address</span><br>
                  <input type="text" id="address" name="address" placeholder="Enter your address" required>
                </div>    
              </td>
            </tr>
          </table>
        </div>

        <div class="id-type">
          <input type="radio" value="SELLER" name="idtype" id="dot-1">
          <input type="radio" value="BUYER" name="idtype" id="dot-2">
          <input type="radio" value="BLOGGER" name="idtype" id="dot-3">
          <span class="id-type">ID type</span>

          <div class="category">
            <label for="dot-1">
              <span class="dot one"></span>
              <span class="idtype">Seller</span>
            </label>
            <label for="dot-2">
              <span class="dot two"></span>
              <span class="idtype">Buyer</span>
            </label>
            <label for="dot-3">
              <span class="dot three"></span>
              <span class="idtype">Blogger</span>
            </label>
          </div>
        </div>


        <div class="terms">
          <input type="checkbox" id="terms" name="terms" class="terms-icon" required>
          <span>I agree to the terms and conditions of Flippwheels</span>
        </div>

        <div class="button">
          <input type="submit" name="register" value="Register">
        </div>
        <div class="sign_up">
          Already a member? <a href="login.php">Login</a>
        </div>
        <div class="sign_up">
          <a href="contactus.php">Contact Us</a>

      </form>
    </div>
  </div>
</div>
  <?php include_once('./template/footer.php'); ?> 