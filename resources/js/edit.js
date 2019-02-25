var urlParams = new URLSearchParams(window.location.search);
var mhs = urlParams.get('mhs');

$(document).ready(function() {
	$.ajax({
			url: "http://localhost/das/data/mahasiswa-db.php?mhs="+mhs,
			dataType: 'json',
			success:function (result) {
				var data = result.data[0];
				$('#fmE').attr('action', `../proses/pedit.php?mhs=${mhs}`);
				$('#nisE').attr('value', data.nis);
				$('#namaE').attr('value', data.nama);
				$('#ttlE').attr('value', data.ttl);
				$('#alamatE').attr('value', data.alamat);
				$('#emailE').attr('value', data.email);
				$('#hpE').attr('value', data.no_hp);
				console.info(data.nama);
			}
	});
})
