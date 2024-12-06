<?php

namespace App\Models;

use CodeIgniter\Model;

class ObatMasukModels extends Model
{
    protected $table      = 'ObatMasuk';

    protected $primaryKey = 'ObatMasuk_id';

    protected $allowedFields = ['Tanggal', 'Asal', 'Catatan'];
    protected $returnType = 'object';

    public function getObatmasuk($Tanggal = false, $Asal = null){
        return $this->db->table('ObatMasuk')
        ->where('ObatMasuk.Tanggal', $Tanggal)
        ->where('ObatMasuk.Asal', $Asal)
        ->get()->getRowObject()
        ;
    }
}