<?php

$conn = mysqli_connect('localhost', 'root', '', 'website tmđt');
mysqli_set_charset($conn, "utf8");
session_start();

if (isset($_POST['submit_login'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $result = mysqli_query($conn, "SELECT * FROM khach_hang WHERE username = '$username' && password= '$password'");

  // $stmt = mysqli_prepare($conn, $select);
  // mysqli_stmt_bind_param($stmt, $username, $password);
  // mysqli_stmt_execute($stmt);
  // $result = mysqli_stmt_get_result($stmt);
  $count = mysqli_num_rows($result);
  if ($count == 1) {
    // Đăng nhập thành công
    // Lưu thông tin người dùng vào session
    while ($row = mysqli_fetch_assoc($result)) {
      $_SESSION["full_name"] = $row["full_name"];
      $_SESSION["username"] = $row["username"];
      $_SESSION["password"] = $row["password"];
      $_SESSION["phone"] = $row["phone"];
      $_SESSION["email"] = $row["email"];
      break;
    }
    $_SESSION["loged"] = true;
    header('location:index.php');
    setcookie("success", "Đăng nhập thành công!", time() + 1, "/", "", 0);
  } else {
    // Đăng nhập thất bại
    header('location:login.php');
    setcookie("error", "Đăng nhập không thành công!", time() + 1, "/", "", 0);
  }
  
}

// $result = mysqli_query($conn,$select);  if(mysqli_num_rows($result)>0){
//   $row = mysqli_fetch_array($result);
//   if($row['User']=='NghiaDuke121'){
//     $_SESSION['admin_name'] = $row['User'];
//     header('location:admin_page.php');
//   }elseif($row['User']!='NghiaDuke121'){
//     $_SESSION['user_name'] = $row['User'];
//     header('location:index.php');
//   }else{
//     $error[]='Incorrect user or passsword';
//   }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register Form Validator</title>
  <link rel="stylesheet" href="assets/Css/log-in.css">
</head>

<body>
  <div class="container">
    <h1>Nut house</h1>
    <form name="form_login" class="form_login" action="#" method="POST">

      <div class="form-control">
        <input type="username" name="username" id="username" placeholder="Username" />
        <span></span>
        <small></small>
      </div>
      <div class="form-control " id="show_hide_password">
        <input type="password" name="password" id="password" placeholder="Password" />
      <span></span>
      <small></small>
  </div>

  <input type="submit" name="submit_login" id="log-in" value="Log in" />
  <span class="or">OR</span>
  <div class="button">
    <input type="submit" id="google" value="Google">
    <input type="submit" id="facebook" value="Facebook">
  </div>
  <div class="signup_link">Not a member? <a href="register.php">Signup</a></div>

  </form>
  </div>
</body>

</html>