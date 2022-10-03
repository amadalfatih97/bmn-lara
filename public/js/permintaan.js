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

//get stok
$(document).on('change', '#selectitem', function () {
  let prod_id = $(this).val();
  let name = $(this).find("option:selected").text()
  var a = $(this).parent();
  var op = "";
  // console.log(name);
  $.ajax({
      type: 'get',
      url: "/findstok",
      data: {
          'id': prod_id,
          'name': name
      },
      dataType: 'json',
      success:async  function (data) {
          /* stok-ready:classs  */
          // a.find('.stok-ready').val(data.stok);
          document.getElementById("inputname").value = await data.nama_barang;
          document.getElementById("inputstok").value = await data.stok;
          // $('#inputname').attr('live:model', 'nameitem');
          // document.getElementById("satuan").value = await data.namasatuan;
          $('#input-qty').val('')
          if (data.stok < 1 ) {
              $('#input-qty').prop('disabled', true)
              $('#add').prop('disabled', true);
          }else{
              $('#add').prop('disabled', true);
              $('#input-qty').attr({"max": data.stok})
              $('#input-qty').prop('disabled', false)
          }
      },
      error: function () {
          alert('error')
      }
  });
});

// var datas = new Array();
// $(document).on('click','#add',async function(){
//     // console.log($('#select-barang').find('option:selected').text());
//     // let tgl = document.getElementById("picker").value;
//     let storeData = {
//         kodebrg: '',
//         nmabarang:'',
//         qty: 0,
//         // satuan:''
//     }

//     storeData.kodebrg = await $( "#selectitem" ).val();
//     storeData.nmabarang = await $( "#selectitem option:selected" ).text();
//     // storeData.satuan = await document.getElementById("satuan").value;
//     storeData.qty = await document.getElementById("input-qty").value;

//     let exists = 0;

//     for (let i = 0; i < datas.length; i++) {
//         if (datas[i].kodebrg == storeData.kodebrg) {
//             datas[i].qty = storeData.qty;
//             exists = 1;
//         }
//     }

//     if (exists === 0)
//         datas.push(storeData);

//     loadTable(datas);
// });

// /* clear item by id */
// async function remove(i){
//     let items = datas;
//     await datas.splice(i,1);
//     loadTable(items);
// }

// /* load data table */
// function loadTable(items){
//     const tableBody = document.getElementById('rowitem');
//     let dataHtml = '';
//     if (items.length > 0) {
//         items.forEach((el,i) => {
//             dataHtml += `<tr><td>${i+1}</td><td><input type="text" value="${el.kodebrg}" name="kodebrg[]"><input type="text" value="${el.nmabarang}" name="namabarang[]" id="width-auto" class="item" readonly></td><td><input type="text" value="${el.qty}" readonly name="qty[]" id="width-auto" class="item" style="width:44px;"></td><td><i class="btn btn-outline-danger bi bi-trash" onclick="remove(${i})"></i></td></tr>`
//         });
//         $('#submit').prop('disabled', false);
//     }else{
//         $('#submit').prop('disabled', true);
//     }
//     tableBody.innerHTML = dataHtml;
// }

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