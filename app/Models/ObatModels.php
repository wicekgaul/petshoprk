<?php

namespace App\Models;

use CodeIgniter\Model;

class ObatModels extends Model
{
    protected $table      = 'Obat';
    protected $primaryKey = 'Obat_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $allowedFields = ['Kode', 'Nama', 'Satuan', 'Keterangan', 'Dokter_id'];

    public function getObat($Obat_id = false){
        // Jika Obat_id tidak disediakan, ambil semua data
        if($Obat_id == false){
            return $this->db->table('Obat')
                ->select('Obat.*, Obat.Nama as Namaobat')
                ->join('Dokter', 'Dokter.Dokter_id = Obat.Dokter_id', 'LEFT')
                ->get()->getResult();
        }
    
        // Jika Obat_id disediakan, ambil data spesifik dengan filter
        return $this->db->table('Obat')
            ->select('Obat.*, Obat.Nama as Namaobat')
            ->join('Dokter', 'Dokter.Dokter_id = Obat.Dokter_id', 'LEFT')
            ->where('Obat.Obat_id', $Obat_id) // Tambahkan filter WHERE
            ->get()->getRowObject();
    }
}
