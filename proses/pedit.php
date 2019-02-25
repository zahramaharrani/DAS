<?php
include '../koneksi.php';
  $mhs = isset ($_GET["mhs"])?$_GET["mhs"]:"";

  $action = isset ($_POST["form_edit"])?$_POST["form_edit"]:"";
  if ($action) {
    $sql = "UPDATE mahasiswa SET
    nis ='".$mysqli->real_escape_string($_POST['form_nis'])."',
    nama ='".$mysqli->real_escape_string($_POST['form_nama'])."',
    ttl ='".$mysqli->real_escape_string($_POST['form_ttl'])."',
    alamat ='".$mysqli->real_escape_string($_POST['form_alamat'])."',
    email ='".$mysqli->real_escape_string($_POST['form_email'])."',
    no_hp ='".$mysqli->real_escape_string($_POST['form_hp'])."'
    WHERE
    id_mahasiswa = '".$mhs."';
    ";
    if ($mysqli->query($sql)) {
       echo "
      <script>
      alert('Berhasil di Update !');
      window.location = '../input.html';
      </script>
      ";
      }else{
        echo "
        <script>
        alert('Gagal !');
        window.location = '../input.html';
        </script>
        ";
      }
    }else{
    	 echo "
        <script>
        alert('Gagal !');
        window.location = '../input.html';
        </script>
        ";
    }
   ?>