<?php

include 'config.php';

session_start();

if (empty($_SESSION['login']))
    header("Location: login.php")

?>
<!DOCTYPE html>
<html>


<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width-device-width, initial-scale=1.0">
<link href='https://fonts.googleapis.com/css?family=Anek Kannada' rel='stylesheet'>
<link rel="stylesheet" href="home_style.css">
<title>Home</title>
</head>

<div class="topnav">
<img src="assets/logo/geekspeak_logo_wh.png" alt="">
<a type="submit" href="logout.php">Log Out</a>
<a href="buat_klub.php">Buat Klubmu</a>
</div>

<p style="padding-left: 10px; padding-top: 20px; font-size: 20px">Selamat datang, <b><?= $_SESSION['username']?></b></p>
<br style="padding: 10px">


<p class="header-text"><b>Klub yang diikuti :</b></p>
<?php
error_reporting(E_ERROR | E_PARSE);

$reff = $_SESSION['id_user'];
$sub_reff = $_SESSION['username'];

$query = "SELECT * FROM klub ORDER BY id_klub DESC"; #select data untuk direct ke klub
$result = mysqli_query($conn, $query);


$query1 = "SELECT * FROM member WHERE id_user='$reff' ORDER BY id DESC";
$result1 = mysqli_query($conn, $query1);

    while(
        ($row = mysqli_fetch_assoc($result1)) && ($data = mysqli_fetch_assoc($result)) 
        ) :?>
    <?php
    if ($_SESSION['id_user'] == $row['id_user']){
    ?>
    <div class="list-club">
    <p> Klub <?= $row['nama_klub']?> 
    <?php
        if ($_SESSION['id_user'] == $data['id_user'] && $data['sub_kategori'] == null && $row['roles'] == "Admin")
        {?>
        <a href="buat_klub_kategori.php?id=<?= $data['id_klub']; ?>">Lengkapi</a>
        <?php } else{ ?>
            <a href="klub.php?id=<?= $row['id_klub']; ?>"> Masuk </a>
            </div>
            <?php }?>
    <?php }?>    
    <?php endwhile; ?>
<hr class="hr">


<p class="header-text"><b>Klub yang tersedia :</b></p>
<?php 
    $query1 = "SELECT * FROM member WHERE id_user='$reff' ORDER BY id DESC";
    $result1 = mysqli_query($conn, $query1);
    //$data = mysqli_fetch_assoc($result1); //ambil data klub yang telah diikuti pengguna

    $sub_query = "SELECT * FROM klub ";
    $sub_result = mysqli_query($conn, $sub_query);
    //$sub_data = mysqli_fetch_assoc($sub_result);

    $query = "SELECT * FROM klub WHERE nama_klub <> ".$data['nama_klub']." ";
    //$result = mysqli_query($conn, $query);
    //$row = myysqqli_fetch_assoc($result);

    while(
        ($sub_data = mysqli_fetch_assoc($sub_result))) :?>
        <div class="list-club">
            <p> Klub <?= $sub_data['nama_klub']?> <a href="join_klub.php?id=<?= $sub_data['id_klub']; ?>"> Gabung </a>
        </div>    
    <?php endwhile; ?>
</html>
    