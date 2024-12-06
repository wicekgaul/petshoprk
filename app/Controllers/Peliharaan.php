<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PeliharaanModels;
use App\Models\PemilikModels;
use CodeIgniter\HTTP\ResponseInterface;

class Peliharaan extends BaseController
{

    protected $pemilik;
    protected $peliharaan;
    public function __construct() {
        $this->pemilik = new PemilikModels();
        $this->peliharaan = new PeliharaanModels();
    }

    public function index(): string
    {
        $data = [
            'title' => 'Data Peliharaan',
            // 'active' => 'active',
            'data' => $this->peliharaan->getPeliharaan()
        ];
        return view('admin/peliharaan/index', $data);
    }

    function tambah(): string
    {
        $data = [
            'judul' => "Tambah Peliharaan Hewan",
            'title' => "Tambah data Peliharaan",
            'pemilik' => $this->pemilik->getPemilik()

        ];
        return view('admin/peliharaan/tambah', $data);
    }
    function simpan()
    {
        $data = [
            'Nama' => $this->request->getVar('Nama'),
            'Jenis' => $this->request->getVar('Jenis'),
            'Ras' => $this->request->getVar('Ras'),
            'Usia' => $this->request->getVar('Usia'),
            'BeratBadan' => $this->request->getVar('BeratBadan'),
            'Pemilik_id' => $this->request->getVar('Pemilik_id'),
        ];
        // dd($data);
        $this->peliharaan->save($data);
        return redirect()->to(base_url('/Peliharaan'));
    }
    function ubah($Peliharaan_id): string
    {
        $data = [
            'judul' => "Ubah Peliharaan Hewan",
            'title' => "Ubah Data Peliharaan",
            'item' => $this->peliharaan->getPeliharaan($Peliharaan_id),
            'pemilik' => $this->pemilik->getPemilik()
        ];
        // dd($data);
        return view('admin/peliharaan/ubah', $data);
    }
    function update($Peliharaan_id)
    {
        $this->peliharaan->save([
            'Peliharaan_id' => $Peliharaan_id,
            'Nama' => $this->request->getVar('Nama'),
            'Jenis' => $this->request->getVar('Jenis'),
            'Ras' => $this->request->getVar('Ras'),
            'Usia' => $this->request->getVar('Usia'),
            'BeratBadan' => $this->request->getVar('BeratBadan'),
            'Pemilik_id' => $this->request->getVar('Pemilik_id'),
        ]);
        
        return redirect()->to(base_url('/Peliharaan'));
    }

    function delete($Peliharaan_id = null)
    {
        $this->peliharaan->delete($Peliharaan_id);
        return redirect()->to(base_url('/Peliharaan'));
    }

}
