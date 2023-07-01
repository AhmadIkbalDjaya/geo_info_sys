<?php
include '../function.php';
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
}
$contacts = query("SELECT * FROM `contact`");

if (isset($_POST["hapus"])) {
  $id = $_POST["id"];
  $result = mysqli_query($conn, "DELETE FROM `contact` WHERE id='$id'");
  if ($result) {
    header("Location: contact.php");
    exit;
  }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Contact</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <!-- css -->
  <link rel="stylesheet" href="css/contact.css" />
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

  <!-- Contact -->
  <section id="header">
    <div class="container-fluid card shadow">
      <div class="row p-3">
        <div class="col-md-12">
          <h3>Contact</h3>
          <p>Informasi pesan contact</p>
        </div>
      </div>
    </div>
  </section>

  <section class="contact">
    <div class="container-fluid card shadow my-3">
      <div class="row">
        <div class="col-md-12 p-4">
          <div class="table-responsive">
            <table class="table table-bordered text-center">
              <thead>
                <tr>
                  <th class="col-0">No.</th>
                  <th class="col-4">Nama Pengirim</th>
                  <th class="col-4">Email</th>
                  <th class="col-4">Action</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($contacts as $key => $contact) : ?>
                  <tr>
                    <th scope="row"><?= $key + 1 ?></th>
                    <td><?= $contact["name"] ?></td>
                    <td><?= $contact["email"] ?></td>
                    <td>
                      <button class="badge bg-info border-0" data-bs-toggle="modal" data-bs-target="#showModal<?= $contact["id"] ?>">Informasi</button>
                      <button class="badge bg-danger border-0" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $contact["id"] ?>">Delete</button>
                    </td>
                    <td>
                      <!-- Show Modal Contact-->
                      <div class="modal fade text-start" id="showModal<?= $contact["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Informasi Contact</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
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
                                    <td>Nama Pengirim</td>
                                    <td>:</td>
                                    <td><?= $contact["name"] ?></td>
                                  </tr>
                                  <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td><?= $contact["email"] ?></td>
                                  </tr>
                                  <tr>
                                    <td>No Telpon</td>
                                    <td>:</td>
                                    <td><?= $contact["phone"] ?></td>
                                  </tr>
                                  <tr>
                                    <td>Pesan</td>
                                    <td>:</td>
                                    <td><?= $contact["message"] ?></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- Delete Modal -->
                      <div class="modal fade" id="deleteModal<?= $contact["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">Apakah anda ingin menghapus pesan <?= $contact["name"] ?>?</div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                              <form action="" method="post">
                                <input type="hidden" name="id" value="<?= $contact
                                ['id'] ?>">
                                <button type="submit" name="hapus" class="btn btn-danger">Ya</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
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