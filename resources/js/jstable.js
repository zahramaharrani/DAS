$(document).ready(function(){
$('#myTable').DataTable( {
    "ajax": "http://localhost/das/data/mahasiswa-db.php",
    "columns": [
      {"data" : "id_mahasiswa"},
      {"data" : "nis"},
      {"data" : "nama"},
      {"data" : "ttl"},
      {"data" : "alamat"},
      {"data" : "email"},
      {"data" : "no_hp"},
      {"data" : "id_mahasiswa", "render" : function ( id,a, b, c, d ) {
       return`<a href="nextpage/edit.html?mhs=${b.id_mahasiswa}" class="btn btn-primary" ><i class="fas fa-wrench"></i></a>
              <a href="proses/hapus.php?mhs=${b.id_mahasiswa}" onclick="return confirm('yakin di hapus?')" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>`;
  
      }},
    ]
  });
});