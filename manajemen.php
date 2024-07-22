<?php 

session_start();

include 'config.php';

if (empty($_SESSION['login']))
	header("Location: login.php");

$id = $_GET['id'];

$query = "SELECT * FROM klub WHERE id_klub = $id";
$res = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($res)

?>

<script>
    function x(){
        return history.back(); 
    }
</script>

<script>

function alert() {
  let text = "Press a button!\nEither OK or Cancel.";
  if (confirm(text) == true) {
    location.href= "mass_destruction.php?id=<?= $data['id_klub'] ?>" ;
  } else {
    location.reload();
  }
}

</script>

<h4>Manajemen Klub <?= $data['nama_klub'] ?></h4><hr>
<a onclick="x()">Kembali</a><br>
<a onclick="alert()">Hapus Klub</a>


<h4>Anggota</h4>
<?php

$sql = "SELECT * FROM member WHERE id_klub = $id ORDER BY id ASC ";
$result = mysqli_query($conn, $sql);
while(
    $fetch = mysqli_fetch_assoc($result)) :?>

<p><?= $fetch['username'] ?> 
<?php
if($fetch['roles'] != "Admin"){?>
    | <a href="kick.php?id=<?= $fetch['id'] ?>">Keluarkan</a>
<?php } else { ?>
    | <b>ADMIN</b>
<?php }?>
</p>
<hr>

<?php endwhile;?>

