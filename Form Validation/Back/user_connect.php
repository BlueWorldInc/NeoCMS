<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    .success {
        color: green;
    }
    .error {
        color: red;
    }
    </style>
    <title>Exemple</title>
</head>

<body>
    <?php
        // error_reporting(0);
        // variables
        $servername = "localhost";
        $username = "neocms";
        $password = "neocmspassword";
        $dbname = "neocmsdb";
        $tablename = "cmsuser";

        //Create connection
        $connection = new mysqli($servername, $username, $password, $dbname);

        //Check connection
        if ($connection->connect_error) {
            die("<div class='error'> Connection failed: " . $connection->connect_error . "</div>");
        } else {
            echo "<div class='success'> Connected succesfully </div>";
        }

        //INSERT
        
        //SQL Query
        // $sqlQuery = "insert into cmsuser (username)
        //     VALUES ('Charles Varrick')";

        // //Try to execute the query
        // if ($connection->query($sqlQuery) === TRUE) {
        //     echo "<br> <div class='success'> New record created successfully </div>";
        //     $last_id = $connection->insert_id;
        //     echo "<br> Last inserted ID is: " . $last_id;
        // } else {
        //     echo "<br> div class='error'> Error: " . $sqlQuery . "<br>" . $connection->error . "</div>";
        // }
        
        //RETRIEVE
        $sqlQuery = "select * from " . $tablename;
        $result = $connection->query($sqlQuery);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"] . " - UserName : " .$row["username"] . "<br>";
            }
        } else {
            echo "<br> 0 Results in the dabatase for the query";
        }




    ?>


    <?php
    echo "<br><br>Bonjour ";
    echo "<br>Je vais afficher les résultats de la requete mysql dans cette page.";
    ?>

    <?php
    echo "<br>Je vais essayer de me connecter à la base de donnée";
    ?>

</body>

</html>