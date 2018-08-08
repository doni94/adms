<?php
  if(isset($_POST['submit'])){
      
      $nik            = $_POST['nik'];
      $nama            = $_POST['nama'];
      $tgl_lahir             = $_POST['tgl_lahir'];
      $tgl_lahir            = date('Y-m-d', strtotime($tgl_lahir));
      $no_hp            = $_POST['no_hp'];
      $email            = $_POST['email'];
      $organisasi            = $_POST['organisasi'];
      $skema            = $_POST['skema'];
      $tempat_uji            = $_POST['tempat_uji'];
      $rekomendasi            = $_POST['rekomendasi'];
      $tgl_terbit             = $_POST['tgl_terbit'];
      $tgl_terbit            = date('Y-m-d', strtotime($tgl_terbit));

      $cek = mysqli_query($koneksi, "SELECT * FROM pendaftar WHERE nik='$nik'");
      if(mysqli_num_rows($cek) == 0){

      $cek = mysqli_query($koneksi, "SELECT * FROM pendaftar WHERE no_hp='$no_hp'");
      if(mysqli_num_rows($cek) == 0){ 
      
      $cek = mysqli_query($koneksi, "SELECT * FROM pendaftar WHERE email='$email'");
      if(mysqli_num_rows($cek) == 0){  

        $sql1 = mysqli_query($koneksi, "INSERT INTO pendaftar (id_pendaftar, nik, nama, tgl_lahir, no_hp, email, organisasi) VALUES('0','$nik','$nama', '$tgl_lahir', '$no_hp', '$email', '$organisasi')") or die(mysqli_error());

         //mencari id terakhir
          $sql2 = mysqli_query($koneksi, "select max(id_pendaftar) as id_baru from pendaftar limit 1");
          $row = mysqli_fetch_array($sql2);
          $id_baru = $row['id_baru'];
          //menyimpan data 

        $sql3 = mysqli_query($koneksi, "INSERT INTO sertifikasi (id_sert, id_pendaftar, skema, tempat_uji, rekomendasi, tgl_terbit) VALUES('0','$id_baru','$skema', '$tempat_uji', '$rekomendasi', '$tgl_terbit')") or die(mysqli_error());  

        if($sql1 || $sql2 || $sql3 ){
            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil Di Simpan.</div>';
        }else{
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Gagal Di simpan !</div>';
        }

        }else{
        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Maaf, Email Sudah Ada !</div>';
        } 

        }else{
        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Maaf, Nomor HP Sudah Ada !</div>';
        } 

      }else{
        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Maaf, NIK Sudah Ada !</div>';
        }  
  }
  ?>
   
   <form class="form-horizontal" action="" method="post">
        <div class="form-group">
          <label class="col-sm-3 control-label">NIK</label>
          <div class="col-sm-2">
            <input type="text" name="nik" class="form-control" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Nama</label>
          <div class="col-sm-4">
            <input type="text" name="nama" class="form-control" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Tanggal Lahir</label>
          <div class="col-sm-4">
            <input type="text" name="tgl_lahir" class="input-group date form-control" date="" data-date-format="dd-mm-yyyy" placeholder="00-00-0000" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">No HP</label>
          <div class="col-sm-3">
            <input type="text" name="no_hp" class="form-control" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Email</label>
          <div class="col-sm-3">
            <input type="text" name="email" class="form-control" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Organisasi</label>
          <div class="col-sm-3">
            <input type="text" name="organisasi" class="form-control" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Skema Sertifikasi</label>
          <div class="col-sm-3">
            <input type="text" name="skema" class="form-control" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Tempat Uji Sertifikasi</label>
          <div class="col-sm-3">
            <input type="text" name="tempat_uji" class="form-control" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Rekomendasi</label>
          <div class="col-sm-3">
            <input type="text" name="rekomendasi" class="form-control" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Tanggal Terbit Sertifikat</label>
          <div class="col-sm-4">
            <input type="text" name="tgl_terbit" class="input-group date form-control" date="" data-date-format="dd-mm-yyyy" placeholder="00-00-0000" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">&nbsp;</label>
          <div class="col-sm-6">
            <input type="submit" name="submit" class="btn btn-sm btn-primary" value="Simpan">
            <a href="index.php" class="btn btn-sm btn-danger">Batal</a>
          </div>
        </div>
      </form>

            