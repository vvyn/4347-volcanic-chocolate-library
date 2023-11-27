<?php
$sqlQuery = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = mysqli_connect('localhost', 'root', '', 'db_library');

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $fname = $_POST['Fname'];
    $lname = $_POST['Lname'];
    $employeeSsn = $_POST['EmployeeSSN'];
    $birthday = $_POST['Birthday'];
    $address = $_POST['Address'];
    $salary = $_POST['Salary'];
    
    $sqlQuery = "UPDATE `librarian` SET 
    `Fname` = '$Fname', 
    `Lname` = '$Lname', 
    `EmployeeSSN` = '$EmployeeSSN', 
    `Birthday` = '$Birthday', 
    `Address` = '$Address', 
    `Salary` = '$Salary' 
    WHERE `Librarian` = '$'EmployeeSSN";
    $result = mysqli_query($con, $sqlQuery);
    
    if ($result) {
        $message = "Librarian with Employee SSN: $employeeSsn has been updated successfully.";
    } else {
        $message = "Error updating book: " . mysqli_error($con);
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