<?php

include("db.php");
$id=$_GET['id'];

$sql = "DELETE FROM `student` WHERE id=$id ";

mysqli_query($con, $sql);
// $con->query($sql);
header('Location:http://localhost/sms/index.php');

?>