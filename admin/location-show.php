<?php
include '../function.php';
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
}
$id = $_GET['id'];
$location = query("SELECT * FROM `location` WHERE id=$id")[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>infoLokasi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <!-- css -->
  <link rel="stylesheet" href="css/info.css" />
  <!-- icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css" />
</head>

<body>
  <!-- Navbar -->
  <?php include 'navbarAdmin.php' ?>

  <!-- spasi -->
  <section style="height: 70px;">
    <div class="container">
      <div class="row">
        <div class="col-12"></div>
      </div>
    </div>
  </section>

  <section id="header-informasi">
    <div class="container">
      <div class="row shadow p-5 justify-content-center">
        <div class="col-md-12 text-center">
          <h3>Informasi Lokasi</h3>
        </div>
      </div>
    </div>
  </section>

  <section id="informasi">
    <div class="container">
      <div class="row card shadow p-4 mt-3">
        <div class="col-md-12">
          <h4 class="card-header">Informasi</h4>
          <div class="card-body">
            <div class="col-2 col-md-12">
              <table class="table table-borderless table-responsive">
                <thead>
                  <tr>
                    <th scope="col" class="col-2"></th>
                    <th scope="col" class="col-1"></th>
                    <th scope="col" class="col-9"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Nama Lokasi</td>
                    <td>:</td>
                    <td><?= $location['name'] ?></td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?= $location['address'] ?></td>
                  </tr>
                  <tr>
                    <td>Kecamatan</td>
                    <td>:</td>
                    <td><?= $location['kecamatan'] ?></td>
                  </tr>
                  <tr>
                    <td>Kabupaten</td>
                    <td>:</td>
                    <td><?= $location['kabupaten'] ?></td>
                  </tr>
                  <tr>
                    <td>Provinsi</td>
                    <td>:</td>
                    <td><?= $location['provinsi'] ?></td>
                  </tr>
                  <tr>
                    <td>Negara</td>
                    <td>:</td>
                    <td><?= $location['negara'] ?></td>
                  </tr>
                  <tr>
                    <td>Latitude</td>
                    <td>:</td>
                    <td><?= $location['latitude'] ?></td>
                  </tr>
                  <tr>
                    <td>Longitude</td>
                    <td>:</td>
                    <td><?= $location['longitude'] ?></td>
                  </tr>
                  <tr>
                    <td>Kecelakaan Tunggal</td>
                    <td>:</td>
                    <td><?= $location['k_tunggal'] ?></td>
                  </tr>
                  <tr>
                    <td>Kecelakaan Melarikan Diri</td>
                    <td>:</td>
                    <td><?= $location['k_lari'] ?></td>
                  </tr>
                  <tr>
                    <td>Kecelakaan Beruntun</td>
                    <td>:</td>
                    <td><?= $location['k_beruntun'] ?></td>
                  </tr>
                  <tr>
                    <td>Total Kecelakaan</td>
                    <td>:</td>
                    <td><?= $location['total_laka'] ?></td>
                  </tr>
                  <tr>
                    <td>Titik Rawan Kecelakaan</td>
                    <td>:</td>
                    <td><?= $location['address'] ?></td>
                  </tr>
                  <tr>
                    <td>Berita</td>
                    <td>:</td>
                    <td>
                      <?= $location['description'] ?>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div>
            <a href="location.php">
              <button type="button" class="btn btn-primary" style="--bs-btn-padding-y: 0.25rem; --bs-btn-padding-x: 0.5rem; --bs-btn-font-size: 0.75rem">
                Back
              </button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>