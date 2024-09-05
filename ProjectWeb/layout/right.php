<?php
include "../admin/koneksi.php";
?>
<div class="right-column">
  <div class="section">
    <h2><a href="#">Pengumuman</a></h2>

    <ul class="announcement">
      <?php
      $sql = "select * from pengumuman order by id_pengumuman desc limit 3";
      $hasil = mysqli_query($koneksi, $sql);
      $no = 0;
      while ($data = mysqli_fetch_array($hasil)) {
        $no++;
      ?>
        <li><?php echo $data["judul_pengumuman"]; ?></li>
      <?php
      }
      ?>
    </ul>

  </div>

  <div class="section">
    <h2><a href="#">Agenda Kegiatan</a></h2>
    <ul class="agenda">
      <?php
      $sql = "select * from agenda order by id_agenda desc limit 3";
      $hasil = mysqli_query($koneksi, $sql);
      $no = 0;
      while ($data = mysqli_fetch_array($hasil)) {
        $no++;
      ?>
        <li>
          <a href="">
            <p><?php echo $data["tanggal_kegiatan"]; ?></p>
            <h4><?php echo $data["judul_kegiatan"]; ?></h4>
            <p><?php echo $data["lokasi_kegiatan"]; ?></p>
          </a>
        </li>
      <?php
      }
      ?>
    </ul>
  </div>
</div>