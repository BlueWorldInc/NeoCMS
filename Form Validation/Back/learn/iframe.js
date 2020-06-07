// let iframe = document.querySelector("#testIframe");

// iframe.contentDocument.designMode = "on";

// iframe.execCommand("bold",false, aArg);
// iframe.contentDocument.focus();
// console.log(iframe);

function load() {
    getIFrameDocument("testIframe").designMode = "On";
}


function getIFrameDocument(aID) {
    // if contentDocument exists, W3C compliant (Mozilla)
    if (document.getElementById(aID).contentDocument) {
        return document.getElementById(aID).contentDocument;
    } else {
        // IE
        return document.frames[aID].document;
    }
}

function doRichEditCommand(aName) {
    getIFrameDocument('testIframe').execCommand(aName, false, null);
    document.getElementById('testIframe').contentWindow.focus()
}