<?php
$sqlQuery = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = mysqli_connect('localhost', 'root', '', 'db_library');

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $employeeSsn = $_POST['EmployeeSSN'];

    $sqlQuery = "SELECT * FROM `librarian` WHERE `EmployeeSSN` = '$employeeSsn'";
    $result = mysqli_query($con, $sqlQuery);
    
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $message .= "EmployeeSSN: " . $row["EmployeeSSN"] . 
                        " - First Name: " . $row["Fname"] . 
                        " - Last Name: " . $row["Lname"] . 
                        " - Birthday: " . $row["Bdate"] . 
                        " - Address: " . $row["Address"] . 
                        " - Salary: " . $row["Salary"] . "<br>";
        }
    } else {
        $message = "No records found for BookID: $employeeSSN";
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