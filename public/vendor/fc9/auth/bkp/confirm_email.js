$('#submit').prop("disabled", true)
$('#submit').css("border", 0)
$('#submit').css("background-color", "lightgray")

var fullToken = function () {
        /* Enable submit button */
        let length = $('#type1').val().length
            + $('#type2').val().length
            + $('#type3').val().length
            + $('#type4').val().length
            + $('#type5').val().length
        $('#submit').prop("disabled", length !== 5)
        $('#submit').css("background-color", length !== 5 ? "lightgray" : "#009efb")
        return length === 5
    },
    clear = function () {
        $(this).val(function () {
            return ''
        })
    }

$('#type1').focus(clear)
$('#type2').focus(clear)
$('#type3').focus(clear)
$('#type4').focus(clear)
$('#type5').focus(clear)

$(':input').keyup(function () {
    /* Uppercase values */
    $(this).val(function () {
        return this.value.toUpperCase()
    })
    /* Move on to the next */
    if ($(this).val().length > 0)
        $(this).next(':input').focus()
    fullToken()
})

$('#confirmform').submit(function (event) {
    if (!fullToken()) {
        event.preventDefault()
        return
    }
    $('#submit').prop('disabled', true)
    $('#submit').css("background-color", "lightgray")
    $('#token').val(function () {
        return $('#type1').val() + $('#type2').val() + $('#type3').val() + $('#type4').val() + $('#type5').val()
    });
    return
})