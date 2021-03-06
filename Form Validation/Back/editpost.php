<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="editpost.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Post Editor</title>
    <script src="https://cdn.tiny.cloud/1/y84gubctk4c2si9cv8fdojrw6e62qdlabmrnr1cvh3zkp4p7/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#textArea',
            language: 'fr_FR'
        });
    </script>
</head>

<body>

    <?php
    include("includes/menu.php");
    include("connect_to_db.php");
    if ($_SERVER["REQUEST_METHOD"] == "GET") {

        $post_content = connectDb("cmspost", ($_GET['postid']));
    } else {
        $post_content = $_POST["textArea"];
        $post_id = $_POST["postidd"];
        updateContent("cmspost", $post_id, $post_content);
    }
    echo "<h2 class='welcomeText'>Bienvenue sur la page d'édition de post</h2>";
    echo " <br>";
    ?>
    <div class='textEditorGroup card'>
        <form style='padding: 0em;' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="editor-form" novalidate="novalidate">
            <div class="form-group">
                <label for="textArea">Editeur de texte</label>
                <textarea autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" name="textArea" class="form-control textEditor" id="textArea" rows="19" cols="150"><?php echo $post_content ?></textarea>
            </div>
            <div class="form-group" style="display:none;">
                <input type="text" name="postidd" value="<?php if ($_SERVER["REQUEST_METHOD"] == "GET") {
                                                                echo $_GET['postid'];
                                                            } else {
                                                                echo $post_id;
                                                            } ?>">
            </div>
            <div style='text-align:right;' class="form-group">
                <input type="submit" name="submit" value="Envoyer" class="btn btn-primary">
            </div>
        </form>
    </div>
    <?php
    echo "<br>";
    ?>
    <script>
        tinymce.settings.width = window.innerWidth * 90 / 100;
        window.addEventListener("resize", resizeEditor);

        function resizeEditor() {
            let tox = document.querySelector(".tox");
            tox.style.width = (window.innerWidth * 90 / 100) + "px";
        }
    </script>
</body>

</html>