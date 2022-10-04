console.log('js aktiv');
if($("#finishCheck").is(":checked")) // "this" refers to the element that fired the event
    {
        $('#inputKembali').prop('disabled', false);
        $('#inputKembali').prop('required', true);
    }else{
        $('#inputKembali').prop('disabled', true);
        $('#inputKembali').prop('required', false);
    }
$("#finishCheck").click(function() {
    // this function will get executed every time the #home element is clicked (or tab-spacebar changed)
    if($(this).is(":checked")) // "this" refers to the element that fired the event
    {
        $('#inputKembali').prop('disabled', false);
        $('#inputKembali').prop('required', true);
    }else{
        $('#inputKembali').prop('disabled', true);
        $('#inputKembali').prop('required', false);
    }
});



// $(document).ready(function () {
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
//   });
