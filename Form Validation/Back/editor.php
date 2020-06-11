<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="lib/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#textArea',
            language: 'fr_FR',
            width: 200,
            branding: false,
            resize:false
        });

    </script>
</head>

<body>
    <?php
    ini_set("xdebug.var_display_max_children", -1);
    ini_set("xdebug.var_display_max_data", -1);
    ini_set("xdebug.var_display_max_depth", -1);
    include("includes/menu.php");
    include("connect_to_db.php");
    session_start();
    if (empty($_SESSION['connected'])) {
        $_SESSION['connected'] = false;
    }
    $submitedText = "";
    $submitedTextError = "";
    $submitedTextSuccess = "";
    $formIsValid = true;

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['postid'])) {
            $submitedText = connectDb("cmspost", ($_GET['postid']));
            // need verification if postid exist before changing mode to edit...
            $mode = "edit";
            $postid = $_GET['postid'];
        } else {
            $mode = "add";
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["mode"])) {
            $mode = $_POST["mode"];
        } else {
            $mode = "add";
        }
        if (isset($_POST["postid"])) {
            $postid = $_POST["postid"];
        } else {
            $postid = null;
        }
        // echo $mode;
        // echo $postid;
        if (empty($_POST["textArea"])) {
            $submitedTextError = "Text is required";
            $formIsValid = false;
        } else {
            // var_dump($_POST["textArea"]);
            // var_dump(mb_strlen(cleanInput($_POST["textArea"]), "UTF-8"));
            if (mb_strlen(cleanInput($_POST["textArea"]), "UTF-8") > 5000) {
                $submitedTextError = "Submitted text is too long, it need to be less than 5000 characters.";
                $formIsValid = false;
            } else {
                $submitedText = $_POST["textArea"];
                $submitedTextSuccess = "Text have been successfully sent.";
            }
        }
    }

    function cleanInput($input)
    {
        $input = str_replace(array("\r\n"), '\n', $input);
        $input = trim($input);
        $input = stripslashes($input);
        return $input;
    }


    if ($_SESSION['connected']) {
        include("picture.php");
    ?>
        <h2 id="abse" class="welcomeText">
            Bienvenue sur la page de l'editeur !
        </h2>
        <div class='textEditorGroup card'>
            <form style='padding: 0em;' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="editor-form" novalidate="novalidate">
                <small class="error"><?php echo $submitedTextError ?></small>
                <small class="success"><?php echo $submitedTextSuccess ?></small>
                <div class="form-group">
                    <label for="textArea">Editeur de texte</label>
                    <textarea autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" name="textArea" class="form-control textEditor" id="textArea" rows="19" cols="150"><?php echo $submitedText ?></textarea>
                </div>
                <div style='text-align:right;' class="form-group">
                    <small style="display: none; float: left;" id="textEditorHelp">Is Required and be at least 4 characters long.</small>
                    <div class="form-group" style="display:none;">
                        <input type="text" name="mode" value="<?php echo $mode ?>">
                        <input type="text" name="postid" value="<?php echo $postid ?>">
                    </div>
                    <input type="submit" name="submit" value="<?php if (isset($mode) && $mode == "edit") {echo "Editer"; } else { echo "Envoyer";} ?>" class="btn btn-primary">
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

        if ($mode == "edit") {
            updateContent("cmspost", $postid, $submitedText);
        } else {

        $mysql_servername = "localhost";
        $mysql_username = "neocms";
        $mysql_password = "neocmspassword";
        $mysql_dbname = "neocmsdb";
        $mysql_tablename = "cmspost";
            
        //Several people misread this as a question about how to store passwords in a database. That is wrong. It is about how to store the password that lets you get to the database.
        //The usual solution is to move the password out of source-code into a configuration file. Then leave administration and securing that configuration file up to your system administrators. That way developers do not need to know anything about the production passwords, and there is no record of the password in your source-control.


        //Create connection
        $connection = new mysqli($mysql_servername, $mysql_username, $mysql_password, $mysql_dbname);

        //Check connection
        if ($connection->connect_error) {
            die("<div class='error'> Connection failed: " . $connection->connect_error . "</div>");
        } else {
            echo "<div class='success'> Connecteds succesfully </div>";
            echo "hey";
        }

        // SQL Query

        $sqlQuery = "insert into " . $mysql_tablename . " (post_content) VALUES ("
            . "'" . $submitedText . "'" .
            ")";

        $sqlQueryPrepared = $connection->prepare("INSERT INTO " . $mysql_tablename . " (post_content) VALUES (?)");
        $sqlQueryPrepared->bind_param("s", $submitedText);


        // Try to execute the query
        if ($sqlQueryPrepared->execute() == TRUE) {
            echo "<div class='success'> Connected succesfully </div>";
        } else {
            echo "<br> <div class='error'> Error: " . $sqlQuery . "<br>" . $connection->error . "</div>";
        }
    }

    }

    ?>
    <script src="editor.js"></script>
</body>

</html>