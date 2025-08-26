<?php

namespace App\Models;
use CodeIgniter\Model;

class SuratKeluarModel extends Model
{
    protected $table = 'surat_keluar';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nomor_surat', 'keterangan', 'tujuan', 'tanggal_keluar', 'kategori', 'file_surat'];
}
