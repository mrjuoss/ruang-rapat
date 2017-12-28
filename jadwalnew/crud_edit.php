<?php
$id = $_GET['id'];
$pesan = "";
include 'koneksi.php';
    
$query = "SELECT * FROM jadwalku WHERE jadwal_id = '$id'";
$result = mysqli_query($link, $query);
$data = mysqli_fetch_array($result);

if (isset($_POST['submit'])) {
    $date = $_POST['date'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $id = $_POST['jadwal_id'];
        
    if ($date <> '' && $title <> '' && $description <> '') {
        $query = "UPDATE jadwalku SET date='$date', title='$title', description='$description' WHERE jadwal_id = '$id'";
        $add = mysqli_query($link, $query);
        header("location:crud_tabel.php");
    } else {
        $pesan = "Data tidak lengkap";        
    }
}
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
            
        <title>Agenda - harviacode.com</title>
            
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/bootstrap-datetimepicker.css" />
        
        <!-- css dibawah ini hanya untuk demo-->
        <style>
            body {
                padding-top: 70px;
            }
            footer {
                padding: 30px 0;
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
                    <a class="navbar-brand" href="index.php">Project name</a>
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
                    <div>
                        <p><?php echo $pesan ?></p>
                        <form action="crud_edit.php?id=<?php echo $id ?>" method="POST">
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="text" name="date" class="form-control" id="date" placeholder="Date" value="<?php echo $data['date'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="judul">Title</label>
                                <input type="text" name="title" class="form-control" id="judul" placeholder="Title" value="<?php echo $data['title'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" id="description" placeholder="Description"><?php echo $data['description'] ?></textarea>
                            </div>
                            <input type="hidden" name="jadwal_id" value="<?php echo $data['jadwal_id'] ?>">
                            <input type="submit" name="submit" class="btn btn-primary" value="Update"/>
                            <a href="crud_tabel.php" class="btn btn-default">Cancel</a>
                        </form>
                    </div>
                </div><!--/.col-xs-12.col-sm-9-->
                    
                <div class="col-xs-6 col-sm-4 sidebar-offcanvas" id="sidebar">
                    <div class="list-group">
                        <a href="#" class="list-group-item active">Link</a>
                        <a href="#" class="list-group-item">Link</a>
                        <a href="#" class="list-group-item">Link</a>
                        <a href="#" class="list-group-item">Link</a>
                        <a href="#" class="list-group-item">Link</a>
                        <a href="#" class="list-group-item">Link</a>
                        <a href="#" class="list-group-item">Link</a>
                        <a href="#" class="list-group-item">Link</a>
                        <a href="#" class="list-group-item">Link</a>
                        <a href="#" class="list-group-item">Link</a>
                    </div>
                </div><!--/.sidebar-offcanvas-->
            </div><!--/row-->
                
            <hr>
                
            <footer>
                <p>&copy; 2016 Company, Inc.</p>
            </footer>
                
        </div><!--/.container-->
            
            
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript" src="js/moment.js"></script>
        <script type="text/javascript" src="js/bootstrap-datetimepicker.js"></script>
        <script type="text/javascript">
            $(function () {
                $('#date').datetimepicker({
                    format: 'YYYY-MM-DD HH:mm:ss'
                });
            });
        </script>
    </body>
</html>