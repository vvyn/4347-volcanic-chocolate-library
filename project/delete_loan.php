<?php
$sqlQuery = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = mysqli_connect('localhost', 'root', '', 'db_library');

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $bookId = $_POST['bookId'];
    $userDLId = $_POST['userDlId'];
    $employeeSsn = $_POST['employeeSsn'];
    
    $sqlQuery = "DELETE FROM `loans` WHERE `BookID` = '$bookId' AND `UserDLId` = '$userDLId' AND `EmployeeSSN` = '$employeeSsn' ";
    $result = mysqli_query($con, $sqlQuery);
    
    if ($result) {
        $message = "Loan with BookID, UserDLId, and EmployeeSSN: $bookId, $userDLId, and $employeeSsn has been deleted successfully.";
    } else {
        $message = "Error deleting loan: " . mysqli_error($con);
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
