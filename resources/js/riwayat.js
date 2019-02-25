$(document).ready(function(){
$('#myTable').DataTable( {
    "ajax": "http://localhost/das/data/riwayat-db.php",
    "columns": [
      {"data" : "id_mahasiswa"},
      {"data" : "nis"},
      {"data" : "nama"},
      {"data" : "ttl"},
      {"data" : "alamat"},
      {"data" : "email"},
      {"data" : "no_hp"},
      {"data" : "entri"},
      {"data" : "masuk_ryt"},
      {"data" : "id_mahasiswa", "render" : function ( id,a, b, c, d ) {
       return`<a href="proses/hapus-ryt.php?mhs=${b.id_mahasiswa}" onclick="return confirm('yakin di hapus?')" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>`;
  
      }},
    ]
  });
});