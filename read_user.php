<?php
// Initialize variables
$sqlQuery = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection code
    $con = mysqli_connect('localhost', 'root', '', 'db_library');

    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get the post records
    $userDLId = $_POST['userDlId'];

    // SQL to select records
    $sqlQuery = "SELECT * FROM `librarycarduser` WHERE `UserDLId` = '$userDLId'";

    // Query the database
    $result = mysqli_query($con, $sqlQuery);

    // Check if records are found
    if (mysqli_num_rows($result) > 0) {
        // Output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $message .= "UserDLId: " . $row["UserDLId"] . " - Fname: " . $row["Fname"] . " - Lname: " . $row["Lname"] . " - BDate: " . $row["BDate"] . " - Address: " . $row["Address"] . " - Email: " . $row["Email"] . "<br>";
        }
    } else {
        $message = "No records found";
    }

    mysqli_close($con);
}

// Display SQL query and results
if (!empty($sqlQuery)) {
    echo "<p><strong>SQL Query:</strong> " . htmlspecialchars($sqlQuery) . "</p>";
}

if (!empty($message)) {
    echo "<p><strong>Results:</strong><br> " . $message . "</p>";
}
?>
