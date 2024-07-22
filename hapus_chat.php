<?php

session_start();

include("config.php");

$id_chat = $_GET["id"];

$conn->query("DELETE FROM chat WHERE id_chat = $id_chat") or die(mysqli_error($conn));


echo "<script>alert('pesan berhasil dihapus'); history.back();</script>" ;
?>