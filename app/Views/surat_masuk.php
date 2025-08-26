<!DOCTYPE html>
<html>

<head>
  <title>Surat Masuk</title>
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
    <div class="header">
      📥 Daftar Surat Masuk
    </div>

    <div class="content">
      <a href="/surat/tambahMasuk" class="btn btn-green">+ Tambah Surat Masuk</a>

      <!-- 🔎 Form Pencarian & Filter -->
      <form method="get" action="/surat/masuk" class="filter-form">
        <input id="cari-surat" type="text" name="keyword" placeholder="Cari surat..." value="<?= esc($_GET['keyword'] ?? '') ?>">
        <select name="kategori">
          <option value="">-- Semua Kategori --</option>
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
        <button type="submit" class="btn btn-blue">Filter</button>
      </form>

      <table>
        <thead>
          <tr>
            <th>No</th>
            <th>Nomor Surat</th>
            <th>Keterangan</th>
            <th>Pengirim</th>
            <th>Tanggal Masuk</th>
            <th>Kategori</th>
            <th>File</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($suratMasuk)) : ?>
            <?php $no = 1;
            foreach ($suratMasuk as $row): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= esc($row['nomor_surat']) ?></td>
                <td><?= esc($row['keterangan']) ?></td>
                <td><?= esc($row['pengirim']) ?></td>
                <td><?= esc($row['tanggal_masuk']) ?></td>
                <td><?= esc($row['kategori']) ?></td>
                <td>
                  <?php if ($row['file_surat']) : ?>
                    <a href="/uploads/masuk/<?= esc($row['file_surat']) ?>" target="_blank" class="btn btn-blue">Lihat</a>
                  <?php endif; ?>
                </td>
                <td>
                  <a href="/surat/editMasuk/<?= $row['id'] ?>" class="btn btn-yellow">Edit</a>
                  <a href="/surat/hapusMasuk/<?= $row['id'] ?>" class="btn btn-red" onclick="return confirm('Hapus data ini?')">Hapus</a>
                </td>
              </tr>
            <?php endforeach ?>
          <?php else : ?>
            <tr>
              <td colspan="8" class="text-center">Tidak ada data</td>
            </tr>
          <?php endif ?>
        </tbody>
      </table>
    </div>
  </div>

</body>

</html>