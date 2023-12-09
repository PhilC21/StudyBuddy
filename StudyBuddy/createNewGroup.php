<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Group | Study Buddy</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="main_container"> <!-- start main_container div -->

        <div class="header"> <!-- start header div -->
            <h1>Study Buddy Management</h1>
        </div> <!-- end header div -->

        <div class="content_container"> <!-- start content_container div -->

            <h2 align="center">Create New Group</h2>

            <?php
            $servername = "127.0.0.1";
            $username = "root";
            $password = "";
            $dbname = "bmcc";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $userID = $_POST["userID"];
            $groupID = $_POST["groupID"];
            $name = $_POST["name"];
            $description = $_POST["description"];

            $query1 = "INSERT INTO Groups (groupID, name, description, createdBy)
           VALUES ('$groupID', '$name', '$description', '$userID')";

            $query2 = "INSERT INTO Memberships (userID, groupID, role)
           VALUES('$userID', '$groupID', 'Administrator')";

            $multiQuery = $query1 . ";" . $query2 . ";";

            if ($conn->multi_query($multiQuery) == TRUE) {
                echo "New Group successfully created";
            } else {
                echo "Error: " . $multiQuery . "<br>" . $conn->error;
            }

            $conn->close();
            ?>
            <br><br>
            <a class="homeBtn" href="index.html">Return Home</a>

        </div> <!-- start content_container div -->

    </div> <!-- end main_container -->
</body>

</html>