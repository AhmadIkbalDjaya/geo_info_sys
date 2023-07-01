<?php
include 'function.php';
$locations = query("SELECT * FROM `location`");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Maps</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

  <!-- css -->
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <?php include 'navbar.php' ?>

  <section id="home">
    <div class="container-fluid">
      <div class="row card rounded-0 mt-3">
        <div class="card-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12 text-center py-3">
                <h1>Sistem Informasi Geografis</h1>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <div class="card-header text-center">
                  <h5>Lokasi</h5>
                </div>
                <div class="card-body">
                  <div id="map"></div>
                  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card-header text-center">
                  <h5>Detail</h5>
                </div>
                <div class="card-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Item</th>
                        <th scope="col"></th>
                        <th scope="col" class="col-7">Detail</th>
                      </tr>
                    </thead>
                    <tbody class="table-group-divider">
                      <tr>
                        <td>Nama Lokasi</td>
                        <td>:</td>
                        <td class="name"><?= $locations[0]['name'] ?></td>
                      </tr>
                      <tr>
                        <td>Kecamatan</td>
                        <td>:</td>
                        <td class="kecamatan"><?= $locations[0]['kecamatan'] ?></td>
                      </tr>
                      <tr>
                        <td>Kabupaten</td>
                        <td>:</td>
                        <td class="kabupaten"><?= $locations[0]['kabupaten'] ?></td>
                      </tr>
                      <tr>
                        <td>Provinsi</td>
                        <td>:</td>
                        <td class="provinsi"><?= $locations[0]['provinsi'] ?></td>
                      </tr>
                      <tr>
                        <td>Negara</td>
                        <td>:</td>
                        <td class="negara"><?= $locations[0]['negara'] ?></td>
                      </tr>
                      <tr>
                        <td>Latitude</td>
                        <td>:</td>
                        <td class="latitude"><?= $locations[0]['latitude'] ?></td>
                      </tr>
                      <tr>
                        <td>Longitude</td>
                        <td>:</td>
                        <td class="longitude"><?= $locations[0]['longitude'] ?></td>
                      </tr>
                      <tr>
                        <td>Kecelakaan Tunggal</td>
                        <td>:</td>
                        <td class="k_tunggal"><?= $locations[0]['k_tunggal'] ?></td>
                      </tr>
                      <tr>
                        <td>Kecelakaan Melarikan Diri</td>
                        <td>:</td>
                        <td class="k_lari"><?= $locations[0]['k_lari'] ?></td>
                      </tr>
                      <tr>
                        <td>Kecelakaan Beruntun</td>
                        <td>:</td>
                        <td class="k_beruntun"><?= $locations[0]['k_beruntun'] ?></td>
                      </tr>
                      <tr>
                        <td>Total Kecelakaan</td>
                        <td>:</td>
                        <td class="total_laka"><?= $locations[0]['total_laka'] ?></td>
                      </tr>
                      <tr>
                        <td>Berita</td>
                        <td>:</td>
                        <td class="description">
                          <?= $locations[0]['description'] ?>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- <script src="js/maps.js"></script> -->
  <script>
    // Inisialisasi peta
    var map = L.map("map").setView([-6.200000, 106.800000], 13); // Menggunakan koordinat Kabupaten Brebes dan level zoom 13

    // Tambahkan peta dasar menggunakan Leaflet Provider Tiles
    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
      attribution: "© OpenStreetMap contributors",
    }).addTo(map);

    // Data titik lokasi rawan kecelakaan
    var rawanKecelakaan = <?php echo json_encode($locations); ?>

    // Tambahkan marker untuk setiap titik lokasi rawan kecelakaan
    rawanKecelakaan.forEach(function(data) {
      var marker = L.marker([data.latitude, data.longitude]).addTo(map);
      var popupContent = `
    <strong>Titik Rawan Kecelakaan</strong><br>
    Nama Lokasi: ${data.name}<br>

  `;
      marker.bindPopup(popupContent).on("click", function() {
        // showDetailInfo(data);
        $(".name").text(data.name)
        $(".kacamatan").text(data.kacamatan)
        $(".kabupaten").text(data.kabupaten)
        $(".provinsi").text(data.provinsi)
        $(".negara").text(data.negara)
        $(".latitude").text(data.latitude)
        $(".longitude").text(data.longitude)
        $(".k_tunggal").text(data.k_tunggal)
        $(".k_lari").text(data.k_lari)
        $(".k_beruntun").text(data.k_beruntun)
        $(".total_laka").text(data.total_laka)
        $(".description").text(data.description)
      });
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>