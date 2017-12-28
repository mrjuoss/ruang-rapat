<?php

/*
 * file untuk mengambil data dari database
 * dan mengubahnya ke format json
 * untuk ditampilkan di kalendar.
 */

require 'koneksi.php';
/*
$query = "SELECT * from jadwalku ";
$result = mysqli_query($link, $query) or die(mysqli_error());

$arr = array();
while ($row = mysqli_fetch_assoc($result)) {
    $temp = array(
        "date" => $row["date"],
        "title" => $row["title"],
        "description" => $row["description"]);

    array_push($arr, $temp);}
$data = json_encode($arr);
echo $data
*/

$query = "SELECT
          A.tgl_mulai AS tgl_mulai,
          A.tgl_selesai AS tgl_selesai,
          A.judul_rapat AS judul_rapat,
          A.deskripsi_rapat AS deskripsi_rapat,
          B.nama_ruang AS nama_ruang
          FROM jadwal_rapat A
          INNER JOIN ruangan B
          ON A.id_ruang = B.id";

$result = mysqli_query($link, $query) or die(mysqli_error());

$arr = array();
while ($row = mysqli_fetch_assoc($result)) {
  $temp = array(
    //"id" => $row["id"],
    //"id_ruang" => $row["id_ruang"],
    //"id_pengguna" => $row["id_pengguna"],
    //"tgl_usul" => $row["tgl_usul"],
    "date" => $row["tgl_mulai"],
    //"tgl_selesai" => $row["tgl_selesai"],
    "title" => $row["judul_rapat"]." - ".$row["nama_ruang"],
    "description" => $row["deskripsi_rapat"]."<br> Jam ".
    substr($row["tgl_mulai"],11,5)." WIB s/d ".substr($row["tgl_selesai"],11,5)." WIB");
    //"peserta_rapat" => $row["peserta_rapat"],
    //"kontak_person" => $row["kontak_person"],
    //"file_permohonan" => $row["file_permohonan"],
    //"status" => $row["status"]);

    array_push($arr, $temp);
}

$data = json_encode($arr);
echo $data

?>
