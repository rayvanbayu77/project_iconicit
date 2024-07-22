<?php

session_start();

include "config.php"; 

global $conn;

$id_klub = "SELECT MAX(id_klub) FROM klub";

$sql = $conn->query("UPDATE member SET MAX(id_klub)='$id_klub'") or die(mysqli_error($conn));
echo "<script>alert('Klub berhasil diperbarui)'); document.location.href = 'home.php';</script>";
	

?>