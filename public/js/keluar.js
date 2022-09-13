/* save data to local storage */
// window.onload=()=>{
//     let items = JSON.parse(localStorage.getItem("items")) ?
//                 JSON.parse(localStorage.getItem("items")) : null
    
//     // if (items) {
//         loadTable(items)
//     // }
// };

/* aksi button add */
// $(document).on('click','#add',async function(){
//     // console.log($('#select-barang').find('option:selected').text());
//     let tgl = document.getElementById("input-date").value;
//     let storeData = {
//         kodebrg: '',
//         nmabarang:'',
//         qty: 0,
//         satuan:''
//     }
//     let datas = new Array();
//     datas = await JSON.parse(localStorage.getItem("items")) ?
//         JSON.parse(localStorage.getItem("items")) : [];

//     storeData.kodebrg = await $( "#select-barang" ).val();
//     storeData.nmabarang = await $( "#select-barang option:selected" ).text();
//     storeData.satuan = await document.getElementById("satuan").value;
//     storeData.qty = await document.getElementById("input-qty").value;

//     var exists = 0;

//     for (var i = 0; i < datas.length; i++) {
//         if (datas[i].kodebrg == storeData.kodebrg) {
//             datas[i].qty = storeData.qty;
//             exists = 1;
//         }
//     }

//     if (exists === 0)
//         datas.push(storeData);

//     localStorage.setItem("items", JSON.stringify(datas));
//     loadTable(datas);
// });

// $('form').submit(async function (e) {
//     e.preventDefault();
//     let value = $(this).serializeArray();
//     let storeData = {
//         kodebrg: '',
//         nmabarang:'',
//         qty: 0,
//         satuan:''
//     }
//     let datas = new Array();
//     datas = await JSON.parse(localStorage.getItem("items")) ?
//         JSON.parse(localStorage.getItem("items")) : [];

//     storeData.kodebrg = await value[2].value;
//     storeData.nmabarang = await (value[4].value);
//     storeData.satuan = await (value[5].value);
//     storeData.qty = await parseInt(value[6].value);
//     /* // value.forEach((item,index) => {
//     // $("submitted").append(item.name + " " + item.value + "<br>");
//     // }); */

//     var exists = 0;

//     for (var i = 0; i < datas.length; i++) {
//         if (datas[i].kodebrg == storeData.kodebrg) {
//             datas[i].qty = storeData.qty;
//             exists = 1;
//         }
//     }

//     if (exists === 0)
//         datas.push(storeData);

//     localStorage.setItem("items", JSON.stringify(datas));
//     loadTable(datas);
// });

/* slect qty */
$(document).on('change', '.select-barang', function () {
    let prod_id = $(this).val();
    var a = $(this).parent();
    var op = "";
    $.ajax({
        type: 'get',
        url: "/findstok",
        data: {
            'id': prod_id
        },
        dataType: 'json',
        success:async  function (data) {
            /* stok-ready:classs  */
            // a.find('.stok-ready').val(data.stok);
            document.getElementById("stok-ready").value = await data.stok;
            document.getElementById("namabarang").value = await data.namabarang;
            document.getElementById("satuan").value = await data.namasatuan;
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

/* load data table */
// function loadTable(items){
//     const tableBody = document.getElementById('rowitem');
//     let dataHtml = '';
//     if (items) {
//         items.forEach((el,i) => {
//             dataHtml += `<tr><td>${i+1}</td><td>${el.nmabarang}</td><td>${el.qty} ${el.satuan}</td><td><i class="btn btn-outline-danger bi bi-trash" onclick="remove(${i})"></i></td></tr>`
//         });
//         if (items.length < 1) {
//             $('#submit').prop('disabled', true);
//         }else{
//             $('#submit').prop('disabled', false);
            
//         }
//     }else{
//         $('#submit').prop('disabled', true);
//     }
        
//     tableBody.innerHTML = dataHtml;

// }

/* clear item by id */
// async function remove(i){
//     let items = await JSON.parse(localStorage.getItem("items"));
//     await items.splice(i,1);
//     localStorage.setItem("items", JSON.stringify(items));
//     loadTable(items);
// }

//* clear all items */
// $(document).on('click','#clear-storage',function(){
//     localStorage.removeItem('items');
//     loadTable(null)
// })

// $(document).on('click','#submit',function(){
//     let tgl = document.getElementById("input-date").value;
//     $.ajax({
//         type: 'post',
//         url: "/barang-keluar/add",
//         data: {
//             'tanggalkeluar': tgl
//         },
//         dataType: 'json',
//         success: function (data) {
            
//         },
//         error: function () {

//         }
//     });
// })
/* =============================== */


/* aksi button add */
var datas = new Array();
$(document).on('click','#add',async function(){
    // console.log($('#select-barang').find('option:selected').text());
    let tgl = document.getElementById("picker").value;
    let storeData = {
        kodebrg: '',
        nmabarang:'',
        qty: 0,
        satuan:''
    }
    // datas = await JSON.parse(localStorage.getItem("items")) ?
    //     JSON.parse(localStorage.getItem("items")) : [];

    storeData.kodebrg = await $( "#select-barang" ).val();
    storeData.nmabarang = await $( "#select-barang option:selected" ).text();
    storeData.satuan = await document.getElementById("satuan").value;
    storeData.qty = await document.getElementById("input-qty").value;

    let exists = 0;

    for (let i = 0; i < datas.length; i++) {
        if (datas[i].kodebrg == storeData.kodebrg) {
            datas[i].qty = storeData.qty;
            exists = 1;
        }
    }

    if (exists === 0)
        datas.push(storeData);

    // localStorage.setItem("items", JSON.stringify(datas));
    loadTable(datas);
});

/* clear item by id */
async function remove(i){
    let items = datas;
    await datas.splice(i,1);
    // localStorage.setItem("items", JSON.stringify(items));
    loadTable(items);
}

/* load data table */
function loadTable(items){
    const tableBody = document.getElementById('rowitem');
    let dataHtml = '';
    if (items.length > 0) {
        items.forEach((el,i) => {
            dataHtml += `<tr><td>${i+1}</td><td><input type="hidden" value="${el.kodebrg}" name="kodebrg[]"><input type="text" value="${el.nmabarang}" name="" id="width-auto" class="item" readonly></td><td><input type="text" value="${el.qty}" readonly name="qty[]" id="width-auto" class="item" style="width:44px;">${el.satuan}</td><td><i class="btn btn-outline-danger bi bi-trash" onclick="remove(${i})"></i></td></tr>`
        });
        $('#submit').prop('disabled', false);
    }else{
        $('#submit').prop('disabled', true);
    }
    tableBody.innerHTML = dataHtml;
}

function resizeInput() {
    $(this).attr('size', $(this).val().length);
}

$('#width-auto')
    // event handler
    .keyup(resizeInput)
    // resize on page load
    .each(resizeInput);
    
//validate max qty
$('#input-qty').change(async function(){
    let max = await parseInt($(this).attr('max'));
    let qty = $(this).val() > max ? max : $(this).val();
    $(this).val(qty);
})

$('#input-qty').on('input',async function(){
    let max = await parseInt($(this).attr('max'));

    if ($(this).val() < 1 || $(this).val() > max) {
        $('#add').prop('disabled', true);
    }else{
        $('#add').prop('disabled', false);
    }
});

//list filter bydate
$(function () {
    var dateFormat = "yy/mm/dd",
        from = $("#picker-start")
        .datepicker({
            // defaultDate: "+1w",
            dateFormat:"yy/mm/dd",
            changeMonth: true,
            maxDate: "-1D",
            numberOfMonths: 2
        })
        .on("change", function () {
            to.datepicker("option", "minDate", getDate(this));
        }),
        to = $("#picker-end").datepicker({
            // defaultDate: "+1w",
            dateFormat:"yy/mm/dd",
            changeMonth: true,
            maxDate: "0D",
            numberOfMonths: 2
        })
        .on("change", function () {
            from.datepicker("option", "maxDate", getDate(this));
        });

    function getDate(element) {
        var date;
        try {
            date = $.datepicker.parseDate(dateFormat, element.value);
        } catch (error) {
            date = null;
        }

        return date;
    }
});