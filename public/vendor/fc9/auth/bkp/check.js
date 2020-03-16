
$('#submit').prop("disabled", true)
$('#submit').css("border", 0)
$('#submit').css("background-color", "lightgray")

var filledFields = function () {
    let no = ($('input[name=indicator]').val().length < 6 ||
        $('input[name=indicator]').val().length > 18 ||
        $('input[name=email]').val().length < 8 ||
        $('input[name=email]').val().length > 45 ||
        !$('#checkbox-signup').is(':checked'))
    $('#submit').prop("disabled", no)
    $('#submit').css("background-color", no ? "lightgray" : "#009efb")
    return !no
}

$(':input').keyup(function () {
    if ($(this).val().length > 5)
        filledFields()
})
$('#checkbox-signup').change(function () {
    filledFields()
})

$('#checkform').submit(function (event) {
    if (!filledFields()) {
        event.preventDefault()
        return
    }
    $('#submit').prop('disabled', true)
    $('#submit').css("background-color", "lightgray")
    return
})