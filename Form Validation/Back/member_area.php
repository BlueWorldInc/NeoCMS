<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection successfull</title>
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

        echo "<div class='container formValidationContainer card bg-light col-md-offset-3 col-md-6'>";
        echo "<p>Bonjour ";
        echo ",<br>";
        echo "Bienvenue dans l'espace membre.</p>";
        echo "<br>Vous pouvez maintenant visualiser le contenue de la page.";
        echo '<img src="res/panorama-3629120_1920.jpg" alt="Corn Field" width="600" height="300">';
    } else {
        echo "Vous avez besoin de vous connectez pour visualisez cette page.";
        echo "<br><a href='connection.php'><button>Connection</button></a>";
    }
        echo "</div>";

    ?>
</body>

</html>