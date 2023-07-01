<?php
  include 'function.php';

  if (isset($_POST['addContact'])) {
    $id = sprintf("%006d", rand(0, 99999));
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    $query ="INSERT INTO `contact` VALUES (
            '$id',
            '$name',
            '$email',
            '$phone',
            '$message'
            )";
    $result = mysqli_query($conn, $query);
    if ($result) {
      header("Location: index.php");
      exit;
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Maps</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

  <!-- css -->
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <?php include 'navbar.php' ?>

  <section id="contact" style="height: 100vh">
    <div class="container-fluid h-100">
      <form action="" method="post" class="h-100">
        <div class="row justify-content-center h-100 align-content-center">
          <div class="col-md-12 text-center">
            <h1>Contact</h1>
          </div>
          <div class="col-md-4">
              <div class="mb-3">
                <label for="nameInput" class="form-label">Masukkan Nama</label>
                <input type="text" name="name" class="form-control" id="nameInput" required />
              </div>
              <div class="mb-3">
                <label for="emailInput" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="emailInput" required />
              </div>
              <div class="mb-3">
                <label for="phoneInput" class="form-label">No. Telpon</label>
                <input type="number" min="0" name="phone" class="form-control" id="phoneInput" required />
              </div>
              <div class="mb-3">
                <label for="messageInput" class="form-label">Pesan</label>
                <textarea name="message" class="form-control" id="messageInput" rows="5" required></textarea>
              </div>
          </div>
          <div class="col-md-12 text-center">
            <button type="submit" name="addContact" class="btn btn-primary">Kirim</button>
          </div>
        </div>
      </form>
    </div>
  </section>

  <script src="js/maps.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>