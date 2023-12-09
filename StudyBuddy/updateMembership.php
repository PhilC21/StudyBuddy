<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Group | Study Buddy</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="main_container"> <!-- start main_container div -->

        <div class="header"> <!-- start header div -->
            <h1>Study Buddy Management</h1>
        </div> <!-- end header div -->

        <div class="content_container"> <!-- start content_container div -->

            <h2 align="center">Update Group</h2>

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

            $adminID = $_POST["adminID"];
            $userID = $_POST["userID"];
            $groupID = $_POST["groupID"];
            $role = $_POST["role"];

            // Check if the user has an administrator role for the specified group
            $checkAdminQuery = "SELECT * FROM Memberships WHERE userID = '$adminID' AND groupID = '$groupID' AND role = 'Administrator'";
            $checkAdminResult = $conn->query($checkAdminQuery);

            if ($checkAdminResult->num_rows > 0) {
                // Check if the user is the sole administrator of the group
                $countAdminsQuery = "SELECT COUNT(*) as adminCount FROM Memberships WHERE groupID = '$groupID' AND role = 'Administrator'";
                $countAdminsResult = $conn->query($countAdminsQuery);
                $adminCount = $countAdminsResult->fetch_assoc()['adminCount'];

                if ($adminCount > 1 || ($adminCount == 1 && $adminID != $userID)) {
                    // User has administrator role and is not the sole administrator, proceed with the update
                    $updateQuery = "UPDATE Memberships SET role = '$role' WHERE userID = '$userID' AND groupID = '$groupID'";
                    $updateResult = $conn->query($updateQuery);

                    if ($updateResult === TRUE) {
                        echo "Membership has been updated successfully";
                    } else {
                        echo "Error updating record: " . $conn->error;
                    }
                } else {
                    echo "Cannot change the role of the sole administrator of the group!";
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
