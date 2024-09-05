<?php
  //Include file koneksi, untuk koneksikan ke database
  include "koneksi.php";

  //Fungsi untuk mencegah inputan karakter yang tidak sesuai
  function input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  
  //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_peserta
  if (isset($_GET['id_agenda'])) {
    $id_agenda=input($_GET["id_agenda"]);

    $sql="select * from agenda where id_agenda = $id_agenda";
    $hasil=mysqli_query($koneksi,$sql);
    $data = mysqli_fetch_assoc($hasil);
  }

  //Cek apakah ada kiriman form dari method post
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_agenda=htmlspecialchars($_POST["id_agenda"]);
    $judul_kegiatan=input($_POST["judul_kegiatan"]);
    $tanggal_kegiatan=input($_POST["tanggal_kegiatan"]);
    $lokasi_kegiatan=input($_POST["lokasi_kegiatan"]);

    //Query update data pada tabel anggota
    $sql="update agenda set
      judul_kegiatan='$judul_kegiatan',
      tanggal_kegiatan='$tanggal_kegiatan',
      lokasi_kegiatan='$lokasi_kegiatan'
      where id_agenda=$id_agenda";

    //Mengeksekusi atau menjalankan query diatas
    $hasil=mysqli_query($koneksi,$sql);

    //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
    if ($hasil) {
      header("Location:agenda.php");
    } else {
      echo "<div class='alert alert-danger'>Data Gagal disimpan</div>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Admin - Edit Agenda Kegiatan</title>
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
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block">Admin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div>

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li>
      </ul>
    </nav>
  </header>

  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

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
  </aside>

  <main id="main" class="main">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <input type="hidden" name="id_agenda" value="<?php echo $data['id_agenda']; ?>"/>
      <div class="form-group">
        <label>Judul Kegiatan :</label>
        <input type="text" name="judul_kegiatan" class="form-control" value="<?php echo $data['judul_kegiatan']; ?>" required />
      </div>

      <div class="form-group">
        <label>Tanggal Kegiatan :</label>
        <input type="date" name="tanggal_kegiatan" class="form-control" value="<?php echo $data['tanggal_kegiatan']; ?>" required/>
      </div>

      <div class="form-group">
        <label>Lokasi Kegiatan :</label>
        <input type="text" name="lokasi_kegiatan" class="form-control" value="<?php echo $data['lokasi_kegiatan']; ?>" required/>
      </div>

      <button type="submit" name="submit" class="btn btn-success mt-3">Save</button>
      <a href="agenda.php" class="btn btn-danger mt-3">Cancel</a>
    </form>
  </main>

  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <script src="assets/js/main.js"></script>

</body>
</html>