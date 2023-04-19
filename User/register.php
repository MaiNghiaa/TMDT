<?php 
@include 'connect.php';

if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $User = $_POST['User'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $User = $_POST['User'];
    $phone = $_POST['phone'];
    $birthdate= $_POST['birthdate'];
    $select = "SELECT * FROM khach_hang WHERE username ='$User' && phone='$phone'";  
    $result = mysqli_query($conn,$select);
    if(mysqli_num_rows($result)>0){
        $error[]='User already exists';
    }else{
        $insert = "INSERT INTO khach_hang (full_name, username, password, phone, email, birthday,status,Address) VALUES ('$fname','$User','$password',$phone, '$email','$birthdate',0,'Null')";  
        mysqli_query($conn,$insert);
        header('location:login.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/Css/register.css">
    <title>Document</title>
</head>
<body> 
    <!--  -->
    <div class="container">
        <form action="" method="post" class="input">
            <h1 class="title">Create account</h1>
            <div class="row">
                <div class="input-box">
                    <label for="fname">Full name</label>
                    <input type="text" name="fname" id="fname">
                </div>
                <div class="input-box">
                    <label for="User">Username</label>
                    <input type="text" name="User" id="User">
                </div>
            </div>

            <div class="row">
                <div class="input-box">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone">
                </div>
                <div class="input-box">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email">
                </div>
            </div>
 
            <div class="row">
                <div class="input-box">
                    <label for="birthdate">Birth date</label>
                    <input type="text" name="birthdate" id="birthdate">
                </div>
                <div class="input-box">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>
            </div>

            <div class="row">
                <div class="checkbox">
                    <input type="checkbox" name="commit" checked="checked" id="dot">
                    <div class="category">
                        <label for="dot">
                            <span class="box"></span>
                            <span>I have read and accepted the <u>General Terms</u> and <u>Conditions</u> of this website.</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="button">
                <input type="submit" id="sign-up" name="submit" value="Sign up">
                <span style="font-size: 0.96rem;">OR</span>
                <input type="submit_facebook" id="google" value="Google">
                <input type="submit_google" id="facebook" value="Facebook">
            </div>
            <div class="log-in">
                <span>Have an account yet?<a href="./assets/login.php"><u>log in</u> </a></span>
            </div>
        </form>
    </div>
    <!-- <script src="./js/log-in.js"></script> -->


</body>
</html>