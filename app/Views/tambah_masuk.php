<!DOCTYPE html>
<html>
<head>
  <title>Tambah Surat Masuk</title>
  <link rel="stylesheet" href="/css/dashboard.css">

</head>
<body>


<div class="sidebar">
  <h2>Sistem Surat KPU Provinsi Kalimantan Tengah</h2>
  <ul>
    <li><a href="/home">🏠 Home</a></li>
    <li><a href="/surat/masuk">📥 Surat Masuk</a></li>
    <li><a href="/surat/keluar">📤 Surat Keluar</a></li>
    <li><a href="/logout">🚪 Logout</a></li>
  </ul>
</div>

<div class="main">
  <div class="header">📥 Tambah Surat Masuk</div>
  <div class="card">
    <form action="/surat/simpanMasuk" method="post" enctype="multipart/form-data">
      <label>Nomor Surat</label>
      <input id="kolomtambah" type="text" name="nomor_surat" required>

      <label>Keterangan</label>
      <textarea id="kolomtambah" name="keterangan" rows="3" required></textarea>

      <label>Pengirim</label>
      <input id="kolomtambah" type="text" name="pengirim" required>

      <label>Tanggal Masuk</label>
      <input id="kolomtambah" type="date" name="tanggal_masuk" required>

      <label>Kategori</label>
      <select id="kolomtambah" name="kategori">
          <option value="">-- Pilih Kategori Surat --</option>
          <?php
          $kategoriList = [
            "Buku Agenda Surat Masuk",
            "Buku Surat Tugas Sekretaris Tahun 2024/2025",
            "Buku Agenda Surat Keputusan Seketaris Tahun 2025",
            "Buku Agenda Surat Keluar Ketua Tahun 2025",
            "Buku Agenda Distribusi Surat Masuk Bagian Keuangan, Umum, dan Logistik ke Subbag Keuangan dan BMN dan Subbag Umum dan Logistik Tahun 2024",
            "Buku Surat Naskah Dinas Pengaturan",
            "Buku Agenda Surat Undangan Keluar Ketua Tahun 2025",
            "Buku Agenda II Surat Keluar Seketaris",
            "Buku Agenda Surat Tugas Ketua",
            "Buku SPPD",
            "Buku Agenda Surat Keluar Sekretaris"
          ];
          foreach ($kategoriList as $kat) :
            $selected = ($_GET['kategori'] ?? '') === $kat ? 'selected' : '';
            echo "<option value='" . esc($kat) . "' $selected>$kat</option>";
          endforeach;
          ?>
        </select>

      <label>File Surat</label>
        <div class="file-upload">
          <label for="file_surat">📂 Pilih File</label>
          <span id="file-name">Tidak ada file yang dipilih</span>
          <input type="file" name="file_surat" id="file_surat" 
                onchange="document.getElementById('file-name').textContent = this.files[0]?.name || 'Tidak ada file yang dipilih'">
        </div>

      <br>
      <button type="submit" class="btn btn-green">💾 Simpan</button>
      <a href="/surat/masuk" class="btn btn-red">❌ Batal</a>
    </form>
  </div>
</div>

<script>
document.getElementById("fileMasuk").addEventListener("change", function() {
  const fileName = this.files[0] ? this.files[0].name : "Belum ada file dipilih";
  document.getElementById("fileNameMasuk").textContent = fileName;
});
</script>

</body>
</html>
