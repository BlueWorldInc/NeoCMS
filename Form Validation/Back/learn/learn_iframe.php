<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iframe</title>
</head>
<body contentEditable="true" onload="load()">
    <!-- <iframe id="testIframe" src="https://stackoverflow.com/questions/6007242/how-to-create-a-rich-text-editor"> -->
    <iframe id="testIframe" height="700px" width="90%" src="http://localhost/NEOCMS/Back/">
    </iframe>
    <div class="lok">aaaalmakaro</div>
    <div class="lok">aaaalmakaro</div>
    <div class="lok">aaaalmakaro</div>
    <div class="lok">aaaalmakaro</div>
    <div class="lok">aaaalmakaro</div>
    <button onclick="doRichEditCommand('bold')">B</button>
    <script src="iframe.js"></script>
</body>
</html>