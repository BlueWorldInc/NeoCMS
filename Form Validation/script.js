let registerForm = document.querySelector("#register-form");
// registerForm.addEventListener("submit", hello);
// document.addEventListener("submit", hello);
registerForm.onsubmit = isValidForm;

let nameField = {name: "name", input: document.querySelector("#name"), helper: document.querySelector("#nameHelp")};
let passwordField =  {name: "password", input: document.querySelector("#password") , helper: document.querySelector("#passwordHelp")};
let cityField =  {name: "city", input: document.querySelector("#city") , helper: document.querySelector("#cityHelp")};
let maleField =  document.querySelector("#male");
let femaleField =  document.querySelector("#female");
let genderField = {name: "gender", radios: [maleField, femaleField], helper: document.querySelector("#genderHelp")};

let fields = [nameField, passwordField, cityField, genderField];

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
    if (!validField(nameField)) {
        formValid = false;
    }
    if (!validField(passwordField)) {
        formValid = false;
    }
    if (!validField(cityField)) {
        formValid = false;
    }
    if (!genderRadioExistAndChecked()) {
        genderField.helper.style = "display: initial";
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
    fields.forEach(e => {
        e.helper.style = "display: none";
    });
}

function genderRadioExistAndChecked() {
    let fieldChecked = false;
    genderField.radios.forEach(e => {
        if (!e) { //check if each field actually exist 
            return false;
        } 
        if (e.checked) {
            fieldChecked = true;
        }
    });
    return fieldChecked;
}

function validField(field) {
    let formValid = true;
    if (field.input && !field.input.value) {
        formValid = false;
    }

    //Specific validation
    if(field.name === "name") {
        if (field.input.value.length < 4) {
            formValid = false;
        }
    } else if (field.name === "password") {
        if (field.input.value.length < 4 || field.input.value.length > 20) {
            formValid = false;
        }
    } else if (field.name === "city") {
        if (field.input.value !== "Valence" && field.input.value !== "Lyon") {
            formValid = false;
        }
    }

    if (formValid) {
        return formValid;
    } else {
        field.helper.style = "display: initial";
        return formValid;
    }
}