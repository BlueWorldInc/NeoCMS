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
    // define variables
    $name = "";
    $email = "";
    $password = "";
    $city = "";
    $gender = "";

    $nameError = "";
    $emailError = "";
    $passwordError = "";
    $cityError = "";
    $genderError = "";

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

        if (empty($_POST["city"])) {
            $cityError = "City is required";
            $formIsValid = false;
        } else {
            $city = cleanInput($_POST["city"]);
            if ($city != "Valence" && $city != "Lyon") {
                $cityError = "Must be a valid city.";
                $formIsValid = false;
            }
        }

        if (empty($_POST["email"])) {
            $emailError = "Email is required";
            $formIsValid = false;
        } else {
            $email = cleanInput($_POST["email"]);
        }

        if (empty($_POST["gender"])) {
            $genderError = "Gender is required";
            $formIsValid = false;
        } else {
            $gender = cleanInput($_POST["gender"]);
            if ($gender != "Male" && $gender != "Female") {
                $cityError = "Gender must be correct.";
                $formIsValid = false;
            }
        }

        // $email = cleanInput($_POST["email"]);
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

    ?>

    <div class="formValidationContainer container">
        <div class="card bg-light col-md-offset-3 col-md-6">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="register-form" novalidate="novalidate">

                <h2>Registration form</h2>
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
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" value="<?php echo $email ?>">
                        <small style="display: none" id="emailHelp" class="text-danger">Is Required and must be a valid email.</small>
                        <small class="error"><?php echo $emailError ?></small>
                    </div>

                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" name="city" id="city" class="form-control" value="<?php echo $city ?>">
                        <small style="display: none" id="cityHelp" class="text-danger">Is Required and be a valid city (Lyon or Valence).</small>
                        <small class="error"><?php echo $cityError ?></small>
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <div class="form-check">
                            <input type="radio" name="gender" id="male" value="Male" class="form-check-input" <?php if (isset($gender) && $gender == "Male") echo "checked"?>>
                            <label for="male" class="form-check-label">Male</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="gender" id="female" value="Female" class="form-check-input" <?php if (isset($gender) && $gender == "Female") echo "checked"?>>
                            <label for="female" class="form-check-label">Female</label>
                        </div>
                        <small style="display: none" id="genderHelp" class="text-danger">Must be checked.</small>
                        <small class="error"><?php echo $genderError ?></small>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                    </div>
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && $formIsValid) {

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
                        
                        $sqlQuery = "insert into " . $mysql_tablename . " (username, password, email, city, gender) VALUES ("
                        ."'".$name."'".
                        ', '
                        ."'".$password."'".
                        ', '
                        ."'".$email."'".
                        ', '
                        ."'".$city."'".
                        ', '
                        ."'".$gender."'".
                        ")";

                        //Try to execute the query
                        if ($connection->query($sqlQuery) === TRUE) {
                            echo "<br> <div class='success'> New record created successfully </div>";
                            $last_id = $connection->insert_id;
                            echo "<br> Last inserted ID is: " . $last_id;
                            header("Location: action.php");
                        } else {
                            echo "<br> div class='error'> Error: " . $sqlQuery . "<br>" . $connection->error . "</div>";
                        }

                    }
                    ?>
                </div>
            </form>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>