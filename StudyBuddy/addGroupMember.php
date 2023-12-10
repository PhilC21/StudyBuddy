<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Group Member | Study Buddy</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="main_container"> <!-- start main_container div -->

        <div class="header"> <!-- start header div -->
            <h1>Study Buddy Management</h1>
        </div> <!-- end header div -->

        <div class="content_container"> <!-- start content_container div -->

            <h2 align="center">Add Group Member</h2>

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

            // Check if the user is already a member of the group
            $checkMembershipQuery = "SELECT * FROM Memberships WHERE userID = '$userID' AND groupID = '$groupID'";
            $checkMembershipResult = $conn->query($checkMembershipQuery);

            if ($checkMembershipResult->num_rows > 0) {
                echo "User is already a member of the group.";
            } else {
                // User is not a member, proceed with adding the membership
                $sql = "INSERT INTO Memberships (userID, groupID) VALUES ('$userID', '$groupID')";

                if ($conn->query($sql) == TRUE) {
                    echo "Member successfully added to the group!";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }

            $conn->close();
            ?>

            <br><br>
            <a class="homeBtn" href="index.html">Return Home</a>

        </div> <!-- start content_container div -->

    </div> <!-- end main_container -->
</body>

</html>
