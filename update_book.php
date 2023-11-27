<?php
$sqlQuery = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = mysqli_connect('localhost', 'root', '', 'db_library');

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $authorFname = $_POST['AuthorFname'];
    $authorLname = $_POST['AuthorLname'];
    $title = $_POST['BookTitle'];
    $genre = $_POST['Genre'];
    $bookId = $_POST['BookID'];
    
    $sqlQuery = "UPDATE `books` SET 
    `AuthorFname` = '$authorFname', 
    `AuthorLname` = '$authorLname', 
    `BookTitle` = '$title', 
    `Genre` = '$genre', 
    WHERE `BookID` = '$bookId'";
    $result = mysqli_query($con, $sqlQuery);
    
    if ($result) {
        $message = "Book with BookID: $bookId has been updated successfully.";
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
