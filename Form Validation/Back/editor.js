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

// function mb_strlen(str) {
//     var len = 0;
//     for(var i = 0; i < str.length; i++) {
//         len += str.charCodeAt(i) < 0 || str.charCodeAt(i) > 255 ? 2 : 1;
//     }
//     return len;
// }

// function mb_strlen (s) {
//     return ~-encodeURI(s).split(/%..|./).length;
//   }

tinymce.settings.width = window.innerWidth * 90 / 100;
window.addEventListener("resize", resizeEditor);
function resizeEditor() {
    let tox = document.querySelector(".tox");
    tox.style.width = (window.innerWidth * 90 / 100) + "px";
}