<?php
$sqlQuery = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = mysqli_connect('localhost', 'root', '', 'db_library');

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $userDLId = $_POST['userDlId'];
    $bdate = $_POST['birthday'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    
    $sqlQuery = "INSERT INTO `librarycarduser` (`Fname`, `Lname`, `UserDLId`, `BDate`, `Address`, `Email`)
                  VALUES ('$fname', '$lname', '$userDLId', '$bdate', '$address', '$email')";
    
    $result = mysqli_query($con, $sqlQuery);
    
    if ($result) {
        $message = "User created successfully";
    } else {
        $message = "Error creating user: " . mysqli_error($con);
    }
    
    mysqli_close($con);
}

if (!empty($sqlQuery)) {
    echo "<p><strong>SQL Query:</strong> " . htmlspecialchars($sqlQuery) . "</p>";
}

if (!empty($message)) {
    echo "<p><strong>Results:</strong><br> " . $message . "</p>";
}
?>
