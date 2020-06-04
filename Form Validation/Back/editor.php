<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
    <?php
    ini_set("xdebug.var_display_max_children", -1);
    ini_set("xdebug.var_display_max_data", -1);
    ini_set("xdebug.var_display_max_depth", -1);
    include("includes/menu.php");
    session_start();
    if (empty($_SESSION['connected'])) {
        $_SESSION['connected'] = false;
    }
    $submitedText = "";
    $submitedTextError = "";
    $submitedTextSuccess = "";
    $formIsValid = true;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["textArea"])) {
            $submitedTextError = "Text is required";
            $formIsValid = false;
        } else {
            var_dump($_POST["textArea"]);
            var_dump(mb_strlen($_POST["textArea"], "UTF-8"));
            if (mb_strlen($_POST["textArea"], "UTF-8") > 1000) {
                $submitedTextError = "Submitted text is too long, it need to be less than 1000 characters.";
                $formIsValid = false;
            } else {
                $submitedText = $_POST["textArea"];
                $submitedTextSuccess = "Text have been successfully sent.";
            }
        }
    }



    if ($_SESSION['connected']) {
    ?>
        <h2 class="welcomeText">
            Bienvenue sur la page de l'editeur !
        </h2>
        <div class='textEditorGroup card'>
            <form style='padding: 0em;' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="editor-form" novalidate="novalidate">
                <small class="error"><?php echo $submitedTextError ?></small>
                <small class="success"><?php echo $submitedTextSuccess ?></small>
                <div class="form-group">
                    <label for="textArea">Editeur de texte</label>
                    <textarea name="textArea" class="form-control textEditor" id="textArea" rows="19" cols="150"></textarea>
                </div>
                <div style='text-align:right;' class="form-group">
                    <small style="display: none; float: left;" id="textEditorHelp">Is Required and be at least 4 characters long.</small>
                    <input type="submit" name="submit" value="Envoyer" class="btn btn-primary">
                </div>
            </form>
        </div>
    <?php
    } else {
        echo "<div class='formValidationContainer card'>Vous devez etre connecter pour visualiser cette page";
        echo "<br><a href='connection.php'><button>Connection</button></a></div>";
    }
    ?>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $formIsValid && $_SESSION['connected']) {

        $mysql_servername = "localhost";
        $mysql_username = "neocms";
        $mysql_password = "neocmspassword";
        $mysql_dbname = "neocmsdb";
        $mysql_tablename = "cmspost";

        //Create connection
        $connection = new mysqli($mysql_servername, $mysql_username, $mysql_password, $mysql_dbname);

        //Check connection
        if ($connection->connect_error) {
            die("<div class='error'> Connection failed: " . $connection->connect_error . "</div>");
        } else {
            echo "<div class='success'> Connected succesfully </div>";
        }

        // SQL Query

        $sqlQuery = "insert into " . $mysql_tablename . " (post_content) VALUES ("
            . "'" . $submitedText . "'" .
            ")";

        //Try to execute the query
        if ($connection->query($sqlQuery) === TRUE) {
        } else {
            echo "<br> div class='error'> Error: " . $sqlQuery . "<br>" . $connection->error . "</div>";
        }
    }
    ?>
    <script src="editor.js"></script>
</body>

</html>