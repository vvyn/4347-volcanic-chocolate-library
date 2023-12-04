<?php
// Database connection variables
$host = 'localhost';
$dbname = 'db_library';
$user = 'root'; // The default username for MySQL
$pass = ''; // Default password for MySQL is empty

// Create PDO instance
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
]);

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the post records
    $userDLId = $_POST['userDlId'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $bdate = $_POST['birthday'];
    $address = $_POST['address'];
    $email = $_POST['email'];

    // SQL to update records using prepared statements
    $sql = "UPDATE `librarycarduser` SET `Fname` = :fname, `Lname` = :lname, `BDate` = :bdate, `Address` = :address, `Email` = :email WHERE `UserDLId` = :userDLId";

    // Prepare statement
    $stmt = $pdo->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':userDLId', $userDLId, PDO::PARAM_STR);
    $stmt->bindParam(':fname', $fname, PDO::PARAM_STR);
    $stmt->bindParam(':lname', $lname, PDO::PARAM_STR);
    $stmt->bindParam(':bdate', $bdate, PDO::PARAM_STR);
    $stmt->bindParam(':address', $address, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);

    // Execute the prepared statement
    try {
        $stmt->execute();
        echo "Record updated successfully";
    } catch (PDOException $e) {
        echo "Error updating record: " . $e->getMessage();
    }
}

if (true) {
    echo "<a href='user.html'><button>Back</button></a>";
} 
?>
