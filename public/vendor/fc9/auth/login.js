const fields = [...document.querySelectorAll('.field__form-input')],
    checkboxRemember = document.querySelector('#remember'),
    mobileCheckbox = document.querySelector('#mobile-checkbox'),
    mobileCheckboxLabels = [...document.querySelectorAll('.mobile-checkbox__label span')],
    btnSubmit = document.querySelector('#submit'),

    cantSubmit = () => {
        return !/* checkboxRemember.checked && */ fields.reduce((acc, field) => {
            return acc && field.value.length >= field.minLength && field.value.length <= field.maxLength
        }, true)
    },

    onChange = () => {
        if (checkboxRemember.checked) {
            mobileCheckbox.classList.add('mobile-checkbox--checked')
        } else {
            mobileCheckbox.classList.remove('mobile-checkbox--checked')
        }
        btnSubmit.disabled = cantSubmit()
    }

fields.forEach(field => field.addEventListener('keyup', () => btnSubmit.disabled = cantSubmit()))

checkboxRemember.checked = false
checkboxRemember.addEventListener('change', onChange)

mobileCheckboxLabels.forEach(span => span.addEventListener('click', () => {
    checkboxRemember.checked = !checkboxRemember.checked
    onChange()
}))

btnSubmit.disabled = cantSubmit()
btnSubmit.addEventListener('click', event => {
    if (cantSubmit())
        event.preventDefault()
})