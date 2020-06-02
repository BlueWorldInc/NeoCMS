<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>

<body>

    <?php
    require "lib/password.php"; //is required to execute password hash because php version is lesser than 5.5 
    // define variables
    $name = "";
    $password = "";

    $nameError = "";
    $passwordError = "";

    $formIsValid = true;

    // get this variables
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["name"])) {
            $nameError = "Name is required";
            $formIsValid = false;
        } else {
            $name = cleanInput($_POST["name"]);
            if (!validateName($name) || strlen($name) < 4) {
                $nameError = "Name must be at least 4 characters long and contain only alphabets/space characters.";
                $formIsValid = false;
            }
        }

        if (empty($_POST["password"])) {
            $passwordError = "Password is required";
            $formIsValid = false;
        } else {
            $password = cleanInput($_POST["password"]);
            if (strlen($name) < 4 || strlen($name) > 20) {
                $passwordError = "Password must be 4-20 characters long.";
                $formIsValid = false;
            }
        }

    }

    function cleanInput($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    function validateName($inputName) {
        $nameRegex = "/^[a-zA-Z ]*$/";
        if(preg_match($nameRegex, $inputName)) {
            return true;
        } else {
            return false;
        }
    }

    function notSecureHashPassword($password) {
        return md5($password);
    }

    ?>

    <div class="formValidationContainer container">
        <div class="card bg-light col-md-offset-3 col-md-6">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="connection-form" novalidate="novalidate">

                <h2>Connection</h2>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (!$formIsValid) {
                        echo '<small class="error"> Form is not valid </small>';
                    } else {
                        echo '<small class="success"> Form is valid </small> <br>';
                    }
                }
                ?>
                <br>
                <div id="form-content">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?php echo $name ?>" >
                        <small style="display: none" id="nameHelp" class="text-danger">Is Required and be at least 4 characters long.</small>
                        <small class="error"><?php echo $nameError ?></small>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                        <small style="display: none" id="passwordHelp" class="text-danger">Is Required and be 4-20 characters long.</small>
                        <small class="error"><?php echo $passwordError ?></small>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                    </div>
                    
                    <?php
                    // if ($_SERVER["REQUEST_METHOD"] == "POST" && $formIsValid) {

                        $mysql_servername = "localhost";
                        $mysql_username = "neocms";
                        $mysql_password = "neocmspassword";
                        $mysql_dbname = "neocmsdb";
                        $mysql_tablename = "cmsusercomplete";

                        //Create connection
                        $connection = new mysqli($mysql_servername, $mysql_username, $mysql_password, $mysql_dbname);

                        //Check connection
                        if ($connection->connect_error) {
                            die("<div class='error'> Connection failed: " . $connection->connect_error . "</div>");
                        } else {
                            echo "<div class='success'> Connected succesfully </div>";
                        }

                        // SQL Query
                        
                        // $sqlQuery = "select * from" . $mysql_tablename . " where username=".$name;
                        $sqlQuery = "select * from " . $mysql_tablename . " where username='".$name."'";
                        $result = $connection->query($sqlQuery);
                        // Try to get the data for username
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<br>".$password;
                                echo "<br>".$row["password"];
                                echo "<br>end";
                                // if ($row["password"] == notSecureHashPassword($password)) {
                                if (password_verify($password, $row["password"])) {
                                    echo "<div class='success'> password is correct </div>";
                                } else {
                                    echo "<div class='error'> password is incorrect </div>";
                                }
                                echo "id: " . $row["id"] . " - UserName : " .$row["username"] . "<br>";
                            }
                        } else {
                            echo "<br> 0 Results in the dabatase for the query";
                        }

                    // }
                    ?>
                </div>
            </form>
        </div>
    </div>
    <script src="connection_script.js"></script>
</body>

</html>