<?php

session_start();

include("config.php");

$id = $_GET["id"];

$conn->query("DELETE FROM request WHERE id = $id") or die(mysqli_error($conn));


echo "<script>alert('permintaan ditolak'); history.back();</script>" ;
?>