<?php

include 'config.php';

session_start();

if(empty($_SESSION['login']))
header('Location: login.php');

if(isset($_POST['submit_join'])){
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $id_klub = $_POST['id_klub'];
    $nama_klub = $_POST['nama_klub'];

    $sql1 = "INSERT INTO member (id_user, username, id_klub, nama_klub)
    VALUES ('$id_user', '$username', '$id_klub','$nama_klub')";
    $result1 = mysqli_query($conn, $sql1);
    if ($result1){
        $id_user = "";
        $username = "";
        $id_klub = "";
        $nama_klub = "";
        echo "<script>alert('Berhasil join klub'); location.href = 'home.php'</script>";
    }
}

?>

<?php

$id_klub = $_GET['id'];
$query =  "SELECT * FROM klub WHERE id_klub = $id_klub";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result)
?>
<p>Tentang klub <b><?= $data['nama_klub'] ?></b></p>
<p>Kategori klub : <?= $data['kategori'] ?> (<?= $data['sub_kategori'] ?>)</p>
<p>Deskripsi klub :  <?= $data['deskripsi'] ?></p>
<form action="" method="POST">
    <input type="hidden" name="id_user" value="<?= $_SESSION['id_user']?>" readonly>
    <input type="hidden" name="username" value="<?= $_SESSION['username']?>" readonly>
    <input type="hidden" name="id_klub" value="<?= $data['id_klub'] ?>" readonly>
    <input type="hidden" name="nama_klub" value="<?= $data['nama_klub'] ?>" readonly>
<button name="submit_join">Join</button>
</form>