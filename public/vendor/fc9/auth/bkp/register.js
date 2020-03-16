var form = document.querySelector("#registerform"),
    input = document.querySelector("#phone"),
    country = document.querySelector("#country"),
    iti = window.intlTelInput(input, {
        utilsScript: "/component/intl-tel-input-16.0.0/build/js/utils.js?1562189064761" // just for formatting/placeholders etc
    }),
    errorMsg = document.getElementById('show'),

    reset = function () {
        input.classList.remove("phone_error")
        errorMsg.innerHTML = ""
        errorMsg.classList.remove('visible')
    },

    validatePhone = function () {
        reset();
        if (input.value.trim()) {
            if (iti.isValidNumber()) {
                return true
            }
            input.classList.add("phone_error")
            let map = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"]
            errorMsg.innerHTML = map[iti.getValidationError()]
            errorMsg.classList.add('visible')
        }
        return false
    }

country.addEventListener('change', function () {
    iti.setCountry(this.value)
    validatePhone()
})

iti.setCountry(country.value)

input.addEventListener('change', reset)
input.addEventListener('keyup', reset)
input.addEventListener('blur', validatePhone)
form.addEventListener("submit", validatePhone)

$('#registerform').submit(function () {
    $(this).find('input[type=submit]').prop('disabled', true)
})