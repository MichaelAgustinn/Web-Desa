<?php
include "../admin/koneksi.php";
$id = intval($_GET['id']);
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
    <?php include "layout/navbar.html" ?>
    <!-- Tentang DESA -->
    <section id="tentang-desa" class="tentang-desa">
        <div class="container-about">
            <div class="left-column">
                <div class="row">
                    <?php
                    $id = intval($_GET['id']);
                    $sql = "SELECT * FROM berita WHERE id_berita = $id";
                    $hasil = mysqli_query($koneksi, $sql);
                    $no = 0;
                    while ($data = mysqli_fetch_array($hasil)) {
                        $no++;
                    ?>
                        <div class="tentang-desa-img">
                            <img src="../admin/uploads/<?php echo htmlspecialchars($data['gambar']); ?>" alt="Tentang Desa" />
                        </div>
                        <div class="content">
                            <h3><?php echo $data["judul_berita"]; ?></h3>
                            <p><?php echo $data["isi_berita"]; ?></p>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <?php include "layout/right.php" ?>
        </div>
    </section>
    <!-- Tentang DESA END -->


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