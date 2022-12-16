
window.addEventListener('confirmperubahan',function(event){
    // $('.confirm-modal').find('#confirm-title').html(event.detail.title);
    // $('.confirm-modal').find('#msg-modal').html(event.detail.msg);
    // $(".confirm-modal").modal('show');
    swal({
      title: 'konfirmasi',
      imageWidth: 48,
      imageHeight: 48,
      html: 'apakah ingin mengupdate data aset?',
      showCloseButton: true,
      showCancelButton: true,
      cancelButtonText: 'Batal',
      confirmButtonText: 'Yakin',
      cancelButtonColor: '#d333',
      confirmButtonColor: '#3085d6',
      width: 360,
      allowOutsideClick: false
    }).then(function(res){
      if (res.value) {
        console.log(event.detail.kode);
      };
    });
  });

  // cari barang by lokasi input pemeliharaan oleh user
$(document).on('change', '#selectloc', async function() {
  //disable dan kosongkan value pilih kode
  $('#selectkode').prop('disabled', true); 
  $('#selectkode').val(''); 

  let loc = await $(this).val();
  let div = await $(this).parent();
  let op = await '<option value="">--Pilih Aset--</option>';
  // console.log(loc);
  if (loc != '') {
    $('#selectname').prop('disabled', false); //jika lokasi belum dipilih

    $.ajax({
        type: 'get',
        url: '/barang-by-loc',
        data: {'key':loc},
        // dataType: 'json',
        cache: false,
        success: function(data){
            // for (let i = 0; i < data.length; i++){
            //     // console.log(data[i].kode);
            //     op += '<option value="'+data[i].kode+'">'+data[i].kode+'</option>';
            // }
            // console.log(data);
            $('#selectname').html('<option value="">--Pilih Aset--</option>'+data);
            // $('#selectname').append(op);
        },
        error: function(){
            console.log('err');
        },
    });
  } else {
    $('#selectname').prop('disabled', true);
    $('#selectname').html(op);
  }
});

 // cari barang by kategori input pemeliharaan oleh user
 $(document).on('change', '#selectname', async function() {
  let ktg = await $(this).val();
  let loc = await $('#selectloc').val();
  let div = await $(this).parent();
  let op = await '<option value="">--Pilih Kode--</option>';
  // console.log(loc);
  if (ktg != '') {
    $('#selectkode').prop('disabled', false); //jika kategori belum dipilih

    $.ajax({
        type: 'get',
        url: '/barang-by-ktg',
        data: {
          'lokasi':loc,
          'kategori': ktg
        },
        // dataType: 'json',
        cache: false,
        success: function(data){
            $('#selectkode').html('<option value="">--Pilih Kode--</option>'+data);
            // $('#selectname').append(op);
        },
        error: function(){
            console.log('err');
        },
    });
  } else {
    $('#selectkode').prop('disabled', true);
    $('#selectkode').html(op);
  }
});

window.addEventListener('openModalDetail',function (params) {
  // console.log(params.detail);
  $(".detailPemeliharaanModal").modal('show');

});