// var datas = new Array();

window.addEventListener('openAddModal', function(){
//   datas = [];
    $(".addModal").find('form')[0].reset();
    $(".addModal").modal('show');
})

window.addEventListener('saveSuccessed', function(event){
  alert('data tersimpan, dan segera diproses!');
  $(".addModal").modal('hide');
  console.log(event.detail.brg);
})

// get stok
// $(document).on('change', '.select-barang', function () {
//   let prod_id = $(this).val();
//   var a = $(this).parent();
//   var op = "";
//   $.ajax({
//       type: 'get',
//       url: "/findstok",
//       data: {
//           'id': prod_id
//       },
//       dataType: 'json',
//       success:async  function (data) {
//           /* stok-ready:classs  */
//           // a.find('.stok-ready').val(data.stok);
//           document.getElementById("stok-ready").value = await data.stok;
//           document.getElementById("namabarang").value = await data.namabarang;
//           document.getElementById("satuan").value = await data.namasatuan;
//           $('#input-qty').val('')
//           if (data.stok < 1 ) {
//               $('#input-qty').prop('disabled', true)
//               $('#add').prop('disabled', true);
//           }else{
//               $('#add').prop('disabled', true);
//               $('#input-qty').attr({"max": data.stok})
//               $('#input-qty').prop('disabled', false)
//           }
//       },
//       error: function () {
//           alert('error')
//       }
//   });
// });

// //validate max qty
// $('#input-qty').change(async function(){
//   let max = await parseInt($(this).attr('max'));
//   let qty = $(this).val() > max ? max : $(this).val();
//   $(this).val(qty);
// })

// $('#input-qty').on('input',async function(){
//   let max = await parseInt($(this).attr('max'));

//   if ($(this).val() < 1 || $(this).val() > max) {
//       $('#add').prop('disabled', true);
//   }else{
//       $('#add').prop('disabled', false);
//   }
// });

// /* aksi button add */
// // var datas = new Array();
// $(document).on('click','#add',async function(){
//     // console.log($('#select-barang').find('option:selected').text());
//     let tgl = document.getElementById("picker").value;
//     let storeData = {
//         kodebrg: '',
//         nmabarang:'',
//         qty: 0,
//         satuan:''
//     }
//     // datas = await JSON.parse(localStorage.getItem("items")) ?
//     //     JSON.parse(localStorage.getItem("items")) : [];

//     storeData.kodebrg = await $( "#select-barang" ).val();
//     storeData.nmabarang = await $( "#select-barang option:selected" ).text();
//     storeData.satuan = await document.getElementById("satuan").value;
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

//     // localStorage.setItem("items", JSON.stringify(datas));
//     loadTable(datas);
// });

// /* load data table */
// function loadTable(items){
//   const tableBody = document.getElementById('rowitem');
//   let dataHtml = '';
//   if (items.length > 0) {
//       items.forEach((el,i) => {
//           dataHtml += `<tr><td>${i+1}</td><td><input type="hidden" value="${el.kodebrg}" name="kodebrg[]" wire:model.debounce.350ms="kodebrg"><input type="text" value="${el.nmabarang}" name="" id="width-auto" class="item" readonly></td><td><input type="text" value="${el.qty}" readonly name="qty[]" wire:model="qty" id="width-auto" class="item" style="width:44px;">${el.satuan}</td><td><i class="btn btn-outline-danger bi bi-trash" onclick="remove(${i})"></i></td></tr>`
//       });
//       $('#submit').prop('disabled', false);
//   }else{
//       $('#submit').prop('disabled', true);
//   }
//   tableBody.innerHTML = dataHtml;
// }

// /* clear item by id */
// async function remove(i){
//   let items = datas;
//   await datas.splice(i,1);
//   // localStorage.setItem("items", JSON.stringify(items));
//   loadTable(items);
// }