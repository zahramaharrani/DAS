<?php
include "../koneksi.php";

$mhs = isset($_GET["mhs"])?$_GET["mhs"]:"";

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'http://localhost/das/data/mahasiswa-db.php?mhs='.$mhs);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl);

$result = json_decode($result, true);


$x = $result['data'][0];

$date = date("F j, Y, g:i a");
      $sql  ="
            INSERT INTO riwayat SET 
            id_mahasiswa ='".$x['id_mahasiswa']."', 
            nis ='".$x['nis']."',
            nama ='".$x['nama']."',
            ttl = '".$x['ttl']."',
            alamat ='".$x['alamat']."',
            email ='".$x['email']."',
            no_hp ='".$x['no_hp']."',
            entri = '".$x['entri']."',
            masuk_ryt = '".$date."';";
            if($mysqli->query($sql)){
              $del= "
									DELETE FROM
										mahasiswa
									WHERE
										id_mahasiswa = '".$mhs."';
								";
								if ($mysqli->query($del)) {
									echo"
										<script>
											alert('Data berhasil di hapus !');
											window.location = '../input.html';
										</script>
									";
								}else{
									echo"
										<script>
											alert('Data Gagal di hapus a !');
											window.location = '../input.html';
										</script>
									";
								}
            }else{
              echo"
									<script>
										alert('Data Gagal di hapus  b 		!');
										window.location = '../input.html';
									</script>
								";
            }
?>