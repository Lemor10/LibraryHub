<?php
require_once "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read</title>

    <style>
        body{
        background-image: url('https://lindamarkowitz.com/wp-content/uploads/2019/11/books2.jpg');
        background-size: cover;
        font-family: Arial, sans-serif;

        }
        table, td, th {
        border: 1px solid;
        font-size:24pt;
        color: white;
        }

        table {
        width: 100%;
        border-collapse: collapse;
        backdrop-filter: blur(10px)
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
    <table>
        <tr>
            <th>Author</th>
            <th>Title</th>
            <th>Genre</th>

        </tr>
        <?php
            $sql = "SELECT * FROM LH";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              
              while($row = $result->fetch_assoc()) {
                    echo"<tr>";
                        echo"<td>".$row['author']."</td>";
                        echo"<td>".$row['title']."</td>";
                        echo"<td>".$row['genre']."</td>";
                        echo"<td style='text-align:center;'>
                            <a href='update.php?record_id=".$row['record_id']."'>
                                    <button>Edit</button>
                            </a>
                            <a href='delete.php?record_id=".$row['record_id']."'>
                                <button>Delete</button>
                            </a>
                            </td>";
                    echo"</tr>";
              }
            } else {
                echo"<tr>";
                    echo"<td colspan='4' style='text-align:center;'>No Results</td>";
                echo"</tr>";
            }
            $conn->close();
        ?>
    </table>
    <a href="create.php" style="text-decoration:none;"><h1 style="color:white;">Add book again?</h1></a>

</body>
</html>
