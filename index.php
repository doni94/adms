<?php
include("koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sertifikasi Online</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-datepicker.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">

        <style>
        #site-content {
            margin-top: 80px;
            margin-left: -10px;
            margin-right: 15px;
        }
        .hidden{display:none;}
        .space { margin-bottom: 30px; margin-top: 30px; }
    </style>

  </head>
  <body>
    
    <div class="container">
    
    <header>

    <div class="row">
        <div class="col-md-12 header" id="site-header">
            <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header" style="margin-left: 15px;">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">SERTIFIKASI ONLINE</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php?page=tambah-pendaftar">Input Data</a></li>
            <li><a href="index.php?page=tampil-data">Tampil Data</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

        </div>
    </div>
 </header>   
    <!-- End Bagian Header -->

    <!-- Bagian Wrapper 2 kolom -->
    <div class="row">
        <div class="col-md-12 articles" id="site-content">
           <!-- isi content -->

        <?php 
            if(isset($_GET['page'])){
                $page = $_GET['page'];
         
                switch ($page) {
                    case 'tambah-pendaftar':
                        include "admin/tambah-pendaftar.php";
                        break;
                    case 'tampil-data':
                        include "admin/tampil-data.php";
                        break;                              
                    default:
                        echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
                        break;
                }
            }else{
                include "admin/tambah-pendaftar.php";
            }
         
        ?>


        </div>
    </div>
    <!-- End Bagian wrapper -->

	<script type="text/javascript" charset="utf8" src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
	$('.date').datepicker({
		format: 'dd-mm-yyyy',
	})
	</script>

    <script type="text/javascript" charset="utf8" src="js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
    $('#ngoding').DataTable( {
        "order": [[ 0, "asc" ]]
    } );
    } );
    </script>

  </body>
</html>