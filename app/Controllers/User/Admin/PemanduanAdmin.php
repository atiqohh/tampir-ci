<?php

namespace App\Controllers\User\Admin;

use App\Controllers\BaseController;
use App\Models\PemanduanModel;

class PemanduanAdmin extends BaseController
{
    protected $pemanduanModel;

    public function __construct()
    {
        $this->pemanduanModel = new PemanduanModel();
    }

    public function index_pemanduan($id)
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $data = [
            'title' => 'Detail Pemandu',
            'pemandu' => $this->pemanduanModel->getPemanduans($id)
        ];

        return view('user/admin/pemanduan/index_pemanduan', $data);
    }

    public function new_pemanduan($id)
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $data = [
            'title' => 'Tambah Data',
            'validation' => \Config\Services::validation(),
            'pemandu' => $this->pemanduanModel->getPemanduans($id),
            'p' => $this->pemanduanModel->getPemandu()
        ];

        return view('user/admin/pemanduan/new_pemanduan', $data);
    }

    public function save()
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        if (!$this->validate([
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* tanggal pemanduan tidak boleh kosong'
                ]
            ],
            'waktu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* waktu pemanduan tidak boleh kosong'
                ]
            ],
            'jumlah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* jumlah pengunjung yang dipandu tidak boleh kosong'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('/user/admin/pemanduanadmin/new_pemanduan')->withInput();
        }

        $this->pemanduanModel->save([
            'id' => $this->request->getVar('id'),
            'tanggal' => $this->request->getVar('tanggal'),
            'waktu' => $this->request->getVar('waktu'),
            'jumlah' => $this->request->getVar('jumlah')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil disimpan.');

        return redirect()->to('/user/admin/pemanduadmin/index_pemandu');
    }

    public function edit_pemanduan($id_pemanduan)
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $data = [
            'title' => 'Edit Pemanduan',
            'validation' => \Config\Services::validation(),
            'pemandu' => $this->pemanduanModel->getPemanduan($id_pemanduan)
        ];

        return view('user/admin/pemanduan/edit_pemanduan', $data);
    }

    public function update($id_pemanduan)
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }
        // $pemanduanLama = $this->pemanduanModel->getPemanduan($id_pemanduan);
        $waktu = $this->request->getVar('waktu');

        if ($waktu != NULL) {
            $waktu = $this->request->getVar('waktu');
        } else {
            $waktu = $this->request->getPost('oldTime');
        }

        if (!$this->validate([
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* tanggal pemanduan tidak boleh kosong'
                ]
            ],
            'jumlah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* jumlah pengunjung yang dipandu tidak boleh kosong'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/user/admin/pemanduanadmin/edit_pemanduan/' . $this->request->getVar('id_pemanduan'))->withInput()->with('validation', $validation);
        }

        $this->pemanduanModel->save([
            'id_pemanduan' => $id_pemanduan,
            'tanggal' => $this->request->getVar('tanggal'),
            'waktu' => $waktu,
            'jumlah' => $this->request->getVar('jumlah')
        ]);

        session()->setFlashdata('pesan', 'Data pemanduan berhasil diubah.');

        return redirect()->to('/user/admin/pemanduadmin/index_pemandu');
    }

    public function delete($id_pemanduan)
    {
        $this->pemanduanModel->delete($id_pemanduan);

        session()->setFlashdata('pesan', 'Data pemanduan berhasil dihapus.');

        return redirect()->to('/user/admin/pemanduadmin/index_pemandu');
    }
}
