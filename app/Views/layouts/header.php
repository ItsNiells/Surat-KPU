<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Sistem Surat KPU' ?></title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('css/style.css?v=1.2') ?>">
</head>
<body style="background: linear-gradient(to right, #fffefe, #ac4141);">

<?php if (session()->get('isLoggedIn')): ?>
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0"><?= $title ?? '' ?></h2>
        <a href="/logout" class="btn btn-outline-danger btn-sm">Logout</a>
    </div>
<?php endif; ?>
