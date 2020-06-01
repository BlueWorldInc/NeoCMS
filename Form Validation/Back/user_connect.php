<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple</title>
</head>

<body>
    <?php
        // error_reporting(0);
        // variables
        $servername = "localhost";
        $username = "nesocms";
        $password = "neocmspassword";

        //Create connection
        $connection = new mysqli($servername, $username, $password);

        //Check connection
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        } else {
            echo "Connected succesfully";
        }


    ?>


    <?php
        echo "Bonjour ";
        echo "Je vais afficher les résultats de la requete mysql dans cette page.";
    ?>

    <?php
        echo "Je vais essayer de me connecter à la base de donnée";
    ?>

</body>

</html>