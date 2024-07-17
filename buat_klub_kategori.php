<?php

session_start();

if (empty($_SESSION['login']))
	header("Location: login.php"); 

include "config.php"; 


$id_bru = $_GET['id'];

global $conn;

$sql = $conn->query("SELECT * FROM klub WHERE id_klub = $id_bru");
$editSql = $sql->fetch_assoc();
$ref = $editSql['id_kategori'];

if(isset($_POST['submit_edit'])) {


	$sub_kategori = $_POST['sub_kategori'];
	$sql = $conn->query("UPDATE klub SET sub_kategori = '$sub_kategori' WHERE id_klub = $id_bru");
	if($sql) {
		echo "
        <script>alert('Klub berhasil diperbarui)');
        document.location.href = 'home.php';
        </script>";
	} else {
		echo "<script>alert('Terjadi kesalahan');
        document.location.href = 'home.php';
        </script>";
	}
}

?>

<h4>Pengaturan</h4>
<form method="post" action="">
    <input type="text" name="username" value="<?php echo $editSql['username']; ?>" readonly>
    <input type="text" name="nama_klub" value="<?php echo $editSql['nama_klub'];?>" readonly>
    <input type="text" name="deskripsi" value="<?php echo $editSql['deskripsi'];?>" readonly>
    <p><?php $editSql['kategori'];?></p>
    <br><br>
    <p>Pilih 2 sub-kategori klub  </p>
        <?php
            $sql1 = "SELECT * FROM sub_kategori WHERE id_kategori = $ref ORDER BY id_sub";
            $result1 = mysqli_query($conn, $sql1);
            while (
                $opsi = mysqli_fetch_assoc($result1)): ?>

            <input type="radio" name="sub_kategori" value="<?= $opsi['nama_sub_kategori'] ?>"><?= $opsi['nama_sub_kategori'] ?>
            <?php
            endwhile;                   
            ?>
            
    <br><br>
    <button name="submit_edit">Buat</button>
</form>