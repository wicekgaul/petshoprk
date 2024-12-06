<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ObatMasukItemModels;
use App\Models\ObatMasukModels;
use App\Models\ObatModels;
use CodeIgniter\HTTP\ResponseInterface;

class Obat extends BaseController
{

    protected $obat;
    protected $itemobat;
    protected $obatmasuk;
    public function __construct() {
        $this->obat = new ObatModels();
        $this->obatmasuk = new ObatMasukModels();
        $this->itemobat = new ObatMasukItemModels();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Obat',
            'obat' => $this->obat->getObat(),
        ];
        return view('dokter/obat/index', $data);
    }
    public function tambah()
    {
        $data = [
            'title' => 'Data Obat',
            'href' => '/Obat',
        ];
        return view('dokter/obat/tambah', $data);
    }
    public function simpan()
    {
        $ddokter = session()->get('user')['Dokter_id'];
        $this->obat->save([
            'Kode' => $this->request->getVar('Kode'),
            'Nama' => $this->request->getVar('Nama'),
            'Satuan' => $this->request->getVar('Satuan'),
            'Keterangan' => $this->request->getVar('Keterangan'),
            'Dokter_id' => $ddokter,
        ]);    
        return redirect()->to('/Obat'); 
    }
    public function detail($Obat_id)
    {
        $data = [
            'title' => 'Obat Masuk',
            'href' => '/Obat',
            'item' => $this->obat->getObat($Obat_id),
            'itemObat' => $this->itemobat->getObatmasuk($Obat_id),
            'totalmasuk' => $this->itemobat->totalJumlahObatMasuk($Obat_id),
        ];
        // dd($data);
        return view('dokter/obat/detail', $data);
    }

    public function delete($Obat_id)
    {
        // Ambil ObatMasukItem_id dari request POST
        $ObatMasukItem_id = $this->request->getJSON()->id;
    
        if (!$ObatMasukItem_id) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'ID item tidak ditemukan.'
            ]);
        }
    
        // Hapus item berdasarkan ObatMasukItem_id
        $deleted = $this->itemobat->delete($ObatMasukItem_id);
    
        if ($deleted) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Data berhasil dihapus.'
            ]);
            return redirect()->back();
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Gagal menghapus data.'
            ]);
        }
    }
    


    public function itemsave() {
        $tanggal = $this->request->getVar('Tanggal');
        $AsalObat = $this->request->getVar('Asal');
        $dataobat = $this->obatmasuk->getObatmasuk($tanggal, $AsalObat);
    
        if ($dataobat) {
            // Jika data ditemukan, langsung simpan ke itemobat
            $this->itemobat->save([
                'Jumlah' => $this->request->getVar('Jumlah'),
                'Obat_id' => $this->request->getVar('Obat_id'),
                'ObatMasuk_id' => $dataobat->ObatMasuk_id,
            ]);
            return redirect()->back();
        }else{
            $data = [
                'Tanggal' => $this->request->getVar('Tanggal'),
                'Asal' => $this->request->getVar('Asal'),
                'Catatan' => $this->request->getVar('Catatan'),
            ];
            $obatmasuk = $this->obatmasuk->save($data);
            $Obatmasuk_id = $this->obatmasuk->insertId($obatmasuk);
    
            $this->itemobat->save([
                'Jumlah' => $this->request->getVar('Jumlah'),
                'Obat_id' => $this->request->getVar('Obat_id'),
                'ObatMasuk_id' => $Obatmasuk_id,
            ]);
            return redirect()->back();
        }

        // Jika data dengan Asal tidak ditemukan (Asal == null), buat entri baru di ObatMasuk
        if ($dataobat === null || $dataobat->Asal === null) {
            $data = [
                    'Tanggal' => $dataobat ? $dataobat->Tanggal : $this->request->getVar('Tanggal'),
                    'Asal' => $this->request->getVar('Asal'),
                    'Catatan' => $this->request->getVar('Catatan'),
                ];
                $obatmasuk = $this->obatmasuk->save($data);
                $Obatmasuk_id = $this->obatmasuk->insertId($obatmasuk);
        
                $this->itemobat->save([
                    'Jumlah' => $this->request->getVar('Jumlah'),
                    'Obat_id' => $this->request->getVar('Obat_id'),
                    'ObatMasuk_id' => $Obatmasuk_id,
                ]);
                return redirect()->back();
        }

    }
}