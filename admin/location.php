<?php
include '../function.php';
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
}
$locations = query("SELECT * FROM `location`");

if (isset($_POST["hapus"])) {
  $id = $_POST["id"];
  $result = mysqli_query($conn, "DELETE FROM `location` WHERE id='$id'");
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
  <title>Lokasi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <!-- css -->
  <link rel="stylesheet" href="css/fitur.css" />
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

  <!-- Lokasi -->
  <section id="header">
    <div class="container-fluid card shadow">
      <div class="row p-3">
        <div class="col-md-12">
          <h3>Lokasi</h3>
          <p>menambah, mengedit, atau menghapus lokasi</p>
        </div>
        <div class="col-md-4">
          <a href="location-create.php"><button type="button" class="btn btn-primary">Tambah Lokasi</button></a>
        </div>
      </div>
    </div>
  </section>

  <!-- alerts -->
  <div id="liveAlertPlaceholder"></div>

  <!-- End Alerts -->

  <section class="lokasi">
    <div class="container-fluid card shadow my-3">
      <div class="row">
        <div class="col-md-12 p-4">
          <div class="table-responsive">
            <table class="table table-bordered text-center">
              <thead>
                <tr>
                  <th class="col-md-0">No</th>
                  <th class="col-md-4">Nama Lokasi</th>
                  <th class="col-md-4">Kecamatan</th>
                  <th class="col-md-4">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($locations as $key => $location) : ?>
                  <tr>
                    <th scope="row"><?= $key + 1 ?></th>
                    <td><?= $location['name'] ?></td>
                    <td><?= $location['kecamatan'] ?></td>
                    <td>
                      <a href="location-show.php?id=<?= $location['id'] ?>"><span class="badge text-bg-info">Informasi</span></a>
                      <a href="location-edit.php?id=<?= $location['id'] ?>"><span class="badge text-bg-warning">Edit Lokasi</span></a>
                      <a href="#"><span class="badge text-bg-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $location['id'] ?>">Delete</span></a>
                    </td>
                  </tr>
                  <!-- Deleete Modal -->
                  <div class="modal fade" id="deleteModal<?= $location['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">Apakah anda ingin menghapus <?= $location['name'] ?>?</div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                          <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $location['id'] ?>">
                            <button type="submit" name="hapus" class="btn btn-danger">Ya</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="js/alerts.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>