<?php

namespace App\Controllers\User\Admin;

use App\Controllers\BaseController;
use App\Models\ArtikelModel;

class ArtikelAdmin extends BaseController
{
    protected $artikelModel;

    public function __construct()
    {
        $this->artikelModel = new ArtikelModel();
        helper('form');
    }

    public function index_artikel()
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $data = [
            'title' => 'Artikel',
            'artikel' => $this->artikelModel->getArtikels()
        ];

        return view('user/admin/artikel/index_artikel', $data);
    }

    public function detail_artikel($id_artikel)
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $data = [
            'title' => 'Detail Artikel',
            'artikel' => $this->artikelModel->getArtikel($id_artikel)
        ];

        if (empty($data['artikel'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Artikel tidak ditemukan');
        }

        return view('user/admin/artikel/detail_artikel', $data);
    }

    public function new_artikel()
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $data = [
            'title' => 'Tambah Artikel',
            'validation' => \Config\Services::validation()
        ];

        return view('user/admin/artikel/new_artikel', $data);
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
            'judul_artikel' => [
                'rules' => 'required|is_unique[artikel.judul_artikel]',
                'errors' => [
                    'required' => '* judul tidak boleh kosong',
                    'is_unique' => '* judul tersebut sudah ada'
                ]
            ],
            'isi_artikel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* artikel tidak boleh kosong'
                ]
            ]
        ]);

        if ($validate == false) {
            return redirect()->to('/user/admin/artikeladmin/new_artikel')->withInput();
        } else {
            $file_gambar = $this->request->getFile('gambar');
            $nama_gambar = $file_gambar->getName();
            $file_gambar->move(ROOTPATH . 'public/img/artikel', $nama_gambar);
        }

        $this->artikelModel->save([
            'judul_artikel' => $this->request->getVar('judul_artikel'),
            'isi_artikel' => $this->request->getVar('isi_artikel'),
            'gambar' => $nama_gambar
        ]);

        session()->setFlashdata('pesan', 'Artikel berhasil disimpan.');

        return redirect()->to('/user/admin/artikeladmin/index_artikel');
    }

    public function delete($id_artikel)
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $this->artikelModel->delete($id_artikel);

        session()->setFlashdata('pesan', 'Artikel berhasil dihapus.');

        return redirect()->to('/user/admin/artikeladmin/index_artikel');
    }

    public function edit_artikel($id_artikel)
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $data = [
            'title' => 'Edit Artikel',
            'validation' => \Config\Services::validation(),
            'artikel' => $this->artikelModel->getArtikel($id_artikel)
        ];

        return view('user/admin/artikel/edit_artikel', $data);
    }

    public function update($id_artikel)
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $artikelLama = $this->artikelModel->getArtikel($id_artikel);

        if ($artikelLama['0']['judul_artikel'] == $this->request->getVar('judul_artikel')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[artikel.judul_artikel]';
        }

        $validate = $this->validate([
            'gambar' => [
                'rules' => 'mime_in[gambar,image/jpg,image/png,image/jpeg,image/gif]|max_size[gambar,2000]',
                'errors' => []
            ],
            'judul_artikel' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '* judul tidak boleh kosong',
                    'is_unique' => '* judul tersebut sudah ada'
                ]
            ],
            'isi_artikel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* artikel tidak boleh kosong'
                ]
            ]
        ]);

        if ($validate == false) {
            return redirect()->to('/user/admin/artikeladmin/edit_artikel/' . $this->request->getVar('id_artikel'))->withInput();
        } else {
            $file_gambar = $this->request->getFile('gambar');

            // Check image if user have not uploaded image
            if ($file_gambar->getError() == 4) {
                // name
                $nama_gambar = $this->request->getPost('oldImage');
            } else {
                $nama_gambar = $file_gambar->getName();
                $file_gambar->move(ROOTPATH . 'public/img/artikel', $nama_gambar);

                // delete old image
                // unlink(ROOTPATH . 'public/img/artikel' . $this->request->getPost('oldImage'));
            }
        }

        $this->artikelModel->save([
            'id_artikel' => $id_artikel,
            'judul_artikel' => $this->request->getVar('judul_artikel'),
            'isi_artikel' => $this->request->getVar('isi_artikel'),
            'gambar' => $nama_gambar
        ]);

        session()->setFlashdata('pesan', 'Artikel berhasil diubah.');

        return redirect()->to('/user/admin/artikeladmin/index_artikel');
    }

    //--------------------------------------------------------------------

}
