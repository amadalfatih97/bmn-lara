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
