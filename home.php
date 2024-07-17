<?php

include 'config.php';

session_start();

if (empty($_SESSION['login']))
    header("Location: login.php")

?>

<h4>Home</h4>

<a href="buat_klub.php">Buat Klubmu</a><br><br>
<a type="submit" href="logout.php">Log Out</a><hr>



<h4>Klub yang diikuti</h4>
<?php
$reff= $_SESSION['id_user'];
$query1 = "SELECT * FROM member WHERE id_user='$reff' ORDER BY id DESC";
    $result1 = mysqli_query($conn, $query1);
    while(
        $row = mysqli_fetch_assoc($result1)) :?>

    <p> Klub <?= $row['nama_klub']?> <a href="klub.php?id=<?= $row['id_klub']; ?>"> Masuk </a>    

    <?php endwhile; ?>

<hr>
<h4>Klub yang tersedia :</h4>
<?php 
    $query = "SELECT * FROM klub ORDER BY id_klub DESC";
    $result = mysqli_query($conn, $query);
    while(
        $row = mysqli_fetch_assoc($result)) :?>

    <p> Klub <?= $row['nama_klub']?> <a href="join_klub.php?id=<?= $row['id_klub']; ?>"> Masuk </a> 
    <?php
        if ($_SESSION['id_user'] == $row['id_user'] && $row['sub_kategori'] == null)
        {?>
        | <a href="buat_klub_kategori.php?id=<?= $row['id_klub']; ?>">Lengkapi</a>
        <?php }?>
    

    <?php endwhile; ?>