<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bioskop UNM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Bioskop UNM</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Beranda</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Film</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="film_aksi.php">Aksi</a></li>
                <li><a class="dropdown-item" href="film_horor.php">Horor</a></li>
                <li><a class="dropdown-item" href="film_komedi.php">Komedi</a></li>
                <li><a class="dropdown-item" href="film_drama.php">Drama</a></li>
                <li><a class="dropdown-item" href="film_romantis.php">Romantis</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="makanan.php">Makanan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="read.php">Pesanan</a>
            </li>
          </ul>
        </div>
    </div>
  </nav>
  
  <div class="container mt-5 pt-4">
    <?php
      include "koneksi.php";
      // Tampilkan pesan jika pembaruan data berhasil dilakukan
      if (isset($_GET['update_success']) && $_GET['update_success'] == 'true') {
        echo "<div class='alert alert-success' role='alert'>Data berhasil diperbarui!</div>";
      }

      if (isset($_GET['delete_id'])) {
        $delete_id = $_GET['delete_id'];
        $sql_delete = "DELETE FROM pesanan WHERE id_pesanan=$delete_id";
        if (mysqli_query($kon, $sql_delete)) {
          echo "<div class='alert alert-success' role='alert'>Data berhasil dihapus!</div>";
        } else {
          echo "<div class='alert alert-danger' role='alert'>Gagal menghapus data: " . mysqli_error($kon) . "</div>";
        }
      }
    ?>

    <table class="my-3 table table-bordered">
      <thead>
        <tr class="table-primary">           
          <th>No</th>
          <th>Nama</th>
          <th>Judul Film</th>
          <th>Hari</th>
          <th>Jam</th>
          <th>Ruangan</th>
          <th>Harga</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php
            $sql="select * from pesanan order by id_pesanan desc";
            $hasil=mysqli_query($kon,$sql);
            $no=0;
            while ($data = mysqli_fetch_array($hasil)) {
              $no++;
          ?>
          <td><?php echo $no;?></td>
          <td><?php echo $data["nama"]; ?></td>
          <td><?php echo $data["judul_film"]; ?></td>
          <td><?php echo $data["hari"]; ?></td>
          <td><?php echo $data["jam"]; ?></td>
          <td><?php echo $data["ruangan"]; ?></td>
          <td><?php echo $data["harga"]; ?></td>
          <td>
            <a href="update.php?id_pesanan=<?php echo $data['id_pesanan']; ?>" class="btn btn-warning" role="button">Update</a>
            <a href="read.php?delete_id=<?php echo $data['id_pesanan']; ?>" class="btn btn-danger" role="button" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
          </td>
        </tr>
          <?php
            }
          ?>
      </tbody>
    </table>
  </div>

  <div class="text-center pt-3 pb-3 bg-dark text-light fixed-bottom">
    All Rights Reserved & copy; 2023
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>