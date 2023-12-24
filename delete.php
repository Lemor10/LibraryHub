<?php
require_once "db.php";

$record_id = $_GET['record_id'];

$sql = "DELETE FROM LH WHERE record_id = '$record_id'";
$result = $conn->query($sql);
echo '<meta http-equiv="refresh" content="0; url=read.php">';

?>
