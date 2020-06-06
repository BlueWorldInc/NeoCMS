<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="posts.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Post List</title>
</head>

<body>

    <?php
    include("includes/menu.php");
    echo '<h2 class="welcomeText">Post List</h2>';
    // variables
    $servername = "localhost";
    $username = "neocms";
    $password = "neocmspassword";
    $dbname = "neocmsdb";
    $tablename = "cmspost";

    //Create connection
    $connection = new mysqli($servername, $username, $password, $dbname);

    //Check connection
    if ($connection->connect_error) {
        die("<div class='error'> Connection failed: " . $connection->connect_error . "</div>");
    } else {
        // echo "<div class='success'> Connected succesfully </div>";
    }

    // echo '
    // <div class="card custom-control custom-switch">
    // <input type="checkbox" class="custom-control-input" id="cleanShow">
    // <label class="custom-control-label" for="cleanShow">Clean Show</label>
    // </div>';

    //RETRIEVE
    $sqlQuery = "select * from " . $tablename;
    $result = $connection->query($sqlQuery);
    if ($result->num_rows > 0) {
        $actual_row_number = 1;
        echo "<div class='textEditorGroup'>";
        while ($row = $result->fetch_assoc()) {
            echo "<div class='cards' style='display:auto;'><div class='card bg-light'>";
            echo "<div class='post_ids' style='display:initial;'> Post id: " . $row['id'] . "<br></div>";
            echo "<div class='post_contents_tag' style='display:initial;'> Post content: <br></div><div class='post_contents'>" . $row['post_content'] . "</div><br>";
            echo "<div class='post_dates' style='display:initial;'> Post date: " . $row['post_date'] . "<br></div>";
            echo "<br></div><br></div>";
        }
        echo "</div>";
    } else {
        echo "<br> 0 Results in the dabatase for the query";
    }




    ?>

  <script>
    <?php
    include("includes/menu_options.js");
    ?>
  </script>
    <!-- <script src="posts.js"></script> -->

</body>

</html>