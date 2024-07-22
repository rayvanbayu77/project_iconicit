<?php

session_start();

include("config.php");

$id = $_GET["id"];

$conn->query("DELETE FROM member WHERE id = $id") or die(mysqli_error($conn));


echo "<script>alert('pengguna berhasil dikeluarkan'); history.back();</script>" ;
?>