<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Peserta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5 mb-5">
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

            $nama_pembeli = input($_POST["nama_pembeli"]);
            $nama_menu = input($_POST["nama_menu"]);
            $harga_menu = input($_POST["harga_menu"]);

            //Query input menginput data kedalam tabel anggota
            $sql = "INSERT INTO menu (nama_pembeli, nama_menu, harga_menu) VALUES
            ('$nama_pembeli','$nama_menu','$harga_menu')";

            //Mengeksekusi/menjalankan query diatas
            $hasil = mysqli_query($kon, $sql);

            //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
            if ($hasil) {
                header("Location:makanan.php");
            } else {
                echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
            }
        }
    ?>
    <h2>Isi form sesuai dengan detail makanan</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label>Nama Pembeli:</label>
            <input type="text" name="nama_pembeli" class="form-control" placeholder="Masukan Nama" required />
        </div>
        <div class="form-group">
            <label>Nama Menu:</label>
            <input type="text" name="nama_menu" class="form-control" placeholder="Masukan Nama Menu" required/>
        </div>
        <div class="form-group">
            <label>Harga Menu :</label>
            <input type="text" name="harga_menu" class="form-control" placeholder="Masukan Harga Menu" required/>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>