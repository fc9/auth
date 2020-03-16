const fields = [...document.querySelectorAll('.mfafield__input')],
    btnSubmit = document.querySelector('#submit'),
    form = document.querySelector('#sign_up-step3-form'),
    alert = document.querySelector('.alert-danger'),

    cantSubmit = () => {
        return fields.reduce((acc, field) => {
            return acc + field.value.length
        }, 0) !== 5
    },
    focusNext = (e) => {
        let target = e.srcElement || e.target
        if (target.value.length > 0) {
            let next = target.name.charAt(target.name.length - 1)
            form.elements[next].focus()
            btnSubmit.disabled = cantSubmit()
        }
        if (alert !== null) {
            alert.style.display = 'none'
        }
    },
    onFocus = (e) => {
        let target = e.srcElement || e.target
        target.value = ''
        btnSubmit.disabled = cantSubmit()
    }

fields.forEach(field => field.addEventListener('keyup', focusNext))
fields.forEach(field => field.addEventListener('focus', onFocus))

btnSubmit.disabled = cantSubmit()
btnSubmit.addEventListener('click', event => {
    if (cantSubmit())
        event.preventDefault()
})