<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disconnection</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>

<body>

    <?php
    include("includes/menu.php");
    session_start();
    if (empty($_SESSION['connected'])) {
        $_SESSION['connected'] = false;
    }
    if ($_SESSION['connected']) {
        $_SESSION['connected'] = false;
        echo "<br>Vous etes deconnecté.";
        // header("Location: " .$_SERVER['PHP_SELF']);
        // exit();
    } else {
        echo "<div class='container formValidationContainer card bg-light col-md-offset-3 col-md-6'>";
        echo "<br><p>Bonjour ";
        echo "<br>Vous etes deconnecté.";
        echo "<br>Cliquez ci-dessous si vous souhaitez vous reconnecter.";
        echo "<br><a href='connection.php'><button>Connection</button></a>";
        echo "</div>";
    }

    ?>
</body>

</html>