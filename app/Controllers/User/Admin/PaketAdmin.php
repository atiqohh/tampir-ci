<?php

namespace App\Controllers\User\Admin;

use App\Controllers\BaseController;
use App\Models\PaketModel;

class PaketAdmin extends BaseController
{
    protected $paketModel;

    public function __construct()
    {
        $this->paketModel = new PaketModel();
    }

    public function index_paket()
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $data = [
            'title' => 'Paket',
            'paket' => $this->paketModel->getPakets()
        ];

        return view('user/admin/paket/index_paket', $data);
    }

    public function detail_paket($id_paket)
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $data = [
            'title' => 'Detail Paket',
            'paket' => $this->paketModel->getPaket($id_paket)
        ];

        if (empty($data['paket'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('paket tidak ditemukan');
        }

        return view('user/admin/paket/detail_paket', $data);
    }

    public function new_paket()
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $data = [
            'title' => 'Tambah Paket',
            'validation' => \Config\Services::validation()
        ];

        return view('user/admin/paket/new_paket', $data);
    }

    public function save()
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        if (!$this->validate([
            'nama_paket' => [
                'rules' => 'required|is_unique[paket.nama_paket]',
                'errors' => [
                    'required' => '* nama paket tidak boleh kosong',
                    'is_unique' => '* nama paket tersebut sudah ada'
                ]
            ],
            'harga_paket' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* harga paket tidak boleh kosong'
                ]
            ],
            'fasilitas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* fasilitas tidak boleh kosong'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('/user/admin/paketadmin/new_paket')->withInput();
        }

        $this->paketModel->save([
            'nama_paket' => $this->request->getVar('nama_paket'),
            'harga_paket' => $this->request->getVar('harga_paket'),
            'fasilitas' => $this->request->getVar('fasilitas')
        ]);

        session()->setFlashdata('pesan', 'Paket berhasil disimpan.');

        return redirect()->to('/user/admin/paketadmin/index_paket');
    }

    public function delete($id_paket)
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $this->paketModel->delete($id_paket);

        session()->setFlashdata('pesan', 'paket berhasil dihapus.');

        return redirect()->to('/user/admin/paketadmin/index_paket');
    }

    public function edit_paket($id_paket)
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $data = [
            'title' => 'Edit Paket',
            'validation' => \Config\Services::validation(),
            'paket' => $this->paketModel->getPaket($id_paket)
        ];

        return view('user/admin/paket/edit_paket', $data);
    }

    public function update($id_paket)
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $paketLama = $this->paketModel->getPaket($id_paket);

        if ($paketLama['0']['nama_paket'] == $this->request->getVar('nama_paket')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[paket.nama_paket]';
        }

        if (!$this->validate([
            'nama_paket' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => '* nama tidak boleh kosong',
                    'is_unique' => '* nama tersebut sudah ada'
                ]
            ],
            'harga_paket' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* harga paket tidak boleh kosong'
                ]
            ],
            'fasilitas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* fasilitas tidak boleh kosong'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/user/admin/paketadmin/edit_paket/' . $this->request->getVar('id_paket'))->withInput()->with('validation', $validation);
        }

        $this->paketModel->save([
            'id_paket' => $id_paket,
            'nama_paket' => $this->request->getVar('nama_paket'),
            'harga_paket' => $this->request->getVar('harga_paket'),
            'fasilitas' => $this->request->getVar('fasilitas')
        ]);

        session()->setFlashdata('pesan', 'Paket berhasil diubah.');

        return redirect()->to('/user/admin/paketadmin/index_paket');
    }

    //--------------------------------------------------------------------

}
