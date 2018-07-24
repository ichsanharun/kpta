function tampilkan_iddosen(a){
  var id_dosen = a;
	document.getElementById('id_dosen').value = a;
}
function cek(menu){
  ck = document.getElementsByName('id_jadwal_kp[]');
  ct = document.getElementsByName('id_jadwal_ta[]');
  for (var i = 0; i < ck.length; i++) {
    ck[i].checked = menu.checked;
  }
  for (var i = 0; i < ct.length; i++) {
    ct[i].checked = menu.checked;
  }
}
