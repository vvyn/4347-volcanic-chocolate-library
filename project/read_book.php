<?php
$sqlQuery = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = mysqli_connect('localhost', 'root', '', 'db_library');

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $bookId = $_POST['bookId'];

    $sqlQuery = "SELECT * FROM `books` WHERE `BookID` = '$bookId'";
    $result = mysqli_query($con, $sqlQuery);
    
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $message .= "BookID: " . $row["BookID"] . " - Author First Name: " . $row["AuthorFname"] . " - Author Last Name: " . $row["AuthorLname"] . " - Book Title: " . $row["BookTitle"] . " - Genre: " . $row["Genre"] . "<br>";
        }
    } else {
        $message = "No records found for BookID: $bookId";
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
