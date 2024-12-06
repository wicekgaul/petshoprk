<?php

namespace App\Models;

use CodeIgniter\Model;

class DokterModels extends Model
{
    protected $table      = 'Dokter';
    protected $primaryKey = 'Dokter_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $allowedFields = ['Nama', 'JenisKelamin', 'Telepon', 'Alamat', 'User_id'];

    public function getDokter($Dokter_id = false){
        if ($Dokter_id == false) {
            return $this->db->table('Dokter')
            ->select('User.*, Dokter.*')
            ->join('User', 'User.User_id = Dokter.User_id')
            ->get()->getResult()
            ;
        }
        return $this->db->table('Dokter')
        ->select('User.*, Dokter.*')
        ->where('Dokter.Dokter_id', $Dokter_id)
        ->join('User', 'User.User_id = Dokter.User_id')
        ->get()->getRowObject()
        ;
    }
    
}
