let registerForm = document.querySelector("#connection-form");
registerForm.onsubmit = isValidForm;

let nameField = {name: "name", input: document.querySelector("#name"), helper: document.querySelector("#nameHelp")};
let passwordField =  {name: "password", input: document.querySelector("#password") , helper: document.querySelector("#passwordHelp")};

let fields = [nameField, passwordField];

function isValidForm() {
    resetErrorMessages();
    let formValid = true;
    if (!validField(nameField)) {
        formValid = false;
    }
    if (!validField(passwordField)) {
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

function validField(field) {
    let formValid = true;
    if (!field.input || !field.input.value) {
        formValid = false;
    } else {

        //Specific validation
        if(field.name === "name") {
            if (field.input.value.length < 4) {
                formValid = false;
            }
        } else if (field.name === "password") {
            if (field.input.value.length < 4 || field.input.value.length > 20) {
                formValid = false;
            }
        }

    }

    if (formValid) {
        return formValid;
    } else {
        field.helper.style = "display: initial";
        return formValid;
    }
}