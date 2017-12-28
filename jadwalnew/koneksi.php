<?php

/*
 * file untuk koneksi ke database.
 * sesuaikan nama username, password dan database.
 * sessui dengan setting database anda.
 */

$host = "localhost";
$user = "root";
$password = "";
$database = "ruang_rapat";

$link = mysqli_connect($host, $user, $password, $database);
