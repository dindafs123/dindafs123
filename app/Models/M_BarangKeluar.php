<?php

namespace App\Models;

use CodeIgniter\Model;

class M_BarangKeluar extends Model
{
    protected $table = 'barang_keluar';

    public function getBarangKeluar($id = false)
    {
        #code
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['kd_barang' => $id]);
        }
    }

    public function insertBarangKeluar($data)
    {
        # code...
        return $this->db->table($this->table)->insert($data);
    }
}
