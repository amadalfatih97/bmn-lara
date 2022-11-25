$(document).ready(function(){
    /* by default hide all radio_content div elements except first element */
    $(".content .radio_content").hide();
    $(".content .radio_content:first-child").show();

    /* when any radio element is clicked, Get the attribute value of that clicked radio element and show the radio_content div element which matches the attribute value and hide the remaining tab content div elements */
    $(".radio_wrap").click(function(){
      var current_raido = $(this).attr("data-radio");
      $(".content .radio_content").hide();
      $("."+current_raido).show();
    })

    // console.log($('#mySwitch').val());
    
    // $('#mySwitch').on('change',(res)=>{
    //   // function (res) {
    //     if(this.checked)
    //       console.log('true');
    //     else
    //       console.log('false');
    //     // if($('#mySwitch').is(':checked')){

    //     // }
    //   // }
    // })

    $('#mySwitch').on('change', function () {
      if (this.checked)
        $('#checktype').prop('disabled', false);
      else
      $('#checktype').prop('disabled', true);
  });
});

function deleteConfirmation(id) {
  // console.log(id);
  // console.log(key);
  swal({
    title: "Delete?",
    text: "Please ensure and then confirm!",
    type: "warning",
    showCancelButton: !0,
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "No, cancel!",
    reverseButtons: !0
    }).then(function (e) {
      if (e.value === true) {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
          type: 'DELETE',
          url: "/barang/delete/"+id+"/key",
          data: {_token: CSRF_TOKEN},
          dataType: 'JSON',
          success: function (results) {
            if (results.success === true) {
              swal("Done!", results.message, "success");
            } else {
              swal("Error!", results.message, "error");
            }
          }
        });
      } else {
        e.dismiss;
      }
    }, function (dismiss) {
      return false;
    })
  }

  // tag list
  // $(function() {
	// 	// If using Bootstrap 2, be sure to include:
	// 	// Tags.bootstrapVersion = "2";
	// 	$('#my-tag-list').tags({
	// 		tagData:["boilerplate", "tags"],
	// 		suggestions:["basic", "suggestions"],
	// 		excludeList:["not", "these", "words"]
	// 	});
	// });

  window.addEventListener('openAddPemeliharaanModal',function() {
    // console.log(event);
    // $('.addPemeliharaan').find('form')[0].reset();
    $('.addPemeliharaan').modal('show');  
  })

  window.addEventListener('openRiwayatPemeliharaanModal',function(params) {
    $('.riwayatPemeliharaan').modal('show');  
    // console.log(params.detail.data);
    const items = params.detail.data;
    $('.modal-content').find('span').html(`${items[0].kategori_fk} ${items[0].merek} [${items[0].barang_fk} ]`);
    const tableBody = document.getElementById('rowitem');
    let dataHtml = ``;
    if (items.length > 0) {
      items.forEach((el,i) => {
                dataHtml += `<tr><td>${i+1}</td><td>${el.tgl_pemeliharaan}</td><td>${el.tindakan}</td><td>${el.pelaksana}</td><td>${el.kondisi_sebelum}</td></tr>`
            });
      tableBody.innerHTML = dataHtml;
    }
  })

$(document).on('change', '#select-kategori', function() {
  let nameitem = $(this).val();
  $.ajax({
      type: 'get',
      url: '/find-kode',
      data: {'key':nameitem},
      // dataType: 'json',
      cache: false,
      success: function(data){
        console.log(data);
          $('#kode-bmn').val(data.kode_bmn);
          $('#tag').val(data.keyword);
          $('#satuan').val(data.satuan_fk);
          $('#jangka-pemeliharaan').val(data.jadwal_service);
          if (data.type == 1)
            $("#my-switch").prop("checked", true);
          else
            $("#my-switch").prop("checked", false);
      },
      error: function(){
          console.log('err');
      },
  });
});