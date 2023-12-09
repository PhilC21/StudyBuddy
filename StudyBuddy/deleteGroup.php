<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Group | Study Buddy</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="main_container"> <!-- start main_container div -->

        <div class="header"> <!-- start header div -->
            <h1>Study Buddy Management</h1>
        </div> <!-- end header div -->

        <div class="content_container"> <!-- start content_container div -->

            <h2 align="center">Delete Group</h2>

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

            // Check if the user has an administrator role for the specified group
            $checkAdminQuery = "SELECT * FROM Memberships WHERE userID = '$userID' AND groupID = '$groupID' AND role = 'Administrator'";
            $checkAdminResult = $conn->query($checkAdminQuery);

            if ($checkAdminResult->num_rows > 0) {
                // User has administrator role, proceed with the deletion
                $deleteQuery = "DELETE FROM Groups WHERE groupID = '$groupID'";
                $deleteResult = $conn->query($deleteQuery);

                if ($deleteResult === TRUE) {
                    echo "Group has been successfully deleted.";
                } else {
                    echo "Error deleting group: " . $conn->error;
                }
            } else {
                echo "User does not have administrator role for the specified group!";
            }

            $conn->close();
            ?>

            <br><br>
            <a class="homeBtn" href="index.html">Return Home</a>

        </div> <!-- start content_container div -->

    </div> <!-- end main_container -->
</body>

</html>
