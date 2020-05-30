let registerForm = document.querySelector("#register-form");
// registerForm.addEventListener("submit", hello);
// document.addEventListener("submit", hello);
registerForm.onsubmit = isValidForm;

let nameField = document.querySelector("#name");
let passwordField = document.querySelector("#password");
let cityField = document.querySelector("#city");
let maleField = document.querySelector("#male");
let femaleField = document.querySelector("#female");
let genderField = [maleField, femaleField]
let fields = [nameField, passwordField, cityField, genderField];


let nameHelp = document.querySelector("#nameHelp");
let passwordHelp = document.querySelector("#passwordHelp");
let cityHelp = document.querySelector("#cityHelp");
let genderHelp = document.querySelector("#genderHelp");
let helpers = [nameHelp, passwordHelp, cityHelp, genderHelp];

function hello() {
    // console.log(nameField);
    // if (nameField && nameField.value) {
    //     console.log("hello");
    // }
    // nameField.value ="up";
    return true;
}

function isValidForm() {
    resetErrorMessages();
    let formValid = true;
    if (nameField && !nameField.value) {
        nameHelp.style = "display: initial";
        formValid = false;
    }
    if (passwordField && !passwordField.value) {
        passwordHelp.style = "display: initial";
        formValid = false;
    }
    if (cityField && !cityField.value) {
        cityHelp.style = "display: initial";
        formValid = false;
    }
    if (!genderRadioExistAndChecked()) {
        genderHelp.style = "display: initial";
        formValid = false;
    }
    if (formValid) {
        console.log("valid");
        return true;
    } else {
        return false;
    }
}

function resetErrorMessages() {
    helpers.forEach(e => {
        e.style = "display: none";
    });
}

function genderRadioExistAndChecked() {
    let fieldChecked = false;
    genderField.forEach(e => {
        if (!e) { //check if each field actually exist 
            return false;
        } 
        if (e.checked) {
            console.log("cecked");
            fieldChecked = true;
        }
    });
    return fieldChecked;
}