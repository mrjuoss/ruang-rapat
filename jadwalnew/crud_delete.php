<?php

include 'koneksi.php';

$id = $_GET['id'];
$query = "DELETE FROM jadwalku WHERE jadwal_id = '$id'";
$add = mysqli_query($link, $query);

header("location:crud_tabel.php");

?>