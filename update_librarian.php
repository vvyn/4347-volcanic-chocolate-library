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
    $employeeSsn = $_POST['employeeSsn'];
    $birthday = $_POST['birthday'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];
    
    $sqlQuery = "UPDATE `librarian` SET 
    `Fname` = '$fname', 
    `Lname` = '$lname', 
    `Birthday` = '$birthday', 
    `Address` = '$address', 
    `Salary` = '$salary' 
    WHERE `EmployeeSSN` = '$employeeSsn'";
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
