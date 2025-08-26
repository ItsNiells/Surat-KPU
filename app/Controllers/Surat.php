<?php

namespace App\Controllers;

use App\Models\SuratMasukModel;
use App\Models\SuratKeluarModel;

class Surat extends BaseController
{
    protected $suratMasukModel;
    protected $suratKeluarModel;

    public function __construct()
    {
        $this->suratMasukModel  = new SuratMasukModel();
        $this->suratKeluarModel = new SuratKeluarModel();
    }

    /* ==========================
     *   SURAT MASUK
     * ========================== */

    public function indexMasuk()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $keyword  = $this->request->getGet('keyword');
        $kategori = $this->request->getGet('kategori');

        $builder = $this->suratMasukModel;
        if ($keyword) {
            $builder->groupStart()
                ->like('nomor_surat', $keyword)
                ->orLike('keterangan', $keyword)
                ->orLike('pengirim', $keyword)
                ->groupEnd();
        }
        if ($kategori) {
            $builder->where('kategori', $kategori);
        }

        $data['suratMasuk'] = $builder->findAll();
        return view('surat_masuk', $data);
    }

    public function tambahMasuk()
    {
        return view('tambah_masuk');
    }

    public function simpanMasuk()
    {
        $file     = $this->request->getFile('file_surat');
        $fileName = ($file && $file->isValid() && !$file->hasMoved())
            ? $file->getRandomName()
            : null;

        if ($fileName) {
            $file->move('uploads/masuk', $fileName);
        }

        $this->suratMasukModel->save([
            'nomor_surat'   => $this->request->getPost('nomor_surat'),
            'keterangan'    => $this->request->getPost('keterangan'),
            'pengirim'      => $this->request->getPost('pengirim'),
            'tanggal_masuk' => $this->request->getPost('tanggal_masuk'),
            'kategori'      => $this->request->getPost(index: 'kategori'),
            'file_surat'    => $fileName,
        ]);

        return redirect()->to('/surat/masuk')->with('success', 'Surat masuk berhasil disimpan.');
    }

    public function editMasuk($id)
    {
        $data['surat'] = $this->suratMasukModel->find($id);
        return view('edit_masuk', $data);
    }

    public function updateMasuk($id)
    {
        $data = [
            'nomor_surat'   => $this->request->getPost('nomor_surat'),
            'keterangan'    => $this->request->getPost('keterangan'),
            'pengirim'      => $this->request->getPost('pengirim'),
            'tanggal_masuk' => $this->request->getPost('tanggal_masuk'),
            'kategori'      => $this->request->getPost('kategoori'),
        ];

        $file = $this->request->getFile('file_surat');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('uploads/masuk', $fileName);
            $data['file_surat'] = $fileName;
        }

        $this->suratMasukModel->update($id, $data);
        return redirect()->to('/surat/masuk')->with('success', 'Surat masuk berhasil diperbarui.');
    }

    public function hapusMasuk($id)
    {
        $this->suratMasukModel->delete($id);
        return redirect()->to('/surat/masuk')->with('success', 'Surat masuk berhasil dihapus.');
    }


    /* ==========================
     *   SURAT KELUAR
     * ========================== */

    public function indexKeluar()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $keyword  = $this->request->getGet('keyword');
        $kategori = $this->request->getGet('kategori');

        $builder = $this->suratKeluarModel;
        if ($keyword) {
            $builder->groupStart()
                ->like('nomor_surat', $keyword)
                ->orLike('keterangan', $keyword)
                ->orLike('tujuan', $keyword)
                ->groupEnd();
        }
        if ($kategori) {
            $builder->where('kategori', $kategori);
        }

        $data['suratKeluar'] = $builder->findAll();
        return view('surat_keluar', $data);
    }

    public function tambahKeluar()
    {
        return view('tambah_keluar');
    }

    public function simpanKeluar()
    {
        $file     = $this->request->getFile('file_surat');
        $fileName = ($file && $file->isValid() && !$file->hasMoved())
            ? $file->getRandomName()
            : null;

        if ($fileName) {
            $file->move('uploads/keluar', $fileName);
        }

        try {
            $this->suratKeluarModel->save([
                'nomor_surat'    => $this->request->getPost('nomor_surat'),
                'keterangan'     => $this->request->getPost('keterangan'),
                'tujuan'         => $this->request->getPost('tujuan'),
                'tanggal_keluar' => $this->request->getPost('tanggal_keluar'),
                'kategori'       => $this->request->getPost(index: 'kategori'),
                'file_surat'     => $fileName,
            ]);

            return redirect()->to('/surat/keluar')->with('success', 'Surat keluar berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan surat keluar: ' . $e->getMessage());
        }
    }

    public function editKeluar($id)
    {
        $data['surat'] = $this->suratKeluarModel->find($id);
        return view('edit_keluar', $data);
    }

    public function updateKeluar($id)
    {
        $data = [
            'nomor_surat'    => $this->request->getPost('nomor_surat'),
            'keterangan'     => $this->request->getPost('keterangan'),
            'tujuan'         => $this->request->getPost('tujuan'),
            'tanggal_keluar' => $this->request->getPost('tanggal_keluar'),
            'kategori'       => $this->request->getPost('kategori')   
        ];

        $file = $this->request->getFile('file_surat');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('uploads/keluar', $fileName);
            $data['file_surat'] = $fileName;
        }

        $this->suratKeluarModel->update($id, $data);
        return redirect()->to('/surat/keluar')->with('success', 'Surat keluar berhasil diperbarui.');
    }

    public function hapusKeluar($id)
    {
        $this->suratKeluarModel->delete($id);
        return redirect()->to('/surat/keluar')->with('success', 'Surat keluar berhasil dihapus.');
    }

}
