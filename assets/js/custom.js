
function tampilkan_iddosen(a,b){
  var id_dosen = a;
  var id_d = "id_dosen";
  var id = id_d.concat("_",b);

	document.getElementById(id).value = a;
  var dos1 = document.getElementById('id_dosen_1').value;
  var dos2 = document.getElementById('id_dosen_2').value;
  var dos3 = document.getElementById('id_dosen_3').value;

  var pilih1 = "pilih".concat("_1_",dos1);
  var pilih2 = "pilih".concat("_2_",dos1);
  var pilih3 = "pilih".concat("_3_",dos1);
  var pilih4 = "pilih".concat("_1_",dos2);
  var pilih5 = "pilih".concat("_2_",dos2);
  var pilih6 = "pilih".concat("_3_",dos2);
  var pilih7 = "pilih".concat("_1_",dos3);
  var pilih8 = "pilih".concat("_2_",dos3);
  var pilih9 = "pilih".concat("_3_",dos3);
  alert(pilih1,
  pilih2,
  pilih3,
  pilih4,
  pilih5,
  pilih6,
  pilih7,
  pilih8,
  pilih9);
  document.getElementById(pilih1).disabled = false;
  document.getElementById(pilih2).disabled = false;
  document.getElementById(pilih3).disabled = false;
  document.getElementById(pilih4).disabled = false;
  document.getElementById(pilih5).disabled = false;
  document.getElementById(pilih6).disabled = false;
  document.getElementById(pilih7).disabled = false;
  document.getElementById(pilih8).disabled = false;
  document.getElementById(pilih9).disabled = false;

    document.getElementById(pilih1).disabled = true;
    document.getElementById(pilih2).disabled = true;
    document.getElementById(pilih3).disabled = true;
    document.getElementById(pilih4).disabled = true;
    document.getElementById(pilih5).disabled = true;
    document.getElementById(pilih6).disabled = true;
    document.getElementById(pilih7).disabled = true;
    document.getElementById(pilih8).disabled = true;
    document.getElementById(pilih9).disabled = true;

}
function valid_dosen(){


}
function limit_checkbox(max,identifier)
{
	var checkbox = $("input[name='"+identifier+"[]']");
	var checked  = $("input[name='"+identifier+"[]']:checked").length;
	checkbox.filter(':not(:checked)').prop('disabled', checked >= max);

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

function cek_tanggal(menu){
  ck = document.getElementById('tanggal_bimbingan').value;
  ct = document.getElementById('tanggal_sekarang').value;
  cs = document.getElementById('submit');
  if (ck < ct) {
    $("[data-toggle='popover']").popover({title: "Peringatan!", content: "Tidak boleh tanggal kemarin!", placement: "top"});
    $("[data-toggle='popover']").popover('show');
    document.getElementById('tanggal_bimbingan').value = '';
    cs.disabled = true;
  }
  else {
    $("[data-toggle='popover']").popover('hide');
    cs.disabled = false;
  }
}
