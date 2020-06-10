<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiny MCE</title>
    <script src="https://cdn.tiny.cloud/1/y84gubctk4c2si9cv8fdojrw6e62qdlabmrnr1cvh3zkp4p7/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea',
            language: 'fr_FR'
        });
    </script>
</head>

<body>
    <h1>TinyMCE Quick Start Guide</h1>
    <form method="post">
        <textarea id="mytextarea" name="mytextarea">
      Hello, World!
    </textarea>
    </form>
</body>

</html>