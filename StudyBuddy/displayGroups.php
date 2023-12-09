<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Groups | Study Buddy</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="main_container"> <!-- start main_container div -->

        <div class="header"> <!-- start header div -->
            <h1>Study Buddy Management</h1>
        </div> <!-- end header div -->

        <div class="content_container"> <!-- start content_container div -->

            <h2 align="center">Study Buddy Groups</h2>

            <table border="1">
                <tr>
                    <th>Group ID</th>
                    <th>Group Name</th>
                    <th>Description</th>
                    <th>Created By</th>
                    <th>Date Created</th>
                </tr>

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

                $sql = "SELECT * FROM Groups";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['groupID'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['description'] . "</td>";
                        echo "<td>" . $row['createdBy'] . "</td>";
                        echo "<td>" . $row['dateCreated'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No results available</td></tr>";
                }
                $conn->close();
                ?>
            </table>

            <br><br>
            <a class="homeBtn" href="index.html">Return Home</a>

        </div> <!-- start content_container div -->

    </div> <!-- end main_container -->

</body>

</html>