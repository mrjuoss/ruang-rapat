<?php
  require __DIR__.'/library/config.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Sistem Informasi Ruang Rapat {{ SIRR }}</title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.3.3.7.min.css">
        <link rel="stylesheet" href="assets/css/eventCalendar.css">
        <link rel="stylesheet" href="assets/css/eventCalendar_theme_responsive.css">

        <!-- css dibawah ini hanya untuk demo-->
        <style>
            body {
                padding-top: 70px;
            }
            footer {
                padding: 30px 0;
            }

            tr, td {
              padding: 5px;
            }
        </style>

    </head>

    <body>
        <nav class="navbar navbar-fixed-top navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Biro Kepegawaian</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="crud_tabel.php">Agenda</a></li>
                    </ul>
                </div><!-- /.nav-collapse -->
            </div><!-- /.container -->
        </nav><!-- /.navbar -->

            <div class="container">

                <div class="row row-offcanvas row-offcanvas-right">

                <div class="col-xs-12 col-sm-8">
                    <p class="pull-right visible-xs">
                        <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
                    </p>
                    <div class="jumbotron">
                        <h2>Jadwal Penggunaan Ruang Rapat</h2>
                        <p>Untuk menambah, mengubah atau menghapus agenda, klik menu agenda di atas.</p>
                    </div>

                    <?php

                    $query_ruangan  = "SELECT * FROM ruangan";
                    $result_ruangan = mysqli_query($koneksi, $query_ruangan) or die (mysqli_error());

                    if ($result_ruangan->num_rows > 0) {
                      while ($data = $result_ruangan->fetch_object()) {
                        ?>
                        <div class="row">
                            <div class="col-xs-12 col-lg-12">
                                <h4><?php echo $data->nama_ruang." ".$data->lokasi." kapasitas ".$data->kapasitas." Orang"; ?></h4>
                                <?php
                                  $query_rapat  =  "SELECT
                                                      A.id,
                                                      A.id_ruang,
                                                      B.unit_kerja,
                                                      A.tgl_usul,
                                                      A.tgl_mulai,
                                                      A.tgl_selesai,
                                                      A.judul_rapat,
                                                      A.deskripsi_rapat,
                                                      A.pimpinan_rapat,
                                                      A.peserta_rapat,
                                                      B.no_telp
                                                    FROM jadwal_rapat A
                                                    INNER JOIN users B
                                                    ON A.id_pengguna = B.id_pengguna
                                                    WHERE id_ruang = '".$data->id_ruangan."'";

                                  $result_rapat = mysqli_query($koneksi, $query_rapat);

                                  if ($result_rapat->num_rows > 0) {
                                    ?>
                                    <table class="table table-striped">
                                      <thead>
                                        <tr>
                                          <th scope="col">Pengguna</th>
                                          <th scope="col">Tanggal Rapat</th>
                                          <th scope="col">Judul Rapat</th>
                                          <th scope="col">Pimpinan Rapat</th>
                                          <th scope="col">Info</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                      <?php
                                      while ($data_rapat = $result_rapat->fetch_object()) {
                                      ?>
                                      <tr>
                                        <td width="15%"><?php echo $data_rapat->unit_kerja; ?></td>
                                        <td width="15%"><?php echo substr($data_rapat->tgl_mulai,0,15)." - ".substr($data_rapat->tgl_selesai,11,5) ?></td>
                                        <td width="45%"><?php echo $data_rapat->judul_rapat; ?></td>
                                        <td width="20%"><?php echo $data_rapat->pimpinan_rapat; ?></td>
                                        <td width="5%">
                                          <button type="button" class="btn btn-info" data-toggle="modal" data-id="<?=$data_rapat->id;?>" data-target="#detailRapat">detail</button>
                                        </td>
                                      </tr>
                                      <?php
                                    }
                                    ?>
                                    </tbody>
                                  </table>
                                  <!-- Start Detail Modal -->
                                  <div class="modal fade" id="detailRapat" role="dialog">
                                    <div class="modal-dialog">
                                      <!-- Modal Content -->
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h3 class="modal-title">Detail Rapat</h3>
                                        </div>

                                        <div class="modal-body">
                                          <p>Detail Rapat</p>

                                        </div>

                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                    </div>

                                  </div>
                                  <!-- End Detail Modal -->
                                  <?php
                                } else {
                                  echo "Tidak ada jadwal rapat di ruang rapat ini.";
                                }
                                ?>
                            </div><!--/.col-xs-6.col-lg-4-->

                        </div><!--/row-->
                        <?php
                      }
                    }

                    ?>

                </div><!--/.col-xs-12.col-sm-9-->

                <div class="col-xs-6 col-sm-4 sidebar-offcanvas" id="sidebar">
                    <div id="eventCalendarHumanDate"></div>
                </div><!--/.sidebar-offcanvas-->
            </div><!--/row-->

            <hr>

            <footer>
                <p>&copy; 2017 Biro Kepegawaian Setjen Kemenkes.</p>
            </footer>

        </div><!--/.container-->


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="assets/js/jquery.eventCalendar.js"></script>
        <script src="assets/js/moment.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/bootstrap-datetimepicker.js"></script>
        <script src="library/app.js"></script>
        <script>
            $(document).ready(function() {
                $("#eventCalendarHumanDate").eventCalendar({
                    eventsjson: 'json.php',
                    showDescription: 'true',
                    jsonDateFormat: 'human'  // 'YYYY-MM-DD HH:MM:SS'
                });

                $('#detailRapat').on('show.bs.modal', function (event){
                  var button = $(event.relatedTarget);
                  var id = button.data('id');
                  var modal = $(this);
                  var dataString = 'id=' + id;

                  $.ajax({
                    type: "GET",
                    url: "detail.php",
                    data: dataString,
                    cache: false,
                    success: function(data) {
                      //console.log(data);
                      modal.find('.modal-body').html(data);
                    },
                    error: function(err) {
                      console.log(err);
                    }
                  })
                });
            });
        </script>
    </body>
</html>
