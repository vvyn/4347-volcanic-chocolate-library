<?php
$sqlQuery = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = mysqli_connect('localhost', 'root', '', 'db_library');

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $bookId = $_POST['BookID'];
    
    $sqlQuery = "DELETE FROM `books` WHERE `BookID` = '$bookId'";
    $result = mysqli_query($con, $sqlQuery);
    
    if ($result) {
        $message = "Book with BookID: $bookId has been deleted successfully.";
    } else {
        $message = "Error deleting book: " . mysqli_error($con);
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
