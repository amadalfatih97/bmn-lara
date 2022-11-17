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

    console.log($('#mySwitch').val());
    
    $('#mySwitch').on('change',(res)=>{
      // function (res) {
        console.log(res);
        
      // }
    })
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