<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave A Group | Study Buddy</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="main_container"> <!-- start main_container div -->

        <div class="header"> <!-- start header div -->
            <h1>Study Buddy Management</h1>
        </div> <!-- end header div -->

        <div class="content_container"> <!-- start content_container div -->


            <h2 align="center">Leave A Group</h2>

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
            $sql1 = "SELECT * FROM Memberships WHERE userID = '$userID' AND groupID = '$groupID'";
            $result1 = $conn->query($sql1);

            if ($result1->num_rows > 0) {
                // delete row   	  
                $sql2 = "DELETE FROM Memberships WHERE userID = '$userID' AND groupID = '$groupID'";
                $result2 = $conn->query($sql2);

                $row = $result1->fetch_row();
                echo "<b>User has left the group</b>";
            } else {
                echo "User does not exist!";
            }

            $conn->close();
            ?>

            <br><br>
            <a class="homeBtn" href="index.html">Return Home</a>

        </div> <!-- start content_container div -->

    </div> <!-- end main_container -->
</body>

</html>