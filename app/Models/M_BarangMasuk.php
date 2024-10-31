<?php

namespace App\Models;

use CodeIgniter\Model;

class M_BarangMasuk extends Model
{
    protected $table = 'barang_masuk';

    public function getBarangMasuk($id = false)
    {
        #code
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['kd_barang' => $id]);
        }
    }

    public function insertBarangMasuk($data)
    {
        # code...
        return $this->db->table($this->table)->insert($data);
    }

    // Save incoming item data
    public function addBarangMasuk($data)
    {
        return $this->insert($data);
    }
}
