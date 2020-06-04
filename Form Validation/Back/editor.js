let textArea = document.querySelector("#textArea");
let textEditorHelp = document.querySelector("#textEditorHelp");
textArea.addEventListener("input", countTextArea);
console.log();

function hello() {
    console.log(textArea.value.length);
    
}

function countTextArea() {
    let textLen = textArea.value.length;
    if (textLen > 0) {
        console.log(textArea.value);
        textEditorHelp.style = "display: initial; float: left; color: blue";
        if (textLen === 1) {
            textEditorHelp.textContent = "Le texte contient 1 caractère";
        } else {
            textEditorHelp.textContent = "Le texte contient " + textLen + " caractères";
        }
    } else {
        textEditorHelp.style = "display: none; float: left;";
    }
}