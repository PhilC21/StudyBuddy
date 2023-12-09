<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User | Study Buddy</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="main_container"> <!-- start main_container div -->

        <div class="header"> <!-- start header div -->
            <h1>Study Buddy Management</h1>
        </div> <!-- end header div -->

        <div class="content_container"> <!-- start content_container div -->

            <h2 align="center">Update User</h2>

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
            $fName = $_POST["fName"];
            $lName = $_POST["lName"];
            $gender = $_POST["gender"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];

            $sql = "SELECT * FROM Users WHERE userID = '$userID'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Update row   	  
                $sql = "UPDATE Users SET fName = '$fName', lName = '$lName', gender = '$gender', email = '$email', phone = '$phone' WHERE userID = '$userID'";
                $result = $conn->query($sql);
                echo "Record updated successfully";
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