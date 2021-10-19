<?php

namespace App\Controllers\User\Admin;

use App\Controllers\BaseController;
use App\Models\UmkmModel;

class UmkmAdmin extends BaseController
{
    protected $umkmModel;

    public function __construct()
    {
        $this->umkmModel = new UmkmModel();
        helper('form');
    }

    public function index_umkm()
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $data = [
            'title' => 'umkm',
            'umkm' => $this->umkmModel->getUmkms()
        ];

        return view('user/admin/umkm/index_umkm', $data);
    }

    public function detail_umkm($id_umkm)
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $data = [
            'title' => 'Detail UMKM',
            'umkm' => $this->umkmModel->getUmkm($id_umkm)
        ];

        if (empty($data['umkm'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('UMKM tidak ditemukan');
        }

        return view('user/admin/umkm/detail_umkm', $data);
    }

    public function new_umkm()
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $data = [
            'title' => 'Tambah UMKM',
            'validation' => \Config\Services::validation()
        ];

        return view('user/admin/umkm/new_umkm', $data);
    }

    public function save()
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $validate = $this->validate([
            'gambar' => [
                'rules' => 'mime_in[gambar,image/jpg,image/png,image/jpeg,image/gif]|max_size[gambar,2000]',
                'errors' => []
            ],
            'nama_umkm' => [
                'rules' => 'required|is_unique[umkm.nama_umkm]',
                'errors' => [
                    'required' => '* nama tidak boleh kosong',
                    'is_unique' => '* nama tersebut sudah ada'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* deskripsi umkm tidak boleh kosong'
                ]
            ],
            'pemilik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* pemilik umkm tidak boleh kosong'
                ]
            ],
            'kontak' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* kontak tidak boleh kosong'
                ]
            ]
        ]);

        if ($validate == false) {
            return redirect()->to('/user/admin/umkmadmin/new_umkm')->withInput();
        } else {
            $file_gambar = $this->request->getFile('gambar');
            $nama_gambar = $file_gambar->getName();
            $file_gambar->move(ROOTPATH . 'public/img/umkm', $nama_gambar);
        }

        $this->umkmModel->save([
            'gambar' => $nama_gambar,
            'nama_umkm' => $this->request->getVar('nama_umkm'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'pemilik' => $this->request->getVar('pemilik'),
            'kontak' => $this->request->getVar('kontak')
        ]);

        session()->setFlashdata('pesan', 'Data UMKM berhasil disimpan.');

        return redirect()->to('/user/admin/umkmadmin/index_umkm');
    }

    public function delete($id_umkm)
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $this->umkmModel->delete($id_umkm);

        session()->setFlashdata('pesan', 'Data UMKM berhasil dihapus.');

        return redirect()->to('/user/admin/umkmadmin/index_umkm');
    }

    public function edit_umkm($id_umkm)
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $data = [
            'title' => 'Edit UMKM',
            'validation' => \Config\Services::validation(),
            'umkm' => $this->umkmModel->getUmkm($id_umkm)
        ];

        return view('user/admin/umkm/edit_umkm', $data);
    }

    public function update($id_umkm)
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $umkmLama = $this->umkmModel->getUmkm($id_umkm);

        if ($umkmLama['0']['nama_umkm'] == $this->request->getVar('nama_umkm')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[umkm.nama_umkm]';
        }

        $validate = $this->validate([
            'gambar' => [
                'rules' => 'mime_in[gambar,image/jpg,image/png,image/jpeg,image/gif]|max_size[gambar,2000]',
                'errors' => []
            ],
            'nama_umkm' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => '* nama tidak boleh kosong',
                    'is_unique' => '* nama tersebut sudah ada'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* deskripsi umkm tidak boleh kosong'
                ]
            ],
            'pemilik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* pemilik umkm tidak boleh kosong'
                ]
            ],
            'kontak' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* kontak tidak boleh kosong'
                ]
            ]
        ]);

        if ($validate == false) {
            return redirect()->to('/user/admin/umkmadmin/edit_umkm/' . $this->request->getVar('id_umkm'))->withInput();
        } else {
            $file_gambar = $this->request->getFile('gambar');

            // Check image if user have not uploaded image
            if ($file_gambar->getError() == 4) {
                // name
                $nama_gambar = $this->request->getPost('oldImage');
            } else {
                $nama_gambar = $file_gambar->getName();
                $file_gambar->move(ROOTPATH . 'public/img/umkm', $nama_gambar);

                // delete old image
                // unlink(ROOTPATH . 'public/img/artikel' . $this->request->getPost('oldImage'));
            }
        }

        $this->umkmModel->save([
            'id_umkm' => $id_umkm,
            'nama_umkm' => $this->request->getVar('nama_umkm'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'pemilik' => $this->request->getVar('pemilik'),
            'kontak' => $this->request->getVar('kontak'),
            'gambar' => $nama_gambar
        ]);

        session()->setFlashdata('pesan', 'Data UMKM berhasil diubah.');

        return redirect()->to('/user/admin/umkmadmin/index_umkm');
    }

    //--------------------------------------------------------------------

}
