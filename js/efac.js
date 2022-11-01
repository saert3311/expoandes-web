'use strict'

let contact_form = document.getElementById('contact-form')

function disable_form(){
    let elements = contact_form.elements
    elements.foreach(ele => {
        ele.attr('disabled','disabled')
    })
}
contact_form.addEventListener('submit', function(event){
    event.preventDefault();
    let submit_button = document.querySelector('input[type="submit"]')
    submit_button.html('...').attr('disabled','disabled');

    grecaptcha.ready(function () {
        grecaptcha.execute('6LeYsM4iAAAAABLcLi8kyUJ4h2XXpAWPts6WA7ju', { action: 'contact' }).then(function (token) {
            const data = new FormData(this)
            data.append('recaptcha_response', token)
            const request = {
                method: 'POST',
                body: data
            }
            fetch('/contact.php', request)
            .then(response => {
                let data = response.json()
            })
            .then(data => {
            if (data.result == 'ok'){
                disable_form()
                submit_button.html('OK')
            }
            else {
                console.log(data.result)
            }
            })
        });
     });
})

