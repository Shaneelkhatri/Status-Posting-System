<!DOCTYPE html>
<link rel="stylesheet" href="style.css">
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

</head>
<body>


    <?php

    require_once("../../files/settings.php");

    // Connect to the database
    $connection = mysqli_connect($sql_host, $sql_user, $sql_pass, $sql_db);

    // Check the connection
    if ($connection->connect_error) {
        die("Database connection failure: " . $connection->connect_error);
    }

    //Checking if the search query is submitted and not empty
    if (isset($_GET['Search']) && !empty($_GET['Search'])) {
        $search_query = $_GET['Search'];

        // Query for status search
        $sql = "SELECT * FROM statusform WHERE st LIKE '%$search_query%'";

        // Run the query
        $result = $connection->query($sql);

       if ($result->num_rows > 0) {
            // Display search results
            echo "<h2>Search Status Results:</h2>";
            echo "<table>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td><p>Status Code: " . $row['stcode'] . "</p></td></tr>";
  	            echo "<tr><td><p>Status: " . $row['st'] . "</p></td></tr>";
  	            echo "<tr><td><p>Share: " . $row['share'] . "</p></td></tr>";
   		    echo "<tr><td><p>Date: " . $row['date'] . "</p></td></tr>";
   		    echo "<tr><td><p>Permissions: " . $row['permission'] . "</p></td></tr>";
  	            echo "<tr><td><hr></td></tr>";
                    echo "<hr>";
            }               
            echo "</table>";

        } else {
            // Display message if no results found
            echo "<p>Status not found. Please try a different keyword.</p>";
        }

    } else {
        // Display error message if search query is empty
        echo "<p>The search string is empty. Please enter a keyword to search.</p>";
    }

// Close the database connection
$connection->close();
?>
<br>
<a href="index.html" style="float: right;">Return to Home Page</a><br>
<a href="searchstatusform.html">Search for another status</a>
</div>

</body>
<footer>
<br>
    <marquee behavior="scroll" direction="right">Made by Shaneel Khatri
    </marquee>
</footer>
</html>
