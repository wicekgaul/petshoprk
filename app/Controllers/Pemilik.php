<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PemilikModels;
use CodeIgniter\HTTP\ResponseInterface;

class Pemilik extends BaseController
{
    protected $pemilik;
    public function __construct() {
        $this->pemilik = new PemilikModels();
    }

    public function index(): string
    {
        $data = [
            'title' => 'Data Tabel',
            // 'active' => 'active',
            'judul' => "Pemilik Hewan",
            'data' => $this->pemilik->findAll(),
        ];
        return view('admin/pemilik/index', $data);
    }

    function tambah(): string
    {
        $data = [
            'title' => "Tambah data Pemilik",
        ];
        return view('admin/pemilik/tambah', $data);
    }

    function simpan()
    {
        $this->pemilik->save(
            [
                'Nama' => $this->request->getVar('Nama'),
                'Alamat' => $this->request->getVar('Alamat'),
                'Telepon' => $this->request->getVar('Telepon'),
                'Email' => $this->request->getVar('Email'),
            ]
        );
        // $this->pemilik->save($data);
        return redirect()->to(base_url('Pemilik'));
    }

    function ubah($pemilik_id = null): string
    {
        $data = [
            'judul' => "Ubah Pemilik Hewan",
            'title' => "PETHSOP | Pemilik",
            'item' => $this->pemilik->where('Pemilik_id', $pemilik_id)->first(),
        ];
        return view('admin/pemilik/ubah', $data);
    }
    
    function update()
    {
        $this->pemilik->save([
            'Pemilik_id' => $this->request->getVar('Pemilik_id'),
            'Nama' => $this->request->getVar('Nama'),
            'Alamat' => $this->request->getVar('Alamat'),
            'Telepon' => $this->request->getVar('Telepon'),
            'Email' => $this->request->getVar('Email'),
        ]);
        return redirect()->to(base_url('Pemilik'));
    }

    function delete($Pemilik_id = null)
    {
        $this->pemilik->delete($Pemilik_id);
        return redirect()->to(base_url('Pemilik'));
    }

}