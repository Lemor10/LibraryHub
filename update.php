<?php
require_once "db.php";

$record_id = $_GET['record_id'];

$sql = "SELECT * FROM LH WHERE record_id = '$record_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>

    <style>
        body{
            background-image: url('https://lindamarkowitz.com/wp-content/uploads/2019/11/books2.jpg');
            background-size: cover;
            font-family: Arial, sans-serif;
        }
        form {
            width: 300px;
            margin: 50px auto;
            padding: 50px;
            border: 1px solid #797a7d;
            border-radius: 10px;
            backdrop-filter: blur(10px);
        }

        .txtbox {
    background-color: blur(5px)#3b3b3b;
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    margin-bottom: 15px;
    box-sizing: border-box;
    border: 1px solid #fffefe;
    border-radius: 4px;
        }

        label {
    display: block;
    margin-top: 10px;
    color: #fffbfb;
    text-align: center;
    font-size: medium;
        }

        .btn {
    background-color: #0084ff;
    color: white;
    padding: 10px 15px;
    border: none;
    margin-left: 120px;
    border-radius: 4px;
    cursor: pointer;
    text-align: center;
}
h1 {
    color: #fffbfb;
    text-align: center;
    width: 300px;
    margin: 50px auto;
    padding: 20px;
    border: 1px solid #797a7d;
    border-radius: 5px;
    backdrop-filter: blur(10px);
}

    </style>
</head>
<body>
    <form action="" method="post">

        

        <label>Author</label><br>
        <input type="text" name="author" value="<?php echo $row['author'] ?>" class="txtbox"><br>

        <label>Title</label><br>
        <input type="text" name="title" value="<?php echo $row['title'] ?>" class="txtbox"><br>

        <label>Genre</label><br>
        <input type="text" name="genre" value="<?php echo $row['genre'] ?>" class="txtbox"><br><br>

        <input type="submit" name="submit" value="Update" class="btn">

        

    </form>
    <?php

        if(isset($_POST['submit'])){

            $record_id  = $_GET['record_id'];
            $author     = $_POST['author'];
            $title      = $_POST['title'];
            $genre      = $_POST['genre'];
    
            $update   = "UPDATE LH SET 
            author    = '$author',
            title     = '$title',
            genre     = '$genre',
            WHERE record_id = '$record_id';
            ";
    
            if ($conn->query($update) === TRUE) {
                echo "Record has been saved!";
                echo '<meta http-equiv="refresh" content="0; url=read.php">';
                
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }
    
            $conn->close();

        }
        

    ?>
<a href="read.php" style="text-decoration:none;"><h1 style="color:white;">View Records</h1></a>

</body>
</html>
