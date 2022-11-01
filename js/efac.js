"use strict";

let contact_form =
  document.getElementById("contact-form") 
  function disable_form() {
    let elements = contact_form.elements;
    for (var i = 0, len = elements.length; i < len; ++i) {
      elements[i].readOnly = true;
    }
  };
contact_form.addEventListener("submit", function (event) {
  event.preventDefault();
  let submit_button = document.getElementById("submit_contact_form");
  submit_button.value = "...";
  submit_button.setAttribute("disabled", "disabled");

  grecaptcha.ready(function () {
    grecaptcha
      .execute("6LeYsM4iAAAAABLcLi8kyUJ4h2XXpAWPts6WA7ju", {
        action: "contact",
      })
      .then(function (token) {
        const data = new FormData(contact_form);
        data.append("recaptcha_response", token);
        const request = {
          method: "POST",
          body: data,
        };
        fetch("/contact.php", request)
          .then((response) => response.json())
          .then((data) => {
            if (data.result == "ok") {
              disable_form();
              submit_button.value = "OK";
            } else {
              console.log(response_data.result);
            }
          });
      });
  });
});
