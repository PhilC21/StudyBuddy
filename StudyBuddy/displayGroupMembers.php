<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Group Members | Study Buddy</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="main_container"> <!-- start main_container div -->

        <div class="header"> <!-- start header div -->
            <h1>Study Buddy Management</h1>
        </div> <!-- end header div -->

        <div class="content_container"> <!-- start content_container div -->

            <h2 align="center">Display Group Members</h2>

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

            $groupID = $_POST["groupID"];

            // Fetch group name
            $groupNameQuery = "SELECT name FROM Groups WHERE groupID = '$groupID'";
            $groupNameResult = $conn->query($groupNameQuery);
            $groupName = ($groupNameResult->num_rows > 0) ? $groupNameResult->fetch_assoc()["name"] : "Unknown Group";

            echo "<h3 align='center'>Group Name: $groupName</h3>";

            // Query for fetching members
            $sql = "SELECT Users.userID, Users.fName, Users.lName, Memberships.joined, Memberships.role
                    FROM Users
                    JOIN Memberships ON Users.userID = Memberships.userID
                    WHERE Memberships.groupID = '$groupID'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>User ID</th>";
                echo "<th>First Name</th>";
                echo "<th>Last Name</th>";
                echo "<th>Joined</th>";
                echo "<th>Role</th>";
                echo "</tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["userID"] . "</td>";
                    echo "<td>" . $row["fName"] . "</td>";
                    echo "<td>" . $row["lName"] . "</td>";
                    echo "<td>" . $row["joined"] . "</td>";
                    echo "<td>" . $row["role"] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "<p>No results available</p>";
            }

            $conn->close();
            ?>

            <br><br>
            <a class="homeBtn" href="index.html">Return Home</a>

        </div> <!-- start content_container div -->

    </div> <!-- end main_container -->

</body>

</html>
