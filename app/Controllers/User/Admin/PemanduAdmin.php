<?php

namespace App\Controllers\User\Admin;

use App\Controllers\BaseController;
use App\Models\PemanduModel;

class PemanduAdmin extends BaseController
{
    protected $pemanduModel;

    public function __construct()
    {
        $this->pemanduModel = new PemanduModel();
    }

    public function index_pemandu()
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $data = [
            'title' => 'Pemandu',
            'pemandu' => $this->pemanduModel->getPemandus()
        ];

        return view('user/admin/pemandu/index_pemandu', $data);
    }

    public function new_pemandu()
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $data = [
            'title' => 'Tambah Pemandu',
            'validation' => \Config\Services::validation()
        ];

        return view('user/admin/pemandu/new_pemandu', $data);
    }

    public function save()
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        if (!$this->validate([
            'nama_pemandu' => [
                'rules' => 'required|is_unique[pemandu.nama_pemandu]',
                'errors' => [
                    'required' => '* nama pemandu tidak boleh kosong',
                    'is_unique' => '* nama pemandu tersebut sudah ada'
                ]
            ]
        ])) {
            return redirect()->to('/user/admin/pemanduadmin/new_pemandu')->withInput();
        }

        $this->pemanduModel->save([
            'nama_pemandu' => $this->request->getVar('nama_pemandu')
        ]);

        session()->setFlashdata('pesan', 'Pemandu berhasil disimpan.');

        return redirect()->to('/user/admin/pemanduadmin/index_pemandu');
    }

    public function delete($id)
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $this->pemanduModel->delete($id);

        session()->setFlashdata('pesan', 'Pemandu berhasil dihapus.');

        return redirect()->to('/user/admin/pemanduadmin/index_pemandu');
    }

    public function edit_pemandu($id)
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $data = [
            'title' => 'Edit Pemandu',
            'validation' => \Config\Services::validation(),
            'pemandu' => $this->pemanduModel->getPemandu($id)
        ];

        return view('user/admin/pemandu/edit_pemandu', $data);
    }

    public function update($id)
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $pemanduLama = $this->pemanduModel->getPemandu($id);

        if ($pemanduLama['0']['nama_pemandu'] == $this->request->getVar('nama_pemandu')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[pemandu.nama_pemandu]';
        }

        if (!$this->validate([
            'nama_pemandu' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => '* nama pemandu tidak boleh kosong',
                    'is_unique' => '* nama pemandu tersebut sudah ada'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/user/admin/pemanduadmin/edit_pemandu/' . $this->request->getVar('id'))->withInput()->with('validation', $validation);
        }

        $this->pemanduModel->save([
            'id' => $id,
            'nama_pemandu' => $this->request->getVar('nama_pemandu')
        ]);

        session()->setFlashdata('pesan', 'Pemandu berhasil diubah.');

        return redirect()->to('/user/admin/pemanduadmin/index_pemandu');
    }
}
