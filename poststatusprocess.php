<!DOCTYPE html>
<link rel="stylesheet" href="style.css">
<html>

<div class="content">
<?php
require_once("../../files/settings.php");

// Connect to the database
$connection = mysqli_connect($sql_host, $sql_user, $sql_pass, $sql_db);

// Check the connection
if ($connection->connect_error) {
    echo "<p>Database connection failure: " . $connection->connect_error . "</p>";
    exit();
}

echo "<p>Database connection successful</p>";

$sqlTable = "CREATE TABLE IF NOT EXISTS statusform (
    stcode VARCHAR(5) PRIMARY KEY,
    st VARCHAR(30) NOT NULL,
    share VARCHAR(30) NOT NULL,
    date DATE NOT NULL,
    permission VARCHAR(255) DEFAULT 'none'
)";

// Execute SQL statement to create the table
if ($conn->query($sqlTable) === FALSE) {
    die("Error creating table: " . $conn->error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $stcode = $_POST['stcode'];
    $st = $_POST['st'];
    $share = $_POST['share'];
    $date = $_POST['date'];

    
    $permissions = isset($_POST["permission"]) ? $_POST["permission"] : [];


    // Checking if the status code exists or not
    $check_sql = "SELECT * FROM statusform WHERE stcode = '$stcode'";
    $result = $connection->query($check_sql);

    if ($result && $result->num_rows > 0) {
        echo "<p>Error: Status code already exists. Please enter a new status code. </p>";
        echo "<p><a href='index.html'>Return to Home Page</a></p>";
    } else {

        // SQL statement to insert data into the table
        $permission_string = implode(', ', $permissions);
        $sql = "INSERT INTO statusform (stcode, st, share, date, permission) 
                VALUES ('$stcode', '$st', '$share', '$date', '$permission_string')";

        // Execute SQL statement to insert data
        if ($connection->query($sql) === TRUE) {
            echo "Congratulations! Your status has been successfully saved";
            header("refresh:3; url=index.html");
            exit();
        } else {
            echo "<p>Error: " . $sql . "<br>" . $connection->error . "</p>";
        }
    }
} else {
    echo "<p>No data submitted.</p>";
}



// Close the database connection
$connection->close();
?>
<br>
<a href="index.html">Return to Home Page</a><br>
    <a href="searchstatusform.html">Return to Search Status Page</a>
</div>

</body>
<footer>
<br>
    <marquee behavior="scroll" direction="right">Made by Shaneel Khatri
    </marquee>
</footer>
</html>
