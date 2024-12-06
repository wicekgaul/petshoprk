<?php

namespace App\Models;

use CodeIgniter\Model;

class RekamMediksModels extends Model
{
    protected $table      = 'RekamMediks';

    protected $primaryKey = 'RekamMediks_id';
    protected $returnType = 'object';
    protected $allowedFields = [
        'Peliharaan',
        'Keluhan',
        'Penanganan',
        'Resep',
        'Tanggal',
        'Dokter_id',
        'Peliharaan_id'
    ];

    public function getRekamDokter($Peliharaan_id = false, $Dokter_id = null){
    if ($Peliharaan_id == false) {
        $query = $this->db->table('RekamMediks')
            ->select('RekamMediks.*, Peliharaan.*, Pemilik.*, Dokter.*, Pemilik.Nama as NamaPemilik, Peliharaan.Nama as NamaPeliharaan,  Dokter.Nama as NamaDokter') 
            ->join('Dokter', 'Dokter.Dokter_id = RekamMediks.Dokter_id', 'LEFT')
            ->join('Peliharaan', 'Peliharaan.Peliharaan_id = RekamMediks.Peliharaan_id', 'LEFT')
            ->join('Pemilik', 'Pemilik.Pemilik_id = Peliharaan.Pemilik_id', 'LEFT'); // Join ke tabel Pemilik
            // ->where('RekamMediks.Dokter_id', $Dokter_id); // Filter berdasarkan Dokter_id
            if ($Dokter_id !== null) {
                $query->where('RekamMediks.Dokter_id', $Dokter_id);
            }
            return $query->get()->getResult();
        }
        
        return $this->db->table('RekamMediks')
        ->select('RekamMediks.*, Peliharaan.*, Pemilik.*, Dokter.*, Pemilik.Nama as NamaPemilik, Peliharaan.Nama as NamaPeliharaan,  Dokter.Nama as NamaDokter') 
        ->join('Dokter', 'Dokter.Dokter_id = RekamMediks.Dokter_id', 'LEFT')
        ->join('Peliharaan', 'Peliharaan.Peliharaan_id = RekamMediks.Peliharaan_id', 'LEFT')
        ->join('Pemilik', 'Pemilik.Pemilik_id = Peliharaan.Pemilik_id', 'LEFT') // Join ke tabel Pemilik
        ->where('RekamMediks.Peliharaan_id', $Peliharaan_id) // Filter berdasarkan Peliharaan_id
        ->where('Rekammediks.Dokter_id', $Dokter_id) // Filter berdasarkan ID Peliharaan jika diberikan
        ->get()->getRowObject();
    }

    public function getRekamPeliharaan($Peliharaan_id, $Dokter_id = null){
        return $this->db->table('RekamMediks')
            ->select('RekamMediks.*, Peliharaan.*, Pemilik.*, Pemilik.Nama as NamaPemilik, Peliharaan.Nama as NamaPeliharaan') // Menambahkan Nama Pemilik
            ->join('Peliharaan', 'Peliharaan.Peliharaan_id = RekamMediks.Peliharaan_id', 'LEFT')
            ->join('Pemilik', 'Pemilik.Pemilik_id = Peliharaan.Pemilik_id', 'LEFT') // Join ke tabel Pemilik
            ->where('RekamMediks.Peliharaan_id', $Peliharaan_id) // Filter berdasarkan Peliharaan_id
            ->where('RekamMediks.Dokter_id', $Dokter_id) // Filter berdasarkan Dokter_id
            ->get()->getResult();
    }


}