
<?php

session_start();

include 'config.php';

if (empty($_SESSION['login']))
	header("Location: login.php");

$id = $_GET['id'];

$query = "SELECT * FROM request WHERE id = $id";
$res = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($res);

$id_user = $data['id_user'];
$username = $data['username'];
$id_klub = $data['id_klub'];
$nama_klub = $data['nama_klub'];    

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
        echo "<script>alert('Pengguna berhasil ditambahkan'); history.back(); </script>";

        $conn->query("DELETE FROM request WHERE id = $id");
    } else {
      echo "<script>alert('Terjadi kesalahan.')</script>";
    }
  } else {
  echo "<script>alert('pengguna telah bergabung');  history.back()</script>";
  }   

?>