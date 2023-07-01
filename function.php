<?php
  $host = "localhost";
  $user = "root";
  $pass = "";
  $db = "geo_info_sys";

  try {
    $dbh = new PDO("mysql:host=$host;dbname:$db", $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn = mysqli_connect("$host", "$user", "$pass", "$db");
  } catch (PDOException $e) {
    die ("Koneksi Gagal: " . $e->getMessage());
  }

  function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
    }
    return $rows;
  }