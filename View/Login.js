const EMAIL_FIELD = document.getElementsByName("email")[0];
const PASSWORD_FIELD = document.getElementsByName("password")[0];
const LOGIN_BUTTON = document.getElementById("login-button");
const EMAIL_REGEX = /.+@[A-Za-z0-9]+\..+/;

var validemail = false;
var validpassword = false;

EMAIL_FIELD.addEventListener("input", VerifyEmail);
PASSWORD_FIELD.addEventListener("input", VerifyPassword);

function VerifyEmail(e) {
    if (!EMAIL_REGEX.test(e.target.value)) {
        EMAIL_FIELD.style.color = "#f00";
        validemail = false;
    } else {
        EMAIL_FIELD.style.color = "#000";
        validemail = true;
    }

    EnableLoginButton();
}

function VerifyPassword(e) {
    if (e.target.value == "") validpassword = false;
    else validpassword = true;

    EnableLoginButton();
}

function EnableLoginButton() {
    LOGIN_BUTTON.disabled = true;
    if (validemail && validpassword) LOGIN_BUTTON.disabled = false;
}