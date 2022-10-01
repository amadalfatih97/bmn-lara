
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