<?php
$sqlQuery = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = mysqli_connect('localhost', 'root', '', 'db_library');

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $authorFname = $_POST['authorFname'];
    $authorLname = $_POST['authorLname'];
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $bookId = $_POST['bookId'];
    
    $sqlQuery = "UPDATE `books` SET 
    `AuthorFname` = '$authorFname', 
    `AuthorLname` = '$authorLname', 
    `BookTitle` = '$title', 
    `Genre` = '$genre' 
    WHERE `BookID` = '$bookId'";
    $result = mysqli_query($con, $sqlQuery);
    
    if ($result) {
        $message = "Book with BookID: $bookId has been updated successfully.";
    } else {
        $message = "Error updating book: " . mysqli_error($con);
    }    
    
    mysqli_close($con);
}

if (true) {
    echo "<a href='book.html'><button>Back</button></a>";
} 

if (!empty($sqlQuery)) {
    echo "<p><strong>SQL Query:</strong> " . htmlspecialchars($sqlQuery) . "</p>";
}

if (!empty($message)) {
    echo "<p><strong>Results:</strong><br> " . $message . "</p>";
}
?>
