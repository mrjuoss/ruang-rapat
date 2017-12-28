<?php
 require '../library/config.php';

 $query_users = "SELECT * FROM users";

 $result_users = mysqli_query($koneksi, $query_users);

 if ($result_users->num_rows > 0) {
   while ($data_user = $result_users->fetch_object()) {
     echo $data_user->username."<br>";
   }
 } else {
   echo "Tidak ada user";
 }
?>
