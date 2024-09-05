<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bioskop UNM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
<body>
    <div class="container mt-5 mb-4">
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
            if (isset($_GET['id_pesanan'])) {
                $id_pesanan=input($_GET["id_pesanan"]);

                $sql="select * from pesanan where id_pesanan=$id_pesanan";
                $hasil=mysqli_query($kon,$sql);
                $data = mysqli_fetch_assoc($hasil);
            }

            //Cek apakah ada kiriman form dari method post
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $id_pesanan=htmlspecialchars($_POST["id_pesanan"]);
                $nama=input($_POST["nama"]);
                $judul_film=input($_POST["judul_film"]);
                $hari=input($_POST["hari"]);
                $jam=input($_POST["jam"]);
                $ruangan=input($_POST["ruangan"]);
                $harga=input($_POST["harga"]);

                //Query update data pada tabel anggota
                $sql="update pesanan set
                    nama='$nama',
                    judul_film='$judul_film',
                    hari='$hari',
                    jam='$jam',
                    ruangan='$ruangan',
                    harga='$harga'
                    where id_pesanan=$id_pesanan";

                //Mengeksekusi atau menjalankan query diatas
                $hasil=mysqli_query($kon,$sql);

                //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
                if ($hasil) {
                    header("Location:read.php");
                }
                else {
                    echo "<div class='alert alert-danger'>Data Gagal disimpan</div>";

                }
            }
        ?>

        <h2>Update Data</h2>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

            <input type="hidden" name="id_pesanan" value="<?php echo $data['id_pesanan']; ?>" />

            <div class="form-group">
                <label>Nama:</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" value="<?php echo $data['nama']; ?>" required />
            </div>
            <div class="form-group">
                <label>Judul Film:</label>
                <input type="text" name="judul_film" class="form-control" placeholder="Masukan Judul Film" value="<?php echo $data['judul_film']; ?>" required/>
            </div>
            <div class="form-group">
                <label>Hari :</label>
                <input type="text" name="hari" class="form-control" placeholder="Masukan Hari" value="<?php echo $data['hari']; ?>" required/>
            </div>
            <div class="form-group">
                <label>Jam:</label>
                <input type="text" name="jam" class="form-control" placeholder="Masukan Jam" value="<?php echo $data['jam']; ?>" required/>
            </div>
            <div class="form-group">
                <label>Ruangan :</label>
                <input type="text" name="ruangan" class="form-control" placeholder="Masukan Ruangan" value="<?php echo $data['ruangan']; ?>" required/>
            </div>
            <div class="form-group">
                <label>Harga:</label>
                <input type="text" name="harga" class="form-control" placeholder="Masukan Harga" value="<?php echo $data['harga']; ?>" required/>
            </div>

            <button type="submit" name="submit" class="btn btn-success">Save</button>
            <a href="read.php" class="btn btn-danger">Cancel</a>
        </form>
    </div>
</body>
</html>