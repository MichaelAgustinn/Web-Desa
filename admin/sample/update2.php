<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bioskop UNM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
            //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_peserta
            if (isset($_GET['id_menu'])) {
                $id_menu=input($_GET["id_menu"]);

                $sql="select * from menu where id_menu=$id_menu";
                $hasil=mysqli_query($kon,$sql);
                $data = mysqli_fetch_assoc($hasil);
            }

            //Cek apakah ada kiriman form dari method post
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $id_menu=htmlspecialchars($_POST["id_menu"]);
                $nama_pembeli=input($_POST["nama_pembeli"]);
                $nama_menu=input($_POST["nama_menu"]);
                $harga_menu=input($_POST["harga_menu"]);

                //Query update data pada tabel anggota
                $sql="update menu set
                    nama_pembeli='$nama_pembeli',
                    nama_menu='$nama_menu',
                    harga_menu='$harga_menu'
                    where id_menu=$id_menu";

                //Mengeksekusi atau menjalankan query diatas
                $hasil=mysqli_query($kon,$sql);

                //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
                if ($hasil) {
                    header("Location:makanan.php");
                }
                else {
                    echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

                }
            }
        ?>

        <h2>Update Data</h2>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            
            <input type="hidden" name="id_menu" value="<?php echo $data['id_menu']; ?>" />
            
            <div class="form-group">
                <label>Nama Pembeli:</label>
                <input type="text" name="nama_pembeli" class="form-control" placeholder="Masukan Nama Pembeli" value="<?php echo $data['nama_pembeli']; ?>" required />
            </div>
            <div class="form-group">
                <label>Nama Menu:</label>
                <input type="text" name="nama_menu" class="form-control" placeholder="Masukan Nama Menu" value="<?php echo $data['nama_menu']; ?>" required/>
            </div>
            <div class="form-group">
                <label>Harga Menu:</label>
                <input type="text" name="harga_menu" class="form-control" placeholder="Masukan Harga Menu" value="<?php echo $data['harga_menu']; ?>" required/>
            </div>
            
            <button type="submit" name="submit" class="btn btn-success">Save</button>
            <a href="makanan.php" class="btn btn-danger">Cancel</a>
        </form>
    </div>
</body>
</html>