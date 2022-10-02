// var datas = new Array();

window.addEventListener('openAddModal', function(){
//   datas = [];
    $(".addModal").find('form')[0].reset();
    $(".addModal").modal('show');
})

window.addEventListener('openFindModal',function(){
  $('.findModal').modal('show');
})

window.addEventListener('openAsetModal',function(){
  $('.detailAsetModal').modal('show');
})

window.addEventListener('openToast', function() {
  $('.toast').toast('show');
})


window.addEventListener('saveSuccessed', function(event){
  alert('data tersimpan, dan segera diproses!');
  $(".addModal").modal('hide');
  console.log(event.detail.brg);
})

$('#selectitem').on('change', function() {
  // console.log($(this).find("option:selected").text());
  let a = $(this).find("option:selected").text()
  // $("#inputname").val(a);
  // $.ajax({
  //     method: 'GET',
  //     url: '/stok/Brother',
  //     data: {},
  //     success: function( response ){
  //         console.log( response );
  //     },
  //     error: function( e ) {
  //         console.log(e);
  //     }
  // });
});

$(function () {
  $( "#picker-start" ).datepicker({
    dateFormat:'yy-m-dd',
    changeMonth: true,
    changeYear: true,
    minDate: "0D",
    // maxDate: "0D",
    showAnim:'slideDown'
  });

  $( "#picker-end" ).datepicker({
    dateFormat:'yy-m-dd',
    changeMonth: true,
    changeYear: true,
    minDate: "0D",
    // maxDate: "0D",
    showAnim:'slideDown'
  });
});