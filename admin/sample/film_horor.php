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
  
  <div class="container text-center mt-5 pt-3">
    <div class="row mb-4">
      <div class="col-sm-3 mt-4">
        <div class="card">
          <img src="img/H Diambang Kematian.jpg" alt="" width="259px" height="340px">
          <div class="card-body">
            <h5 class="card-title">Diambang Kematian</h5>
            <p class="card-text">Hari: Senin</p>
            <p class="card-text">Jam: 09.00</p>
            <p class="card-text">Ruangan: Studio 3</p>
            <p class="card-text">Harga: Rp.35.000</p>
            <a href="create.php" class="btn btn-primary" role="button" target="_blank">Pesan</a>
          </div>
        </div>
      </div>

      <div class="col-sm-3 mt-4">
        <div class="card">
          <img src="img/H KKN di Desa Penari.jpg" alt="" width="259px" height="340px">
          <div class="card-body">
            <h5 class="card-title">KKN di Desa Penari</h5>
            <p class="card-text">Hari: Selasa</p>
            <p class="card-text">Jam: 11.00</p>
            <p class="card-text">Ruangan: Studio 3</p>
            <p class="card-text">Harga: Rp.35.000</p>
            <a href="create.php" class="btn btn-primary" role="button" target="_blank">Pesan</a>
          </div>
        </div>
      </div>

      <div class="col-sm-3 mt-4">
        <div class="card">
          <img src="img/H Makmum 2.jpg" alt="" width="259px" height="340px">
          <div class="card-body">
            <h5 class="card-title">Makmum 2</h5>
            <p class="card-text">Hari: Rabu</p>
            <p class="card-text">Jam: 14.00</p>
            <p class="card-text">Ruangan: Studio 3</p>
            <p class="card-text">Harga: Rp.35.000</p>
            <a href="create.php" class="btn btn-primary" role="button" target="_blank">Pesan</a>
          </div>
        </div>
      </div>

      <div class="col-sm-3 mt-4">
        <div class="card">
          <img src="img/H Satan’s Slaves.jpg" alt="" width="259px" height="340px">
          <div class="card-body">
            <h5 class="card-title">Satan's Slaves</h5>
            <p class="card-text">Hari: Kamis</p>
            <p class="card-text">Jam: 14.00</p>
            <p class="card-text">Ruangan: Studio 3</p>
            <p class="card-text">Harga: Rp.35.000</p>
            <a href="create.php" class="btn btn-primary" role="button" target="_blank">Pesan</a>
          </div>
        </div>
      </div>

      <div class="col-sm-3 mt-4">
        <div class="card">
          <img src="img/H Siksa Neraka.jpg" alt="" width="259px" height="340px">
          <div class="card-body">
            <h5 class="card-title">Siksa Neraka</h5>
            <p class="card-text">Hari: Jumat</p>
            <p class="card-text">Jam: 20.00</p>
            <p class="card-text">Ruangan: Studio 3</p>
            <p class="card-text">Harga: Rp.40.000</p>
            <a href="create.php" class="btn btn-primary" role="button" target="_blank">Pesan</a>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="text-center pt-3 pb-3 bg-dark text-light">
    All Rights Reserved & copy; 2023
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>