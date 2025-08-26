<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login | Sistem Surat KPU</title>
  <link rel="stylesheet" href="<?= base_url('css/style.css') ?>" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
</head>
<body>
  <div class="container" id="container">
    <div class="form-container sign-in">
      <form action="<?= base_url('auth/login') ?>" method="post">
        <h1>Login Sistem Surat KPU</h1><br>
        <br><span>Masukkan username dan password Anda</span>

        <?php if (session()->getFlashdata('error')): ?>
          <div style="color: red; margin: 10px 0;">
            <?= session()->getFlashdata('error') ?>
          </div>
        <?php endif; ?>

        <input type="text" name="username" placeholder="Username" required />
        <input type="password" name="password" placeholder="Password" required />
        <button type="submit">Login</button>
      </form>
    </div>

    <div class="toggle-container">
      <div class="toggle">
        <div class="toggle-panel toggle-left">
          <h1>Selamat Datang!</h1>
          <p>Silakan login untuk mengakses sistem surat masuk/keluar KPU</p>
        </div>
      </div>
    </div>
  </div>

  <script src="<?= base_url('js/script.js') ?>"></script>
</body>
</html>
