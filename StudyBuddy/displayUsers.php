<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Users | Study Buddy</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="main_container"> <!-- start main_container div -->

        <div class="header"> <!-- start header div -->
            <h1>Study Buddy Management</h1>
        </div> <!-- end header div -->

        <div class="content_container"> <!-- start content_container div -->

            <h2 align="center">Study Buddy Users</h2>

            <table class="display">
                <tr>
                    <th>User ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>E-mail</th>
                    <th>Phone No</th>
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

                $sql = "SELECT * FROM Users";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class=\"record\">";
                        echo "<td>" . $row['userID'] . "</td>";
                        echo "<td>" . $row['fName'] . "</td>";
                        echo "<td>" . $row['lName'] . "</td>";
                        echo "<td>" . $row['gender'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['phone'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No results available</td></tr>";
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