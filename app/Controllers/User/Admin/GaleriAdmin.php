<?php

namespace App\Controllers\User\Admin;

use App\Controllers\BaseController;
use App\Models\GaleriModel;

class GaleriAdmin extends BaseController
{
    protected $galeriModel;

    public function __construct()
    {
        $this->galeriModel = new GaleriModel();
        helper('form');
    }

    public function index_galeri()
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $data = [
            'title' => 'Galeri',
            'galeri' => $this->galeriModel->paginate(16, 'galeri'),
            'pager' => $this->galeriModel->pager
        ];

        return view('user/admin/galeri/index_galeri', $data);
    }

    public function new_galeri()
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $data = [
            'title' => 'Tambah Gambar',
            'validation' => \Config\Services::validation()
        ];

        return view('user/admin/galeri/new_galeri', $data);
    }

    public function save()
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $validate = $this->validate([
            'gambar' => [
                'rules' => 'uploaded[gambar]|mime_in[gambar,image/jpg,image/png,image/jpeg,image/gif]|max_size[gambar,2000]',
                'errors' => [
                    'uploaded' => '* file gambar tidak boleh kosong'
                ]
            ]
        ]);

        if ($validate == false) {
            return redirect()->to('/user/admin/galeriadmin/new_galeri')->withInput();
        } else {
            $file_gambar = $this->request->getFile('gambar');
            $nama_gambar = $file_gambar->getName();

            $file_gambar = \Config\Services::image('')
                ->withFile($this->request->getFile('gambar'))
                ->fit(1000, 1000, 'center')
                ->save(ROOTPATH . 'public/img/galeri/' . $nama_gambar);
        }

        $this->galeriModel->save([
            'gambar' => $nama_gambar,
            'ket' => $this->request->getVar('ket'),
        ]);

        session()->setFlashdata('pesan', 'Gambar berhasil disimpan.');

        return redirect()->to('/user/admin/galeriadmin/index_galeri');
    }

    public function edit_galeri($id)
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $data = [
            'title' => 'Edit Gambar',
            'validation' => \Config\Services::validation(),
            'galeri' => $this->galeriModel->getGaleri($id)
        ];

        return view('user/admin/galeri/edit_galeri', $data);
    }

    public function update($id)
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $validate = $this->validate([
            'gambar' => [
                'rules' => 'mime_in[gambar,image/jpg,image/png,image/jpeg,image/gif]|max_size[gambar,2000]',
                'errors' => []
            ]
        ]);

        if ($validate == false) {
            return redirect()->to('/user/admin/galeriadmin/edit_galeri') . $this->request->getVar('id')->withInput();
        } else {
            $file_gambar = $this->request->getFile('gambar');

            // Check image if user have not uploaded image
            if ($file_gambar->getError() == 4) {
                // name
                $nama_gambar = $this->request->getPost('oldImage');
            } else {
                $nama_gambar = $file_gambar->getName();
                $file_gambar = \Config\Services::image('')
                    ->withFile($this->request->getFile('gambar'))
                    ->fit(1000, 1000, 'center')
                    ->save(ROOTPATH . 'public/img/galeri/' . $nama_gambar);

                // delete old image
                // unlink(ROOTPATH . 'public/img/artikel' . $this->request->getPost('oldImage'));
            }
        }

        $this->galeriModel->save([
            'id' => $id,
            'gambar' => $nama_gambar,
            'ket' => $this->request->getVar('ket'),
        ]);

        session()->setFlashdata('pesan', 'Gambar berhasil diubah.');

        return redirect()->to('/user/admin/galeriadmin/index_galeri');
    }

    public function delete($id)
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $this->galeriModel->delete($id);

        session()->setFlashdata('pesan', 'Galeri berhasil dihapus.');

        return redirect()->to('/user/admin/galeriadmin/index_galeri');
    }
}
