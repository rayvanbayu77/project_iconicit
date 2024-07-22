<?php

session_start();

include("config.php");

$id = $_GET["id"];

$conn->query("DELETE FROM klub WHERE id_klub = $id");
$conn->query("DELETE FROM member WHERE id_klub = $id");
$conn->query("DELETE FROM request WHERE id_klub = $id");
$conn->query("DELETE FROM chat WHERE id_klub = $id");


echo "<script>alert('klub berhasil dihapus'); </script>" ;
header("Location: home.php");
?>