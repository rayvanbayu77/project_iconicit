<?php

include 'config.php';

session_start();

if (empty($_SESSION['login']))
    header("Location: login.php")

?>
<!DOCTYPE html>
<html>

<title>Home</title>

<h4>Home</h4>
<p>Selamat datang, <b><?= $_SESSION['username']?></b></p>
<a href="buat_klub.php">Buat Klubmu</a><br><br>
<a type="submit" href="logout.php">Log Out</a><hr>



<h4>Klub yang diikuti</h4>
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
    <p> Klub <?= $row['nama_klub']?> 
    <?php
        if ($_SESSION['id_user'] == $data['id_user'] && $data['sub_kategori'] == null && $row['roles'] == "Admin")
        {?>
        <a href="buat_klub_kategori.php?id=<?= $data['id_klub']; ?>">Lengkapi</a>
        <?php } else{ ?>
            <a href="klub.php?id=<?= $row['id_klub']; ?>"> Masuk </a>
            <?php }?>
    <?php }?>    
    <?php endwhile; ?>
<hr>


<h4>Klub yang tersedia :</h4>
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
            <p> Klub <?= $sub_data['nama_klub']?> <a href="join_klub.php?id=<?= $sub_data['id_klub']; ?>"> Gabung </a>    
    <?php endwhile; ?>
</html>
    