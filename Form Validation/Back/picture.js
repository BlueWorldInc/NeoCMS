let showGaleryBtn = document.querySelector("#showGaleryBtn");
let uploadPicBtn = document.querySelector("#uploadPicBtn");

let galeryContainer = document.querySelector(".galeryContainer");
let uploadPicBox = document.querySelector(".uploadPicBox");

showGaleryBtn.addEventListener("click", showGalery);
uploadPicBtn.addEventListener("click", showUploadPicBox);

function showGalery() {
    hideUploadPicBox();
    galeryContainer.style.display = "inline-grid";
}

function hideGalery() {
    galeryContainer.style.display = "none";
}

function hideUploadPicBox() {
    uploadPicBox.style.display = "none";
}

function showUploadPicBox() {
    hideGalery();
    uploadPicBox.style.display = "initial";
}