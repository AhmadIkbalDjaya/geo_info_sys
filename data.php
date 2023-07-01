<?php
include 'function.php';

$locations = query("SELECT * FROM `location`");
// var_dump($locations);
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

  <section id="data">
    <div class="container-fluid p-4">
      <div class="row card rounded-0 mt-3">
        <div class="card-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12 text-center">
                <h3>Data Titik Lokasi Rawan Kecelakaan 2021-2022</h3>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr class="text-center">
                  <th scope="col">No</th>
                  <th scope="col" class="col-3">Titik Rawan Kecelakaan</th>
                  <th scope="col">latitude</th>
                  <th scope="col">longitude</th>
                  <th scope="col">k.tunggal</th>
                  <th scope="col">k.lari</th>
                  <th scope="col">k.beruntun</th>
                  <th scope="col">Total laka</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($locations as $key => $location) : ?>
                  <tr>
                    <th scope="row" class="text-center"><?= $key+1 ?></th>
                    <td><?= $location['address'] ?></td>
                    <td><?= $location['latitude'] ?></td>
                    <td><?= $location['longitude'] ?></td>
                    <td><?= $location['k_tunggal'] ?></td>
                    <td><?= $location['k_lari'] ?></td>
                    <td><?= $location['k_beruntun'] ?></td>
                    <td><?= $location['total_laka'] ?></td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="js/maps.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>