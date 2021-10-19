<?php

namespace App\Controllers\User\Admin;

use App\Controllers\BaseController;
use App\Models\WisataModel;

class WisataAdmin extends BaseController
{
    protected $wisataModel;

    public function __construct()
    {
        $this->wisataModel = new WisataModel();
        helper('form');
    }

    public function index_wisata()
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $data = [
            'title' => 'Wisata',
            'wisata' => $this->wisataModel->getWisatas()
        ];

        return view('user/admin/wisata/index_wisata', $data);
    }

    public function detail_wisata($id_wisata)
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $data = [
            'title' => 'Detail Wisata',
            'wisata' => $this->wisataModel->getWisata($id_wisata)
        ];

        if (empty($data['wisata'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Wisata tidak ditemukan');
        }

        return view('user/admin/wisata/detail_wisata', $data);
    }

    public function new_wisata()
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $data = [
            'title' => 'Tambah Wisata',
            'validation' => \Config\Services::validation()
        ];

        return view('user/admin/wisata/new_wisata', $data);
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
            ],
            'nama_wisata' => [
                'rules' => 'required|is_unique[wisata.nama_wisata]',
                'errors' => [
                    'required' => '* nama tidak boleh kosong',
                    'is_unique' => '* nama tersebut sudah ada'
                ]
            ],
            'harga_tiket' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* harga tiket tidak boleh kosong'
                ]
            ],
            'hari_operasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* hari operasi tidak boleh kosong'
                ]
            ],
            'jam_operasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* jam operasi tidak boleh kosong'
                ]
            ],
            'lokasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* lokasi tidak boleh kosong'
                ]
            ],
            'fasilitas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* fasilitas tidak boleh kosong'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* deskripsi tidak boleh kosong'
                ]
            ]
        ]);

        if ($validate == false) {
            return redirect()->to('/user/admin/wisataadmin/new_wisata')->withInput();
        } else {
            $file_gambar = $this->request->getFile('gambar');
            $nama_gambar = $file_gambar->getName();
            $file_gambar->move(ROOTPATH . 'public/img/wisata', $nama_gambar);
        }

        $this->wisataModel->save([
            'nama_wisata' => $this->request->getVar('nama_wisata'),
            'gambar' => $nama_gambar,
            'harga_tiket' => $this->request->getVar('harga_tiket'),
            'hari_operasi' => $this->request->getVar('hari_operasi'),
            'jam_operasi' => $this->request->getVar('jam_operasi'),
            'lokasi' => $this->request->getVar('lokasi'),
            'fasilitas' => $this->request->getVar('fasilitas'),
            'deskripsi' => $this->request->getVar('deskripsi')
        ]);

        session()->setFlashdata('pesan', 'wisata berhasil disimpan.');

        return redirect()->to('/user/admin/wisataadmin/index_wisata');
    }

    public function delete($id_wisata)
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $this->wisataModel->delete($id_wisata);

        session()->setFlashdata('pesan', 'wisata berhasil dihapus.');

        return redirect()->to('/user/admin/wisataadmin/index_wisata');
    }

    public function edit_wisata($id_wisata)
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $data = [
            'title' => 'Edit Wisata',
            'validation' => \Config\Services::validation(),
            'wisata' => $this->wisataModel->getWisata($id_wisata)
        ];

        return view('user/admin/wisata/edit_wisata', $data);
    }

    public function update($id_wisata)
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $wisataLama = $this->wisataModel->getWisata($id_wisata);

        if ($wisataLama['0']['nama_wisata'] == $this->request->getVar('nama_wisata')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[wisata.nama_wisata]';
        }

        $validate = $this->validate([
            'gambar' => [
                'rules' => 'mime_in[gambar,image/jpg,image/png,image/jpeg,image/gif]|max_size[gambar,2000]',
                'errors' => []
            ],
            'nama_wisata' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => '* nama tidak boleh kosong',
                    'is_unique' => '* nama tersebut sudah ada'
                ]
            ],
            'harga_tiket' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* harga tiket tidak boleh kosong'
                ]
            ],
            'hari_operasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* hari operasi tidak boleh kosong'
                ]
            ],
            'jam_operasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* jam operasi tidak boleh kosong'
                ]
            ],
            'lokasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* lokasi tidak boleh kosong'
                ]
            ],
            'fasilitas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* fasilitas tidak boleh kosong'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* deskripsi tidak boleh kosong'
                ]
            ]
        ]);

        if ($validate == false) {
            return redirect()->to('/user/admin/wisataadmin/edit_wisata/' . $this->request->getVar('id_wisata'))->withInput();
        } else {
            $file_gambar = $this->request->getFile('gambar');

            // Check image if user have not uploaded image
            if ($file_gambar->getError() == 4) {
                // name
                $nama_gambar = $this->request->getPost('oldImage');
            } else {
                $nama_gambar = $file_gambar->getName();
                $file_gambar->move(ROOTPATH . 'public/img/wisata', $nama_gambar);

                // delete old image
                // unlink(ROOTPATH . 'public/img/wisata' . $this->request->getPost('oldImage'));
            }
        }

        $this->wisataModel->save([
            'id_wisata' => $id_wisata,
            'nama_wisata' => $this->request->getVar('nama_wisata'),
            'gambar' => $file_gambar->getName(),
            'harga_tiket' => $this->request->getVar('harga_tiket'),
            'hari_operasi' => $this->request->getVar('hari_operasi'),
            'jam_operasi' => $this->request->getVar('jam_operasi'),
            'lokasi' => $this->request->getVar('lokasi'),
            'fasilitas' => $this->request->getVar('fasilitas'),
            'deskripsi' => $this->request->getVar('deskripsi')
        ]);

        session()->setFlashdata('pesan', 'wisata berhasil diubah.');

        return redirect()->to('/user/admin/wisataadmin/index_wisata');
    }

    //--------------------------------------------------------------------

}
