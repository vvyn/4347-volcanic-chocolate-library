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

    $sqlQuery = "SELECT * FROM `loans` WHERE `BookID` = '$bookId' AND `UserDLId` = '$userDLId' AND `EmployeeSSN` = '$employeeSsn' ";
    $result = mysqli_query($con, $sqlQuery);
    
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $message .= "BookID: " . $row["BookID"] . " - UserDLId: " . $row["UserDLId"] . " - EmployeeSSN: " . $row["EmployeeSSN"] . " - CheckOutDate: " . $row["CheckOutDate"] . " - DueDate: " . $row["DueDate"] . "<br>";
        }
    } else {
        $message = "No records found for Loan with BookID, UserDLId, and EmployeeSSN: $bookId, $userDLId, and $employeeSsn";
    }  
    
    mysqli_close($con);
}

if (true) {
    echo "<a href='index.html'><button>Back</button></a>";
} 

if (!empty($sqlQuery)) {
    echo "<p><strong>SQL Query:</strong> " . htmlspecialchars($sqlQuery) . "</p>";
}

if (!empty($message)) {
    echo "<p><strong>Results:</strong><br> " . $message . "</p>";
}
?>
