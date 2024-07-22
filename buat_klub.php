<?php

session_start();

include 'config.php';

if (empty($_SESSION['login']))
header("Location: login.php");


if (isset($_POST['submit_klub'])) {
    $nama_klub = $_POST['nama_klub'];
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $deskripsi = $_POST['deskripsi'];
    $kategori = $_POST['kategori'];
    $id_kategori = $_POST['id_kategori'];
    $sub_kategori = $_POST['sub_kategori'];
    $status = $_POST['status'];

    if ($kategori == 'Software'){
        $id_sheesh = 1;
    }
    elseif ($kategori == 'Embedded'){
        $id_sheesh = 2;
    }
    elseif ($kategori == 'Multimedia'){
        $id_sheesh = 3;
    }
    elseif ($kategori == 'Networking'){
        $id_sheesh = 4;
    }

    $sql = "SELECT * FROM klub WHERE nama_klub='$nama_klub'";
    $result = mysqli_query($conn, $sql);
    if (!$result->num_rows > 0) {
        $sql = "INSERT INTO klub (nama_klub, id_user, username, deskripsi, kategori, id_kategori, sub_kategori, status) 
                VALUES ('$nama_klub', '$id_user', '$username', '$deskripsi', '$kategori', '$id_sheesh', '$sub_kategori', '$status')";
        $result = mysqli_query($conn, $sql); 
        if($result) {
            $nama_klub = "";
            $id_user = "";
            $username = "";
            $deskripsi = "";
            $kategori = "";
            $id_kategori = "";
            $sub_kategori = "";
            $status = "";
            
            if($result > 0){
                $nama_klub1 = $_POST['nama_klub'];
                $id_user1 = $_POST['id_user1'];
                $username1 = $_POST['username1'];
                $nama_klub1 = $_POST['nama_klub'];
                $roles = $_POST['roles'];
                $sql2 = "INSERT INTO member (id_user, username, nama_klub, roles)
                        VALUES ('$id_user1', '$username1', '$nama_klub1', '$roles')";
                $result2 = mysqli_query($conn, $sql2);
                if ($result2){
                    $id_user1 = "";
                    $username1 = "";
                    $nama_klub1 = "";
                    $roles = "";
                    echo "<script>alert('klub berhasil dibuat');</script>";
                    header("Location: home.php");
                }
            }
        }
        else {
            echo "<script>alert('terjadi kesalahan')</script>";
        }
    }
}

?>

<h4>Buat Klubmu</h4>
<form method="post" action="">
    <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user'];?>" readonly>
    <input type="hidden" name="username" value="<?php echo $_SESSION['username'];?>" readonly>
    <input type="hidden" name="id_user1" value="<?php echo $_SESSION['id_user'];?>" readonly>
    <input type="hidden" name="username1" value="<?php echo $_SESSION['username'];?>" readonly>
    <input type="hidden" name="roles" value="Admin" readonly>
    
    <a>Tulis informasi tentang klubmu</a><br>
    <input type="text" placeholder="Tulis nama klubmu" name="nama_klub" required><br>
    <textarea type="text" placeholder="Jelaskan tentang klubmu" name="deskripsi" required></textarea>
    <br>
    
    
    <p>Pilih kategori klub : </p>
        <?php
            $sql1 = "SELECT * FROM kategori ORDER BY id";
            $result1 = mysqli_query($conn, $sql1);
            while (
                $opsi = mysqli_fetch_assoc($result1)): ?>

            <input type="radio" name="kategori" value="<?= $opsi['nama_kategori'] ?>" required> <?= $opsi['nama_kategori'] ?>

            <?php
            endwhile;            
            ?>
            <br><br>
            <p>Pilih status klub : </p>

            <input type="radio" name="status" value="Public" required> Public
            <input type="radio" name="status" value="Private" required> Private
    <br><br>
    <button name="submit_klub">Buat</button>
</form>