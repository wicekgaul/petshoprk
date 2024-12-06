<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PeliharaanModels;
use App\Models\RekamMediksModels;
use CodeIgniter\HTTP\ResponseInterface;

class Rekammedik extends BaseController
{
    protected $rekam;
    protected $peliharaan;
    public function __construct() {
        $this->rekam = new RekamMediksModels();
        $this->peliharaan = new PeliharaanModels();
    }

    public function index()
    {
        //
        $dokter_id = session()->get('user')['Dokter_id'];
        $data = [
            'title' => 'Data Rekam Medik Hewan',
            'rekam' => $this->rekam->getRekamDokter(false, $dokter_id),
        ];
        // dd($data);
        return view('dokter/rekammedik/index', $data);
    }
    
    public function tambah() {
        $data = [
            'title' => 'Tambah Data Rekam Medik Hewan',
            'href' => '/Rekammedik',
            'peliharaan' => $this->peliharaan->getPeliharaan(),
        ];
        // dd($data);
        return view('dokter/rekammedik/tambah', $data);
    }

    public function simpan() {
        $this->rekam->save([
            'Keluhan' => $this->request->getVar('Keluhan'),
            'Penanganan' => $this->request->getVar('Penanganan'),
            'Resep' => $this->request->getVar('Resep'),
            'Tanggal' => $this->request->getVar('Tanggal'),
            'Peliharaan_id' => $this->request->getVar('Peliharaan_id'),
            'Dokter_id' => session()->get('user')['Dokter_id'],
        ]);
        return redirect()->to(base_url('/Rekammedik'));
    }

    public function detail($Peliharaan_id) {
        $dokter_id = session()->get('user')['Dokter_id'];
        $rekampeliharaan = $this->rekam->getRekamPeliharaan($Peliharaan_id, $dokter_id);
        if($rekampeliharaan !== null){
            $data = [
                'href' => '/Rekammedik',
                'title' => 'Data Rekam Medik Hewan',
                'item' => $this->rekam->getRekamDokter($Peliharaan_id, $dokter_id),
                'rekam' => $rekampeliharaan,
            ];
            // dd($data);
            return view('dokter/rekammedik/detail', $data);
        }
        return redirect()->to('Rekammedik');
    }

    public function rekam() {
        $this->rekam->save([
            'Keluhan' => $this->request->getVar('Keluhan'),
            'Penanganan' => $this->request->getVar('Penanganan'),
            'Resep' => $this->request->getVar('Resep'),
            'Tanggal' => $this->request->getVar('Tanggal'),
            'Dokter_id' => $this->request->getVar('Dokter_id'),
            'Peliharaan_id' => $this->request->getVar('Peliharaan_id'),
        ]);
        return redirect()->back();
    }
    
    public function deletedetail($Rekammedik_id){
    $dokter_id = session()->get('user')['Dokter_id'];
    $delete = $this->rekam->find($Rekammedik_id);
    $Peliharaan_id = $delete->Peliharaan_id;
    $delete = $this->rekam->delete($Rekammedik_id);
    $rekampeliharaan = $this->rekam->getRekamPeliharaan($Peliharaan_id, $dokter_id);
    if($rekampeliharaan != null){
        return redirect()->back();
    }
    
    if($rekampeliharaan == null){
        return redirect()->to('/Rekammedik');
    }
    }

}