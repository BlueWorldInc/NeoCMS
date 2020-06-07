<?php


    function connectDb($tablename, $postid) {

        // variables
        $servername = "localhost";
        $username = "neocms";
        $password = "neocmspassword";
        $dbname = "neocmsdb";
        
        //Create connection
        $connection = new mysqli($servername, $username, $password, $dbname);
        
        //Check connection
        if ($connection->connect_error) {
            die("<div class='error'> Connection failed: " . $connection->connect_error . "</div>");
        } else {
            // echo "<div class='success'> Connected succesfully </div>";
        }

        $sqlQuery = "select * from " . $tablename . " where id=" . $postid;
        $result = $connection->query($sqlQuery);
        $content = "";
        if ($result->num_rows > 0) {
            echo "<div class='textEditorGroup'>";
            while ($row = $result->fetch_assoc()) {
                $content = $row['post_content'];
            }
            echo "</div>";
        } else {
            echo "<br> 0 Results in the dabatase for the query";
        }
        return $content;
    }
        
?>