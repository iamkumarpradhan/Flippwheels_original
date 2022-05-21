<?php 
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
        echo$data_check;

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
            header("location: http://localhost/flippwheels/");
            exit();
        }else{
            echo "Failed while updating code!";
        }
    }else{
        echo "You've entered incorrect code!";
    }
}
?>