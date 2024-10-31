<?php

namespace App\Controllers;

use App\Models\M_Barang;
use App\Models\M_Transaksi;
use CodeIgniter\Controller;

class Transaksi extends Controller
{
    protected $transaksiModel;

    public function __construct()
    {
        // Inisialisasi model
        $this->transaksiModel = new M_Transaksi();
    }

    public function index()
    {
        # code..
        $model = new M_Transaksi();
        $data['transaksi'] = $model->getTransaksi();
        echo view('transaksi/index', $data);
    }

    public function create()
    {
        return view('transaksi/create');
    }

    public function store()
    {
        $transaksiModel = new M_Transaksi();
        // Load validation service
        $validation = \Config\Services::validation();

        // Data array to be validated and saved
        $data = array(
            'kd_barang' => $this->request->getPost('kd_barang'),
            'jml' => $this->request->getPost('jml'),
            'total_harga' => $this->request->getPost('total_harga'),
            'tgl_trans' => $this->request->getPost('tgl_trans'),
            'mtd_pembayaran' => $this->request->getPost('mtd_pembayaran'),
            'stts_pembayaran' => $this->request->getPost('stts_pembayaran')
        );

        $transaksiModel->createTransaksi($data);
        return redirect()->to('/transaksi');
    }

    // Menampilkan form untuk mengedit transaksi
    public function edit($id)
    {
        $model = new M_Transaksi();
        $data['transaksi'] = $model->getTransaksi($id);

        if (!$data['transaksi']) {
            // Redirect atau tampilkan pesan jika tidak ada transaksi ditemukan
            return redirect()->to('/transaksi')->with('error', 'Transaksi tidak ditemukan');
        }

        echo view('transaksi/edit', $data);
    }

    // Memperbarui data transaksi
    public function update()
    {
        # code...
        $id = $this->request->getPost('kd_barang');
        $validation = \Config\Services::validation();

        $data = array(
            'kd_barang' => $this->request->getPost('kd_barang'),
            'jml' => $this->request->getPost('jml'),
            'total_harga' => $this->request->getPost('total_harga'),
            'tgl_trans' => $this->request->getPost('tgl_trans'),
            'mtd_pembayaran' => $this->request->getPost('mtd_pembayaran'),
            'stts_pembayaran' => $this->request->getPost('stts_pembayaran')
        );

        if ($validation->run($data, 'transaksi') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('transaksi/edit/' . $id));
        } else {
            $model = new M_Transaksi();
            $ubah = $model->update($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Updated Transaksi');
                return redirect()->to(base_url('transaksi'));
            }
        }
    }
}
