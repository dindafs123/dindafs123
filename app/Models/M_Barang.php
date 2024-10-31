<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Barang extends Model
{
    protected $table = 'barang';

    public function getBarang($id = false)
    {
        #code
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['kd_barang' => $id]);
        }
    }

    public function insertBarang($data)
    {
        # code...
        return $this->db->table($this->table)->insert($data);
    }

    public function updateBarang($data, $id)
    {
        # code...
        return $this->db->table($this->table)->update($data, ['kd_barang' => $id]);
    }

    public function updateJumlahBarang($id_barang, $new_jumlah)
    {
        return $this->update($id_barang, ['jumlah' => $new_jumlah]);
    }

    // Retrieve item data by item code
    public function getByKodeBarang($kodeBarang)
    {
        return $this->where('kd_barang', $kodeBarang)->first();
    }

    // Update item quantity
    public function updateJumlah($kodeBarang, $jumlahMasuk)
    {
        $barang = $this->getByKodeBarang($kodeBarang);
        if ($barang) {
            $newJumlah = $barang['jml'] + $jumlahMasuk;
            $this->update($barang['kd_barang'], ['jml' => $newJumlah]);
            return true;
        }
        return false;
    }
}
