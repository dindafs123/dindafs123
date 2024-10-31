<?php

namespace App\Controllers;

use App\Models\M_Barang;
use App\Models\M_BarangKeluar;
use CodeIgniter\Controller;

class BarangKeluar extends Controller
{
    public function index()
    {
        # code..
        $model = new M_BarangKeluar();
        $data['barangkeluar'] = $model->getBarangKeluar();
        echo view('barangkeluar/index', $data);
    }

    public function store()
    {
        $barangModel = new M_Barang();
        $barangKeluarModel = new M_BarangKeluar();

        $id_barang = $this->request->getPost('kd_barang');
        $jumlah_keluar = $this->request->getPost('jumlah');

        // Update stok barang
        $barang = $barangModel->find($id_barang);
        $new_jumlah = $barang['jumlah'] + $jumlah_keluar;

        $barangModel->updateJumlahBarang($id_barang, $new_jumlah);

        // Simpan data barang masuk
        $data = [
            'kd_barang'  => $id_barang,
            'tgl_keluar'  => $this->request->getPost('tgl_keluar'),
            'jumlah'     => $jumlah_keluar,
            'keterangan' => $this->request->getPost('keterangan'),
        ];

        $barangKeluarModel->insertBarangKeluar($data);

        return redirect()->to('/barang_keluar');
    }
}
