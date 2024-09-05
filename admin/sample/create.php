<!DOCTYPE html>
<html>
<head>
    <title>Bioskop UNM</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container mt-4 mb-5">
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

        //Cek apakah ada kiriman form dari method post
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = input($_POST["nama"]);
            $judul_film = input($_POST["judul_film"]);
            $hari = input($_POST["hari"]);
            $jam = input($_POST["jam"]);
            $ruangan = input($_POST["ruangan"]);
            $harga = input($_POST["harga"]);

            //Query input menginput data kedalam tabel anggota
            $sql = "INSERT INTO pesanan (nama, judul_film, hari, jam, ruangan, harga) VALUES
            ('$nama','$judul_film','$hari','$jam','$ruangan','$harga')";

            //Mengeksekusi/menjalankan query diatas
            $hasil = mysqli_query($kon, $sql);

            //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
            if ($hasil) {
                header("Location:read.php");
            } else {
                echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
            }
        }
    ?>

    <h2>Isi form sesuai dengan detail film</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required />
        </div>
        <div class="form-group">
            <label>Judul Film:</label>
            <input type="text" name="judul_film" class="form-control" placeholder="Masukan Judul Film" required/>
        </div>
        <div class="form-group">
            <label>Hari :</label>
            <input type="text" name="hari" class="form-control" placeholder="Masukan Hari" required/>
        </div>
        <div class="form-group">
            <label>Jam:</label>
            <input type="text" name="jam" class="form-control" placeholder="Masukan Jam" required/>
        </div>
        <div class="form-group">
            <label>Ruangan :</label>
            <input type="text" name="ruangan" class="form-control" placeholder="Masukan Ruangan" required/>
        </div>
        <div class="form-group">
            <label>Harga:</label>
            <input type="text" name="harga" class="form-control" placeholder="Masukan Harga" required/>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>