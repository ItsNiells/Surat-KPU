<!DOCTYPE html>
<html>
<head>
  <title>Edit Surat Keluar</title>
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
  <div class="header">✏️ Edit Surat Keluar</div>
  <div class="card">
    <form action="/surat/updateKeluar/<?= $surat['id'] ?>" method="post" enctype="multipart/form-data">
      <label>Nomor Surat</label>
      <input id="kolomtambah" type="text" name="nomor_surat" value="<?= esc($surat['nomor_surat']) ?>" required>

      <label>Keterangan</label>
      <textarea id="kolomtambah" name="keterangan" rows="3" required><?= esc($surat['keterangan']) ?></textarea>

      <label>Tujuan</label>
      <input id="kolomtambah" type="text" name="tujuan" value="<?= esc($surat['tujuan']) ?>" required>

      <label>Tanggal Keluar</label>
      <input id="kolomtambah" type="date" name="tanggal_keluar" value="<?= esc($surat['tanggal_keluar']) ?>" required>

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

      <?php if ($surat['file_surat']) : ?>
        <div class="old-file">
          <label>File Lama:</label><br>
          <a href="/uploads/keluar/<?= esc($surat['file_surat']) ?>" target="_blank" class="btn btn-green">📂 Lihat File Lama</a>
        </div>
      <?php endif; ?>

      <br>
      <button type="submit" class="btn btn-blue">🔄 Update</button>
      <a href="/surat/keluar" class="btn btn-red">❌ Batal</a>
    </form>
  </div>
</div>

<script>
document.getElementById("editFileKeluar").addEventListener("change", function() {
  const fileName = this.files[0] ? this.files[0].name : "Belum ada file dipilih";
  document.getElementById("editFileNameKeluar").textContent = fileName;
});
</script>

</body>
</html>
