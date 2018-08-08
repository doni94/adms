<br>
<a href="index.php?page=tambah-pendaftar" class="btn btn-warning btn-sm"><i class="fa fa-check"></i>Tambah Pendaftar</a>
<br>
<br>
<div class="table-responsive">
	<table id="ngoding" class="table table-bordered table-hover">
		<thead>
		<tr>
            
			<th class="text-center active">No</th>
			<th class="text-center active">Nik</th>
            <th class="text-center active">Nama</th>
			<th class="text-center active">Tanggal Lahir</th>
			<th class="text-center active">Skema Sertifikasi</th>
            <th class="text-center active">Tempat Uji Kompetisi</th>
		</tr>
		</thead>

		<tbody>
		
		<?php

		$sql = mysqli_query($koneksi, "SELECT  pendaftar.*,sertifikasi.* FROM pendaftar JOIN sertifikasi USING (id_pendaftar)");
		
		if(mysqli_num_rows($sql) == 0){
			echo '<tr><td colspan="8">Data Tidak Ada.</td></tr>';
		}else{
			$no = 1; // Untuk penomoran tabel
			while($row = mysqli_fetch_assoc($sql)){
				$tgl_lahir = $row['tgl_lahir'];
		        $tgl_lahir   =    date('d-m-Y', strtotime($tgl_lahir));
		        
            echo '
				<tr>
					
					<td class="text-center" width="10px">'.$no.'</td>   
					<td>'.$row['nik'].'</td>        
                    <td>'.$row['nama'].'</td>
					<td>'.$tgl_lahir.'</td>
					<td>'.$row['skema'].'</td>
					<td>'.$row['tempat_uji'].'</td>

					';
					
				echo '
					</td>
					
				</tr>
				';
				$no++;
			}
		}
		?>
		</tbody>
	</table>
	</div>
	