let mainButton = document.querySelector("#mainButton");
let textarea = document.querySelector("#mainTextArea");
let mainDiv = document.querySelector("#mainDiv");
let editableBtn = document.querySelector("#editableBtn");
// let alp = document.querySelector(".testt");

mainButton.addEventListener("click", SetToBold);
editableBtn.addEventListener("change", makeContentEditable);

let boldBtn = document.querySelector("#boldBtn");
let cutBtn = document.querySelector("#cutBtn");
let colorBtn = document.querySelector("#colorBtn");
let indentBtn = document.querySelector("#indentBtn");


boldBtn.addEventListener("click", SetToBold);
cutBtn.addEventListener("click", cutText);
colorBtn.addEventListener("click", changeColor);
indentBtn.addEventListener("click", indentText);


function hello() {
    console.log("hello");
}

function printTextArea() {
    console.log(mainDiv.selectionStart);
    console.log(mainDiv.selectionEnd);
    
}

function getSelectedText() {
    let s = window.getSelection();
    let textValue = s.anchorNode.nodeValue;
    console.log(textValue.substring(s.anchorOffset, s.focusOffset));
    console.log(s);

}

function selectText() {
    mainDiv.focus();
    mainDiv.setSelectionRange(2, 5);
}

function makeContentEditable() {
    if (editableBtn.checked) {
        mainDiv.contentEditable = "true";
    } else {
        mainDiv.contentEditable = "false";
    }
}

// alp.contentDocument.designMode = "Off";
// mainDiv.contentDocument.execCommand("bold", false, null);
// mainDiv.contentWindow.focus()

function init() {
    editableBtn.checked = true;
    makeContentEditable();
}

function SetToBold() {
    document.execCommand('bold', false, null);
}

function cutText() {
    document.execCommand('cut', false, null);
}

function changeColor() {
    document.execCommand("foreColor", false, "red");
}

function indentText() {
    document.execCommand("indent", false, null);
}

init();