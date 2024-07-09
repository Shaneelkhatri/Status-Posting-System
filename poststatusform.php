<!DOCTYPE html>
<link rel="stylesheet" href="style.css">
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Status</title>
</head>
<body>
    <div class = "content">
        <h1> Post Status Form</h1>
	  <nav>
           <a href="index.html">Home</a>
           <a href="poststatusform.php">Post a new status</a>
           <a href="about.html">About the assignment</a>
            <a href="searchstatusform.html">Search</a>
          </nav>
        <br>
    <form action="poststatusprocess.php" method="post">
    <label for="stcode">Status Code:</label>
    <input type="text" name="stcode" id="stcode" required pattern="[S][0-9]{4}" maxlength="5" value=""><br>
   
    <br>
    
    <label for="st">Status:</label>
    <input type="text" id="st" name="st" required pattern="[a-zA-Z0-9,.\s!?]+">
    <span class="error" id="st_error"></span>
    
    <br>
    <br>
    
    <label for="share">Share:</label>
    <input type="radio" id="share1" name="share" value="University" required>
    <label for="share1">University</label>
    <input type="radio" id="share2" name="share" value="Class">
    <label for="share2">Class</label>
    <input type="radio" id="share3" name="share" value="Private">
    <label for="share3">Private</label>
    
    <br>
    <br>
    
    <label for ="date">Date:</label>
    <input type ="date" name ="date" required value ="<?php echo date('dd-mm-yyyy'); ?>"><br>
    
    <br>

    <label for="permission">Permission:</label>&nbsp;
    <input type="checkbox" id="allow_like" name="permission[]" value="Allow Like" >
    <label for="allow_like">Allow Like</label>&nbsp;
    <input type="checkbox" id="allow_comments" name="permission[]" value="Allow Comments">
    <label for="allow_comments">Allow Comments</label>&nbsp;
    <input type="checkbox" id="allow_share" name="permission[]" value="Allow Share">
    <label for="allow_share">Allow Share</label>&nbsp;

    <br>
    <br>

    <input type="submit" value="Submit">
    
    <br>
    <br>
    
    <a href="index.html">Return to Home Page</a>
</form>
</body>
<footer>
<br>
    <marquee behavior="scroll" direction="right">Made by Shaneel Khatri
    </marquee>
</footer>
</html>