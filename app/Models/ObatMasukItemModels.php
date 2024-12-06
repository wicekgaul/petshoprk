<?php

namespace App\Models;

use CodeIgniter\Model;

class ObatMasukItemModels extends Model
{
    protected $table      = 'ObatMasukItem';
    protected $primaryKey = 'ObatMasukItem_id';
    protected $allowedFields = ['Jumlah', 'Obat_id', 'ObatMasuk_id'];

    public function getObatmasuk($Obat_id){
            return $this->db->table('ObatMasukItem')
            ->select('ObatMasukItem.*, ObatMasuk.*')
            ->join('Obat', 'Obat.Obat_id = ObatMasukItem.Obat_id', 'LEFT')
            ->join('ObatMasuk', 'ObatMasuk.ObatMasuk_id = ObatMasukItem.ObatMasuk_id', 'RIGTH')
            ->where('ObatMasukItem.Obat_id', $Obat_id )
            // ->where('ObatMasuk.Tanggal', 'Tanggal' )
            // ->where('ObatMasuk.Asal', 'Asal' )
            ->get()->getResult()
            ;
        }
    
    public function totalJumlahObatMasuk($Obat_id)
    {
        return $this->db->table('ObatMasukItem')
            ->selectSum('Jumlah', 'jumlah_totalMasuk') // Ganti alias menjadi 'jumlah_total'
            ->where('Obat_id', $Obat_id)
            ->get()->getRow();
    }


}