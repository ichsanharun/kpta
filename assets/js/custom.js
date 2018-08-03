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

function pilih(){
  ck = document.getElementById('option').value;
  ct = "#daftar".concat("_",ck)

  document.getElementById('pilih_kategori').href = ct;
}
function pilih_sidang(a,b){
  if (a < 8) {
    alert('Maaf, bimbingan harus mencapai 8x Untuk bisa mendaftar Sidang!')
  }
  else {
    document.getElementById('id_jadwal').value = b;

  }
}

function pindah_search(){
    ck = document.getElementById('t_sidang').value;
    table.search( this.value ).draw();
    //document.getElementById('dataTable_filter').children('input').add = ck;
    //document.getElementsByClassName('form-control form-control-sm').c
}

$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = $('#t_sidang').val();
        var max = $('#w_sidang').val();
        var date = data[1] || 0; // use data for the age column


            return true;

    }
);

$(document).ready(function() {
    var table = $('#example').DataTable();

    // Event listener to the two range filtering inputs to redraw on input
    $('#t_sidang').on( 'change', function () {
    table.search( this.value ).draw();
    } );

    $('#w_sidang').on( 'keyup', function () {
    table.column(2).search(this.value).draw();

    } );

    $('#r_sidang').on( 'change', function () {
    table.column(3).search(this.value).draw();

    } );

    $('#r_sidang2').on( 'change', function () {
    table.column(4).search(this.value).draw();

    } );

    $('#r_sidang3').on( 'change', function () {
    table.column(3).search(this.value).draw();

    } );

} );

function limit_checkbox(max,identifier)
{
	var checkbox = $("input[name='"+identifier+"[]']");
	var checked  = $("input[name='"+identifier+"[]']:checked").length;
	checkbox.filter(':not(:checked)').prop('disabled', checked >= max);

}

function kalk_n(){
    var n1 = parseInt(document.getElementById('n_1').value);
    var n2 = parseInt(document.getElementById('n_2').value);
    var n3 = parseInt(document.getElementById('n_3').value);
    var n4 = parseInt(document.getElementById('n_4').value);
    var n5 = parseInt(document.getElementById('n_5').value);
    var n6 = parseInt(document.getElementById('n_6').value);
    var ntotal = n1*0.1 + n2*0.1 + n3*0.2 + n4*0.1 + n5*0.3 + n6*0.2;
    document.getElementById('n_total').value = ntotal;
    //document.getElementById('dataTable_filter').children('input').add = ck;
    //document.getElementsByClassName('form-control form-control-sm').c
}
