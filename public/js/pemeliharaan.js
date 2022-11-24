
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

$(document).on('change', '#selectname', function() {
  let nameitem = $(this).val();
  let div = $(this).parent();
  let op = '<option value="">Pilih Serial</option>';
  // console.log(nameitem);
  $.ajax({
      type: 'get',
      url: '/findname',
      data: {'key':nameitem},
      // dataType: 'json',
      cache: false,
      success: function(data){
          // for (let i = 0; i < data.length; i++){
          //     // console.log(data[i].kode);
          //     op += '<option value="'+data[i].kode+'">'+data[i].kode+'</option>';
          // }
          $('#selectsernum').html(data);
          // $('#selectsernum').append(op);
      },
      error: function(){
          console.log('err');
      },
  });
});

window.addEventListener('openModalDetail',function (params) {
  // console.log(params.detail);
  $(".detailPemeliharaanModal").modal('show');

});