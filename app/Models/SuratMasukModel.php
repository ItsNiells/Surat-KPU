<?php

namespace App\Models;
use CodeIgniter\Model;

class SuratMasukModel extends Model
{
    protected $table = 'surat_masuk';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nomor_surat', 'keterangan', 'pengirim', 'tanggal_masuk', 'kategori', 'file_surat'];

}
