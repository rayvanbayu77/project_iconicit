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

if($_SESSION['id_user'] == $data['id_user']){?> <p>(Admin)</p> <?php }?>

?>