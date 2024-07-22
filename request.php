<?php 

session_start();

include 'config.php';

if (empty($_SESSION['login']))
	header("Location: login.php");

$id = $_GET['id'];

$query = "SELECT * FROM klub WHERE id_klub = $id";
$res = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($res);

?>

<script>
    function x(){
        return history.back(); 
    }
   
</script>

<h4>Pending join request | <?= $data['nama_klub'] ?></h4><hr>
<a onclick="x()">Kembali</a>


<h4>List</h4>
<?php

$sql = "SELECT * FROM request WHERE id_klub = $id ORDER BY id ASC ";
$result = mysqli_query($conn, $sql);
while(
    $fetch = mysqli_fetch_assoc($result)) :?>

<p>
    <p><?= $fetch['username'] ?> | Permintaan dikirim <?= $fetch['join_date']; ?> 
<a href="acc_request.php?id=<?= $fetch['id'] ?>">Terima</a>|
<a href="del_request.php?id=<?= $fetch['id'] ?>">Tolak</a>
</p>
</p>
<hr>

<?php endwhile;?>

