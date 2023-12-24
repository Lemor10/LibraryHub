<?php
require_once "db.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Create</title>

    </style>
</head>
<body>

    <h2>ADD BOOK</h2>
    <form action="" method="post">

        <label>Author</label>
        <input type="text" name="author" class="txtbox"><br>

        <label>Title</label>
        <input type="text" name="title" class="txtbox"><br>

        <label>Genre</label>
        <input type="text" name="genre" class="txtbox"><br><br>

        <input type="submit" name="submit" value="Save" class="btn">

        

    </form>
    <?php

        if(isset($_POST['submit'])){

            $author   = $_POST['author'];
            $title   = $_POST['title'];
            $genre     = $_POST['genre'];
    
            $saving = "INSERT INTO LH (author, title, genre)
            VALUES ('$author', '$title', '$genre')";
    
            if ($conn->query($saving) === TRUE) {
                echo "Record has been saved!";
                echo '<meta http-equiv="refresh" content="0; url=read.php">';
                
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }
    
            $conn->close();

        }
        

    ?>


</body>
</html>
