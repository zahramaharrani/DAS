<?php
  include "../koneksi.php";
  function id_a()
  {
    include "../koneksi.php";
    $sql_id_a = "SELECT max(id_mahasiswa) FROM mahasiswa";
    $query = mysqli_query($mysqli, $sql_id_a) or die (mysql_error());
   
    $id_a = $query->fetch_array();

    if($id_a){
      $nilai = substr($id_a[0], 4);
      $kode = (int) $nilai;
      //tambahkan sebanyak + 1
      $kode = $kode + 1;
      $auto_kode = "MHSX" .str_pad($kode, 4, "0",  STR_PAD_LEFT);
      return $auto_kode;
    } else {
      $auto_kode = "MHSX0001";
      return $auto_kode;
    }
   
  }
  $action = isset($_POST["form_tambah"])?$_POST["form_tambah"]:"";
  if ($action){
    $date = date("F j, Y, g:i a");
      $sql  ="
            INSERT INTO mahasiswa SET 
            id_mahasiswa ='".id_a()."', 
            nis ='".$mysqli->real_escape_string($_POST['form_nis'])."',
            nama ='".$mysqli->real_escape_string($_POST['form_nama'])."',
            ttl = '".$mysqli->real_escape_string($_POST['form_ttl'])."',
            alamat ='".$mysqli->real_escape_string($_POST['form_alamat'])."',
            email ='".$mysqli->real_escape_string($_POST['form_email'])."',
            no_hp ='".$mysqli->real_escape_string($_POST['form_hp'])."',
            entri = '".$date."';";
            if($mysqli->query($sql)){
              echo "
                 <script>
                   alert('Mahasiswa Siswa Terdaftar');
                   window.location='../input.html';
                 </script>
               ";
            }else{
              echo "
                 <script>
                   alert('aaaa');
                   window.location='../input.html';
                 </script>
               ";
            }
            }
  
  ?>