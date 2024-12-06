<?php

namespace App\Models;

use CodeIgniter\Model;

class  PeliharaanModels extends Model
{
    protected $table      = 'Peliharaan';

    protected $primaryKey = 'Peliharaan_id';

    protected $allowedFields = ['Nama', 'Jenis', 'Ras', 'Usia', 'BeratBadan', 'Pemilik_id'];

    public function getPeliharaan($Peliharaan_id = false)
    {
        if ($Peliharaan_id == false) {
            return $this->db->table('Peliharaan')
                ->select('Peliharaan.*, Pemilik.Nama as pemilik_Nama')
                ->join('Pemilik', 'Pemilik.Pemilik_id = Peliharaan.Pemilik_id') 
                ->get()->getResult();
        }
        return $this->db->table('Peliharaan')
            ->select('Peliharaan.*, Pemilik.Nama as pemilik_Nama')
            ->where('Peliharaan.Peliharaan_id', $Peliharaan_id)
            ->join('Pemilik', 'Pemilik.Pemilik_id = Peliharaan.Pemilik_id') 
            ->get()
            ->getRowObject();
    }
}
