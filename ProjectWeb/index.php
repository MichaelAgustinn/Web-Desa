<?php
include "../admin/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DESA ISC</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/logo.png">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

</head>

<body>
    <!-- Navbar Area -->
    <?php include "layout/navbar.html" ?>

    <!-- HOME AWAL -->
    <section class="hero" id="home">
        <main class="content">
            <h1>SELAMAT DATANG</h1>
            <p>Informatics Study Club Universitas Sulawesi Barat </p>
            <a href="#berita" class="cta">SELENGKAPNYA</a>
        </main>
    </section>
    <!-- HOME AWAL END  -->

    <!-- berita section -->
    <section id="berita" class="berita">
        <div class="container-berita">
            <di v class="left-column">
                <div class="section">
                    <h2>Berita Terkini</h2>
                    <?php
                    $sql = "select * from berita order by id_berita desc limit 3";
                    $hasil = mysqli_query($koneksi, $sql);
                    $no = 0;
                    while ($data = mysqli_fetch_array($hasil)) {
                        $no++;
                    ?>

                        <div class="news-item">
                            <img src="../admin/uploads/<?php echo htmlspecialchars($data['gambar']); ?>" alt="News Image">
                            <p><?php echo $data["tanggal_upload_berita"]; ?></p>
                            <a href="isi-berita.php?id=<?php echo $data['id_berita']; ?>">
                                <h3><?php echo $data["judul_berita"]; ?></h3>
                            </a>
                            <p><?php echo $data["isi_berita"]; ?></p>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="selengkapnya">
                    <h3><a href="daftar-berita.php">SELENGKAPNYA</a></h3>
                </div>
            </di>
            <?php include "layout/right.php" ?>
        </div>

    </section>
    <!-- berita section end -->

    <?php include "layout/footer.html" ?>


    <!-- Feathers Icons  -->
    <script>
        feather.replace();
    </script>

    <!-- Java Script Sendiri -->
    <script src="js/script.js">

    </script>
</body>

</html>