// Validate the field name.
function validateName() {
    const name = document.getElementById("name").value;
    const nameErr = document.getElementById("name-err");
    if (!name) {
        nameErr.innerHTML = "* The name can not be empty.";
        return false;
    }
    else if (name.length < 3) {
        nameErr.innerHTML = "* The length of name should be at least 3 characters.";
        return false;
    }
    else {
        nameErr.innerHTML = "";
        return true;
    }
}

// Validate the field email.
function validateEmail() {
    const email = document.getElementById("email").value;
    const emailErr = document.getElementById("email-err");
    if (!email) {
        emailErr.innerHTML = "* The email can not be empty.";
        return false;
    }
    else if (email.length < 5) {
        emailErr.innerHTML = "* The length of email should be at least 5 characters.";
        return false;
    }
    else if (email.indexOf("@") === -1) {
        emailErr.innerHTML = "* Please input a valid email with the character @.";
        return false;
    }
    else {
        emailErr.innerHTML = "";
        return true;
    }
}

// Validate the field tel.
function validateTel() {
    const tel = document.getElementById("tel").value;
    const telErr = document.getElementById("tel-err");
    if (!tel) {
        telErr.innerHTML = "* The tel can not be empty.";
        return false;
    }
    else if (tel.length < 5) {
        telErr.innerHTML = "* The length of tel should be at least 5 characters.";
        return false;
    }
    else if (!isValidTel(tel)) {
        telErr.innerHTML = "* Please input a valid telephone number.";
        return false;
    }
    else {
        telErr.innerHTML = "";
        return true;
    }
}

// Return true when the value includes "+", " ", or numbers.
function isValidTel(value) {
    for (let i = 0; i < value.length; i++) {
        let char = value[i];
        if (!(char === '+' || char === ' ' || (char >= '0' && char <= '9'))) {
            return false;
        }
    }
    return true;
}

// Validate the field url.
function validateUrl() {
    const url = document.getElementById("url").value;
    const urlErr = document.getElementById("url-err");
    if (!url) {
        urlErr.innerHTML = "* The url can not be empty.";
        return false;
    }
    else if (url.length < 5) {
        urlErr.innerHTML = "* The length of url should be at least 5 characters.";
        return false;
    }
    else if (!url.startsWith("http")) {
        urlErr.innerHTML = "* The url should be start with http.";
        return false;
    }
    else {
        urlErr.innerHTML = "";
        return true;
    }
}

// Validate the field address.
function validateAddress() {
    const address = document.getElementById("address").value;
    const addressErr = document.getElementById("address-err");
    if (!address) {
        addressErr.innerHTML = "* The address can not be empty.";
        return false;
    }
    else if (address.length < 5) {
        addressErr.innerHTML = "* The length of address should be at least 5 characters.";
        return false;
    }
    else {
        addressErr.innerHTML = "";
        return true;
    }
}

document.getElementById("name").addEventListener("input", validateName);
document.getElementById("email").addEventListener("input", validateEmail);
document.getElementById("tel").addEventListener("input", validateTel);
document.getElementById("url").addEventListener("input", validateUrl);
document.getElementById("address").addEventListener("input", validateAddress);
