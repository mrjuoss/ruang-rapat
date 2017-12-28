<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$data = 'ruang_rapat';

$koneksi = new mysqli($host, $user, $pass, $data);

if ($koneksi->connect_error) {
  die ('Koneksi Gagal : ' . $koneksi->connect_error);
}
?>
