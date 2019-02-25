<?php
	include "../koneksi.php";

	$mhs = isset($_GET["mhs"])?$_GET["mhs"]:"";
	$sql_select = "SELECT * FROM riwayat WHERE id_mahasiswa ='".$mhs."';";
	$select = $mysqli->query($sql_select);

	if ($select->num_rows >0){
		$sql 	= "
					DELETE FROM
						riwayat
					WHERE
						id_mahasiswa = '".$mhs."';
				";
		if($mysqli->query($sql)){
			echo"
				<script>
					alert('Data berhasil di hapus !');
					window.location = '../input.html';
				</script>
			";
		}else{
			echo "
				<script>
					alert('Data gagal di hapus !');
					window.location = '../input.html';
				</script>
			";
		}
	}else{
		echo "
				<script>
					alert('ID tidak dikenali, coba lagi !');
					window.location = '../input.html';
				</script>
			";
	}

	$mysqli->close();
	?>