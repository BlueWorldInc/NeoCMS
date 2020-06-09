<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="learn_editor.css">
</head>

<body>
    <div class="container">
        <?php
        echo "Bonjour, je suis un script PHP !";
        ?>
        <br>
        <textarea id="mainTextArea"></textarea>
        <br>
        <button id="mainButton">click</button>
        <button id="boldBtn">Bold</button>
        <button id="cutBtn">Cut</button>
        <button id="colorBtn">Color</button>
        <button id="indentBtn">Indent</button>
        
        
        <div autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="rounded ctr" id="mainDiv" contenteditable="true">hel<span>l</span>o world</div>
        <br>

        <div style="user-select: none;" class="custom-control custom-switch">
          <input type="checkbox" class="custom-control-input" id="editableBtn">
          <label class="custom-control-label" for="editableBtn">Editable</label>
        </div>
        <div contentEditable="false" class="testt">alpha betha</div>
    </div>

    <script src="learn_editor.js"></script>
</body>

</html>