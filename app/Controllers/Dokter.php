<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DokterModels;
use App\Models\UserModels;
use CodeIgniter\HTTP\ResponseInterface;

class Dokter extends BaseController
{

    protected $dokter;
    protected $User;
    public function __construct() {
        $this->dokter = new DokterModels();
        $this->User = new UserModels();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Dokter',
            'dokter' => $this->dokter->getDokter(),
        ];
        return view('admin/dokter/index', $data);
    }

    function tambah(): string
    {
        $data = [
            'title' => "Tambah Data Dokter",
        ];
        return view('admin/dokter/tambah', $data);
    }
    function simpan()
    {
        $user = [
            'Username' => $this->request->getVar('Username'),
            'Password' => Password_hash($this->request->getVar('Password'), PASSWORD_DEFAULT),
            'Email' => $this->request->getVar('Email'),
            'Role' => 'Dokter'
        ];
        // dd($user);
        $User_id = $this->User->save($user);
        $DataUser = $this->User->insertId($User_id);

        $data = [
            'Nama' => $this->request->getVar('Nama'),
            'JenisKelamin' => $this->request->getVar('JenisKelamin'),
            'Telepon' => $this->request->getVar('Telepon'),
            'Alamat' => $this->request->getVar('Alamat'),
            'User_id' => $DataUser,
        ];
        // dd($data);
        $this->dokter->save($data);
        return redirect()->to(base_url('Dokter'));
    }
    function ubah($Dokter_id): string
    {
        $data = [
            'judul' => "Ubah Dokter Hewan",
            'title' => "PETSHOP | Dokter",
            'dokter' => $this->dokter->getDokter($Dokter_id),
        ];
        // dd($data);
        return view('admin/dokter/ubah', $data);
    }
    function update($Dokter_id)
    {
        $data = [
            'Dokter_id' => $Dokter_id,
            'Nama' => $this->request->getVar('Nama'),
            'Alamat' => $this->request->getVar('Alamat'),
            'Telepon' => $this->request->getVar('Telepon'),
            'JenisKelamin' => $this->request->getVar('JenisKelamin'),
            'User_id' => $this->request->getVar('User_id'),
        ];
        $this->dokter->save($data);
        return redirect()->to(base_url('/Dokter'));
    }

    public function reset($Dokter_id) {
        $data = $this->dokter->getDokter($Dokter_id)->User_id;
        $datauser = $this->User->find($data);
        if($data = $datauser)
        {
            $newPassword = password_hash($datauser['Username'], PASSWORD_BCRYPT); // Hash password

            // Update password di database
            $this->User->update($datauser['User_id'], ['password' => $newPassword]);

            // Redirect kembali dengan pesan sukses
            return redirect()->to('/Dokter')->with('success', 'Password berhasil direset. Password baru: default123');
    }
}

    function delete($Dokter_id)
    {
        $data = $this->dokter->getDokter($Dokter_id);
        if ($data) {
            $User_id = $data->User_id;
            $this->User->delete($User_id);
            return redirect()->back(); // Atau respons sukses
        } else {
            // Data dokter tidak ditemukan
            return redirect()->back(); // Atau respons error
        }
    }
    
}