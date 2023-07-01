<?php
include "../function.php";
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
}
if (isset($_POST['tambah'])) {
  $id = sprintf("%006d", rand(0, 999999));
  $name = htmlspecialchars($_POST["name"]);
  $address = htmlspecialchars($_POST["address"]);
  $latitude = htmlspecialchars($_POST["latitude"]);
  $latitude = str_replace(',', '.', $latitude);
  $longitude = htmlspecialchars($_POST["longitude"]);
  $longitude = str_replace(',', '.', $longitude);
  $k_tunggal = htmlspecialchars($_POST["k_tunggal"]);
  $k_lari = htmlspecialchars($_POST["k_lari"]);
  $k_beruntun = htmlspecialchars($_POST["k_beruntun"]);
  $total_laka = htmlspecialchars($_POST["total_laka"]);
  $negara = htmlspecialchars($_POST["negara"]);
  $provinsi = htmlspecialchars($_POST["provinsi"]);
  $kabupaten = htmlspecialchars($_POST["kabupaten"]);
  $kecamatan = htmlspecialchars($_POST["kecamatan"]);
  $description = htmlspecialchars($_POST["description"]);

  $query = "INSERT INTO `location` VALUES (
            '$id',
            '$name',
            '$address',
            '$latitude',
            '$longitude',
            '$k_tunggal',
            '$k_lari',
            '$k_beruntun',
            '$total_laka',
            '$negara',
            '$provinsi',
            '$kabupaten',
            '$kecamatan',
            '$description'
            )";

  $result = mysqli_query($conn, $query);

  if ($result) {
    header("Location: location.php");
    exit;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>AddLokasi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <!-- css -->
  <link rel="stylesheet" href="css/add.css" />
  <!-- icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css" />
</head>

<body>
  <!-- Navbar -->
  <?php include 'navbarAdmin.php' ?>

  <!-- spasi -->
  <section style="height: 70px">
    <div class="container">
      <div class="row">
        <div class="col-12"></div>
      </div>
    </div>
  </section>

  <section id="header-tambahProduk">
    <div class="container-fluid card shadow-lg">
      <div class="row mt-3">
        <div class="col-2">
          <a href="location.php">
            <button type="button" class="btn btn-primary">
              <i class="bi bi-arrow-left-circle"></i>
            </button>
          </a>
        </div>
        <div class="col-12 text-center">
          <h3>Tambah Lokasi</h3>
          <p>Tambahkan Lokasi Pada Colom Dibawah</p>
        </div>
      </div>
    </div>
  </section>

  <section id="addLokasi">
    <div class="container-fluid">
      <div class="row mt-4 justify-content-center">
        <div class="col-md-6 mb-3">
          <div class="card">
            <div class="login-box">
              <form action="" method="post">
                <h4 class="mb-4 text-center">Geografis</h4>
                <div class="user-box">
                  <input type="text" name="name" required="" />
                  <label class="text-black">Nama Lokasi</label>
                </div>
                <div class="user-box">
                  <input type="text" name="kecamatan" required="" />
                  <label class="text-black">Kecamatan</label>
                </div>
                <div class="user-box">
                  <input type="text" name="kabupaten" required="" />
                  <label class="text-black">Kabupaten</label>
                </div>
                <div class="user-box">
                  <input type="text" name="provinsi" required="" />
                  <label class="text-black">Provinsi</label>
                </div>
                <div class="user-box">
                  <input type="text" name="negara" required="" />
                  <label class="text-black">Negara</label>
                </div>
                <div class="user-box">
                  <input type="text" name="latitude" required="" />
                  <label class="text-black">Latitude</label>
                </div>
                <div class="user-box">
                  <input type="text" name="longitude" required="" />
                  <label class="text-black">Longitude</label>
                </div>
                <div class="user-box">
                  <input type="number" name="k_tunggal" required="" />
                  <label class="text-black">Kecelakaan Tunggal</label>
                </div>
                <div class="user-box">
                  <input type="number" name="k_lari" required="" />
                  <label class="text-black">Kecelakaan Melarikan Diri</label>
                </div>
                <div class="user-box">
                  <input type="number" name="k_beruntun" required="" />
                  <label class="text-black">Kecelakaan Beruntun</label>
                </div>
                <div class="user-box">
                  <input type="number" name="total_laka" required="" />
                  <label class="text-black">Total Kecelakaan</label>
                </div>
                <div class="my-4">
                  <label for="exampleFormControlTextarea1" class="form-label">Alamat Lengkap</label>
                  <textarea name="address" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="my-4">
                  <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                  <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="row text-center my-4">
                  <div class="col-md-12">
                    <div class="login-box">
                      <button type="submit" name="tambah" class="card">
                        Tambah
                        <span></span>
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="js/+produk.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>