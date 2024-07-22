<?php

include 'config.php';

session_start();

if(empty($_SESSION['login']))
header('Location: login.php');

$id_klub_brttt = $_GET['id'];
$query =  "SELECT * FROM klub WHERE id_klub = $id_klub_brttt";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

if(isset($_POST['submit_join'])){
        $id_user = $_POST['id_user'];
        $username = $_POST['username'];
        $id_klub = $_POST['id_klub'];
        $nama_klub = $_POST['nama_klub'];

        if($data['status'] == "Private"){
          $sql = "SELECT * FROM request WHERE nama_klub='$nama_klub' AND username='$username'";
          $result = mysqli_query($conn, $sql);
          if (!$result->num_rows > 0) {
          $sql = "INSERT INTO request (id_user, username, id_klub, nama_klub)
                VALUES ('$id_user', '$username', '$id_klub','$nama_klub')";
          $result = mysqli_query($conn, $sql);
          if ($result) {
            $id_user = "";
            $username = "";
            $id_klub = "";
            $nama_klub = "";
            echo "<script>alert('permintaan telah dikirim, silahkan tunggu'); location.href = 'home.php'</script>";
            } else {
            echo "<script>alert('Terjadi kesalahan.')</script>";
            }
          } else {
          echo "<script>alert('anda sudah mengirim permintaan');  location.href = 'home.php'</script>";
          }   
        } 
        
        else {
          $sql = "SELECT * FROM member WHERE nama_klub='$nama_klub' AND username='$username'";
          $result = mysqli_query($conn, $sql);
          if (!$result->num_rows > 0) {
          $sql = "INSERT INTO member (id_user, username, id_klub, nama_klub)
                VALUES ('$id_user', '$username', '$id_klub','$nama_klub')";
          $result = mysqli_query($conn, $sql);
          if ($result) {
              $id_user = "";
              $username = "";
              $id_klub = "";
              $nama_klub = "";
              echo "<script>alert('Berhasil join klub'); location.href = 'home.php'</script>";
          } else {
            echo "<script>alert('Terjadi kesalahan.')</script>";
          }
        } else {
        echo "<script>alert('Sudah terdaftar dalam klub ini.');  location.href = 'home.php'</script>";
        }   
      }        
}


?>

<!DOCTYPE html>
<html>

<title>Join <?= $data['nama_klub']?></title>

<p>Tentang klub <b><?= $data['nama_klub'] ?></b></p>
<p>Admin : <b><?= $data['username'] ?></b></p>
<p>Kategori klub : <?= $data['kategori'] ?> (<?= $data['sub_kategori'] ?>)</p>
<p>Deskripsi klub :  <?= $data['deskripsi'] ?></p>
<p>Status klub :  <?= $data['status'] ?></p>
<form action="" method="POST">
    <input type="hidden" name="id_user" value="<?= $_SESSION['id_user']?>" readonly>
    <input type="hidden" name="username" value="<?= $_SESSION['username']?>" readonly>
    <input type="hidden" name="id_klub" value="<?= $data['id_klub'] ?>" readonly>
    <input type="hidden" name="nama_klub" value="<?= $data['nama_klub'] ?>" readonly>
<button name="submit_join">Join</button>
</form>

</html>