<?php

namespace App\Controllers;

use App\Models\M_Barang;
use App\Models\M_BarangMasuk;
use CodeIgniter\Controller;

class BarangMasuk extends Controller
{
    protected $barangModel;
    protected $barangMasukModel;

    public function index()
    {
        # code..
        $model = new M_BarangMasuk();
        $data['barangmasuk'] = $model->getBarangMasuk();
        echo view('barangmasuk/index', $data);
    }

    public function store()
    {
        $kodeBarang = $this->request->getPost('kd_barang');
        $jumlahMasuk = $this->request->getPost('jml');
        $keterangan = $this->request->getPost('keterangan');
        $tglMasuk = date('Y-m-d'); // Set the current date for tgl_masuk

        // Verify if the item exists in the `barang` table
        $barang = $this->barangModel->getByKodeBarang($kodeBarang);
        if (!$barang) {
            return redirect()->back()->with('error', 'Kode barang tidak ditemukan.');
        }

        // Update stock in `barang` table
        $this->barangModel->updateJumlah($kodeBarang, $jumlahMasuk);

        // Save entry in `barang_masuk` table
        $dataMasuk = [
            'kd_barang' => $kodeBarang,
            'tgl_masuk' => $tglMasuk,
            'jml' => $jumlahMasuk,
            'keterangan' => $keterangan
        ];
        $this->barangMasukModel->addBarangMasuk($dataMasuk);

        return redirect()->back()->with('success', 'Barang masuk berhasil ditambahkan.');
    }
}
