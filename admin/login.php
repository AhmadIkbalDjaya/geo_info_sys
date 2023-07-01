<?php
include '../function.php';

session_start();
if (isset($_SESSION['login'])) {
  header("Location: index.php");
}

if (isset($_POST["login"])) {

  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

  if (mysqli_num_rows($result) === 1) {

    $row = mysqli_fetch_assoc($result);
    if ($password == $row["password"]) {
      $_SESSION["login"] = true;
      header("Location: index.php");
      exit;
    }
  }
  $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />

  <!-- CSS -->
  <link rel="stylesheet" href="css/login.css" />
</head>

<body>
  <section id="login">
    <div class="container-fluid h-100">
      <div class="row justify-content-center pb-5">
        <div class="col-12 text-center text-white mt-5">
          <h1>Sistem Informasi Geografis</h1>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-11 col-md-4">
          <div class="login-box">
            <p>Login</p>
            <?php if (isset($error)) : ?>
              <p style="color: red; font-style: italic;" class="text-center">Username / Password Salah!</p>
            <?php endif ?>
            <form action="" method="post">
              <div class="user-box">
                <input required="" name="username" type="text" />
                <label>Username</label>
              </div>
              <div class="user-box">
                <input required="" name="password" type="password" />
                <label>Password</label>
              </div>
              <button type="submit" name="login">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Submit
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>