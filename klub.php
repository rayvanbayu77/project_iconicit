<?php 

session_start();

include 'config.php';

if (empty($_SESSION['login']))
	header("Location: login.php");


  if (isset($_POST['submit_chat'])) {
    $id_klub = $_GET['id'];
    $isi_chat = $_POST['isi_chat'];
    $username = $_POST['username'];
    $id_user = $_POST['id_user'];
    $kategori = $_POST['kategori'];
    $id_kategori = $_POST['id_kategori'];
    $lampiran = $_FILES['lampiran']['name'];
    $tempname = $_FILES["lampiran"]["tmp_name"];
    $folder = "./image/" . $lampiran;

        $sql = "INSERT INTO chat (id_klub, isi_chat, lampiran, username, id_user, kategori, id_kategori)
                VALUES ('$id_klub', '$isi_chat', '$lampiran', '$username', '$id_user', '$kategori', '$id_kategori')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $isi_chat = "";
            $lampiran = "";
            $username = "";
            $id_user = "";
            $kategori = "";
            $id_kategori = "";
            if (move_uploaded_file($tempname, $folder)) {
            } else {
                echo "<script>alert('Terjadi kesalahan.')</script>";
            }
        } else {
                echo "<script>alert('Terjadi kesalahan.')</script>";
        }
    }

    $id_klub_rec = $_GET['id'];
    global $conn;
    $sql = $conn->query("SELECT * FROM klub WHERE id_klub = $id_klub_rec");
    $data = $sql->fetch_assoc();
    
    $query1 = "SELECT * FROM member WHERE id_user = " . $_SESSION['id_user'] . " AND id_klub = $id_klub_rec";
    $result1 = mysqli_query($conn, $query1);
    $fetch = mysqli_fetch_assoc($result1);
?>


<!DOCTYPE html>
<html>

<title><?= $data['nama_klub'] ?></title>

<h4>Klub <?= $data['nama_klub'] ?> </h4>
<a href="home.php">Kembali</a>
<?php
    if($_SESSION['id_user'] != $data['id_user']) {?>
    <a href="out.php?id=<?= $fetch['id']?>">Keluar klub</a>
<?php }?>

<?php if($_SESSION['id_user'] == $data['id_user']){?>
    <a href="manajemen.php?id=<?= $data['id_klub'] ?>">Manajemen</a> 
    <?php
    if($data['status'] == "Private") {?>
        <a href="request.php?id=<?= $data['id_klub'] ?>">Request</a>
    <?php }?>
    <?php }?>

<h4>Riwayat obrolan</h4>
<?php
    $query = "SELECT * FROM chat WHERE id_klub = " . $data['id_klub'] . " ORDER BY id_chat DESC "; 
    $res = mysqli_query($conn, $query);
    while(
        $row = mysqli_fetch_assoc($res)) :?>     
          <b>
          <p><?= $row['username'] ?></b><?php if($row['id_user'] == $data['id_user']){?> (Admin) <?php }?> | <?= $row['date'] ?> <?php if ($_SESSION['id_user'] == $row['id_user']){?><a href="hapus_chat.php?id=<?= $row['id_chat']; ?>">Hapus</a><?php }?> <br><?= $row['isi_chat'] ?> </p>
          <img src="./image/<?php echo $row['lampiran']; ?>">
              
        <hr>
        <?php endwhile; ?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="text" name="isi_chat" placeholder="Tulis Pesan" required>
    <input type="file" name="lampiran" value="">
    
    <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>" readonly>
    <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']; ?>" readonly>
    <input type="hidden" name="kategori" value="<?php echo $data['kategori']; ?>" readonly>
    <input type="hidden" name="id_kategori" value="<?php echo $data['id_kategori']; ?>" readonly>
    
    <br><button name="submit_chat">Kirim</button>
</form>
</html>