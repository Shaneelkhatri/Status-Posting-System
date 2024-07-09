<!DOCTYPE html>
<link rel="stylesheet" href="style.css">
<html>
    <head>
        <title>Table Drop</title>
    </head>

    <body>
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

$result = mysqli_query($connection, "SHOW TABLES LIKE 'statusform'");
if(mysqli_num_rows($result) > 0) {
    // Table exists
    echo "Table exists so it is being dropped.";
    $drop = "DROP TABLE statusform";
    $drop_table = mysqli_query($connection, $drop);
    if($drop_table) {
        echo "Table dropped successfully.";
        echo "<p><a href='index.html'>Return to Home Page</a></p>";
    } else {
        echo "Error dropping table: " . mysqli_error($connection);
        echo "<p><a href='index.html'>Return to Home Page</a></p>";
    }
} else {
    // Table does not exist
    echo "Table does not exist so no table can be dropped.";
    echo "<p><a href='index.html'>Return to Home Page</a></p>";
}




?>