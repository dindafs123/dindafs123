<?php

namespace App\Controllers;

use App\Models\M_Barang;
use CodeIgniter\Controller;

class Barang extends Controller
{
    public function index()
    {
        # code..
        $Barangmodel = new M_Barang();
        $data['barang'] = $Barangmodel->getBarang();
        echo view('barang/index', $data);
    }

    public function create()
    {
        # code...
        return view('barang/create');
    }

    public function store()
    {
        $validation =  \Config\Services::validation();

        // get file
        $image = $this->request->getFile('foto');

        $data = array(
            'kd_barang'     => $this->request->getPost('kd_barang'),
            'nm_barang'   => $this->request->getPost('nm_barang'),
            'merk'     => $this->request->getPost('merk'),
            'tahun'     => $this->request->getPost('tahun'),
            'asal_usul'     => $this->request->getPost('asal_usul'),
            'jumlah'     => $this->request->getPost('jumlah'),
            'foto'     => $image->getName(),
            'deskripsi'     => $this->request->getPost('deskripsi'),
            'status'     => $this->request->getPost('status')
        );

        if ($validation->run($data, 'barang') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('barang/create'));
        } else {
            // upload
            $image->move(ROOTPATH . 'public/uploads', $image->getName());

            $model = new M_Barang();

            $simpan = $model->insertBarang($data);
            if ($simpan) {
                session()->setFlashdata('success', 'created Barang successfuly');
                return redirect()->to(base_url('barang'));
            }
        }

        if ($validation->run($data, 'barang') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('barang/create'));
        } else {
            $model = new M_Barang();
            $simpan = $model->insertBarang($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Created Barang successfully');
                return redirect()->to(base_url('barang'));
            }
        }
    }

    public function edit($id)
    {
        # code...
        $model = new M_Barang();
        $data['barang'] = $model->getBarang($id)->getRowArray();
        echo view('barang/edit', $data);
    }

    public function update()
    {
        # code...
        $id = $this->request->getPost('kd_barang');
        $validation = \Config\Services::validation();

        $data = array(
            'kd_barang'     => $this->request->getPost('kd_barang'),
            'nm_barang'   => $this->request->getPost('nm_barang'),
            'merk'     => $this->request->getPost('merk'),
            'tahun'     => $this->request->getPost('tahun'),
            'asal_usul'     => $this->request->getPost('asal_usul'),
            'jumlah'     => $this->request->getPost('jumlah'),
            'deskripsi'     => $this->request->getPost('deskripsi'),
            'foto'     => $this->request->getPost('foto'),
            'status'     => $this->request->getPost('status')
        );

        if ($validation->run($data, 'barang') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('barang/edit/' . $id));
        } else {
            $model = new M_Barang();
            $ubah = $model->updateBarang($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Updated Barang');
                return redirect()->to(base_url('barang'));
            }
        }
    }
}
