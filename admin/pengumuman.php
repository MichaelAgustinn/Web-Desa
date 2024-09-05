<?php
  include "koneksi.php";
  // Tampilkan pesan jika pembaruan data berhasil dilakukan
  if (isset($_GET['update_success']) && $_GET['update_success'] == 'true') {
    echo "<div class='alert alert-success' role='alert'>Data berhasil diperbarui!</div>";
  }

  if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql_delete = "DELETE FROM pengumuman WHERE id_pengumuman=$delete_id";
    if (mysqli_query($koneksi, $sql_delete)) {
      echo "<div class='alert alert-success' role='alert'>Data berhasil dihapus!</div>";
    } else {
      echo "<div class='alert alert-danger' role='alert'>Gagal menghapus data: " . mysqli_error($koneksi) . "</div>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Admin - Pengumuman</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/person-circle.svg" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">

  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block">Admin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->
      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link" href="berita.php">
          <i class="bi bi-newspaper"></i><span>Berita</span><i class="ms-auto"></i>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="pengumuman.php">
          <i class="bi bi-megaphone"></i><span>Pengumuman</span><i class="ms-auto"></i>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="agenda.php">
          <i class="bi bi-activity"></i><span>Agenda Kegiatan</span><i class="ms-auto"></i>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="galeri.php">
          <i class="bi bi-journal-album"></i><span>Galeri</span><i class="ms-auto"></i>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="struktur.php">
          <i class="bi bi-people"></i><span>Struktur Organisasi</span><i class="ms-auto"></i>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="jabatan.php">
          <i class="bi bi-person-vcard-fill"></i><span>Jabatan</span><i class="ms-auto"></i>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="profil.php">
          <i class="bi bi-person-circle"></i><span>Profil</span><i class="ms-auto"></i>
        </a>
      </li>
    </ul>
  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    <table class="my-3 table table-bordered">
      <a href="pengumuman_tambah.php" class="btn btn-primary" role="button"></i>Tambah</a>
      <thead>
        <tr class="table-primary">           
          <th>No</th>
          <th>Judul Pengumuman</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php
            $sql="select * from pengumuman order by id_pengumuman desc";
            $hasil=mysqli_query($koneksi,$sql);
            $no=0;
            while ($data = mysqli_fetch_array($hasil)) {
              $no++;
          ?>
          <td><?php echo $no;?></td>
          <td><?php echo $data["judul_pengumuman"];?></td>
          <td>
            <a href="pengumuman_edit.php?id_pengumuman=<?php echo $data['id_pengumuman']; ?>" class="btn btn-warning mb-2" role="button">Edit</a>
            <a href="pengumuman.php?delete_id=<?php echo $data['id_pengumuman']; ?>" class="btn btn-danger mb-2" role="button" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
          </td>
        </tr>
        <?php
          }
        ?>
      </tbody>
    </table>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
</html>