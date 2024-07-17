<?php
        $id_prtyn = $_GET['id'];
        global $conn;
        $sql = $conn->query("SELECT * FROM pertanyaan WHERE id_prtyn = $id_prtyn") or die(mysqli_error($conn));
        $data = $sql->fetch_assoc();
       ?>
       <b><?= $data['username_prtyn'] ?></b> |
          <?= $data['waktu_prtyn'] ?><br>
          <b>Kategori : </b><?= $data['kategori'] ?><br>
          <?= $data['isi_prtyn'] ?>
       <div class="row">
        <div class="col-lg-12">
          <label for="isi_pertanyaan" name="isi_pertanyaan" id="isi_pertanyaan"></label>


          <h5>Klub yang tersedia :</h5>
<?php 
    $query = "SELECT * FROM klub ORDER BY id_klub DESC";
    $result = mysqli_query($conn, $query);
    while(
        $row = mysqli_fetch_assoc($result)) :?>

    <p> Klub <?= $row['nama_klub']?> <a href="klub.php?id=<?= $row['id_klub']; ?>"> Masuk </a></p>
    

    <?php endwhile; ?>


    href="buat_klub_kategori.php?id=<?= $opsi['id']; ?>" 
    value="<?= $opsi['nama_kategori'] ?>"
    href="buat_klub_kategori.php?id=<?= $opsi['id']; ?>"

    <?php
    $sql = $conn->query("SELECT * FROM users WHERE id = $id") or die(mysqli_error($conn));
    $editSql = $sql->fetch_assoc();
?>