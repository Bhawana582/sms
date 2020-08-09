<?php

include("db.php");
$id=$_GET['id'];

$sql = "DELETE FROM `stdmrks` WHERE id=$id ";

mysqli_query($con, $sql);
// $con->query($sql);
header('Location:http://localhost/sms/marksheetindex.php');

?>