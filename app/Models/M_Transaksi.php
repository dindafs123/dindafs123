<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Transaksi extends Model
{
    protected $table = 'transaksi';  // Nama tabel
    protected $primaryKey = 'kd_trans';     // Primary key tabel
    protected $allowedFields = ['kd_barang', 'jml', 'total_harga', 'tgl_trans', 'mtd_pembayaran', 'stts_pembayaran'];

    public function index()
    {
        $transaksiModel = new M_Transaksi();
        $data['transaksi'] = $transaksiModel->findAll(); // Ambil semua data dari tabel transaksi
        return view('transaksi/index', $data);
    }

    public function getTransaksi($id = null)
    {
        if ($id) {
            return $this->where(['kd_trans' => $id])->first();
        }
        return $this->findAll();
    }

    public function createTransaksi($data)
    {
        return $this->insert($data);
    }
}
