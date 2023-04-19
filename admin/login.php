
  <?php
  $conn = mysqli_connect('localhost', 'root', '', 'website tmđt');
  mysqli_set_charset($conn, "utf8");
  session_start();
  if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = ($_POST['password']);
    $result = mysqli_query($conn,"SELECT * FROM admin WHERE username = '$username' && password= '$password'");

    // $stmt = mysqli_prepare($conn, $select);
    // mysqli_stmt_bind_param($stmt, $username, $password);
    // mysqli_stmt_execute($stmt);
    // $result = mysqli_stmt_get_result($stmt);
    $count = mysqli_num_rows($result);
    if ($count ==1) {
      // Đăng nhập thành công
      // Lưu thông tin người dùng vào session
      while ($row = mysqli_fetch_assoc($result)) {
        $_SESSION["username"] = $row["username"];
        $_SESSION["password"] = $row["password"];
      }
      $_SESSION["loged"] = true;
      header('location:index.php');
          setcookie("success", "Đăng nhập thành công!", time()+1, "/","", 0);
    }else {
      // Đăng n+ơhập thất bại
      header("location:login.php");
          setcookie("error", "Đăng nhập không thành công!", time()+1, "/","", 0);
        }
  }
  ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Adminstrator</title>
    <link rel="stylesheet" href="./assets/css/log-in.css"/>
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
        <div class="form-control">
          <input type="password" name="password" id="password" placeholder="Password" />
          <span></span>
          <small></small>
        </div>

        <input type="submit" name="submit" id="submit" value="Log in" />
      </form>
    </div>
  </body>

  </html>