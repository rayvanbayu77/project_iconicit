<?php

session_start();

include("config.php");

$id = $_GET["id"];

$conn->query("DELETE FROM member WHERE id= $id") or die(mysqli_error($conn));


echo "<script>alert('berhasil keluar dari klub'); document.location.href = 'home.php';</script>" ;
?>