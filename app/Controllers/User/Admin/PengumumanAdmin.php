<?php

namespace App\Controllers\User\Admin;

use App\Controllers\BaseController;
use App\Models\PengumumanModel;

class PengumumanAdmin extends BaseController
{
    protected $pengumumanModel;

    public function __construct()
    {
        $this->pengumumanModel = new PengumumanModel();
    }

    public function index_pengumuman()
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $data = [
            'title' => 'Pengumuman',
            'pengumuman' => $this->pengumumanModel->getPengumumans()
        ];

        return view('user/admin/pengumuman/index_pengumuman', $data);
    }

    public function detail_pengumuman($id_pengumuman)
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $data = [
            'title' => 'Detail Pengumuman',
            'pengumuman' => $this->pengumumanModel->getPengumuman($id_pengumuman)
        ];

        if (empty($data['pengumuman'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Pengumuman tidak ditemukan');
        }

        return view('user/admin/pengumuman/detail_pengumuman', $data);
    }

    public function new_pengumuman()
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $data = [
            'title' => 'Tambah Pengumuman',
            'validation' => \Config\Services::validation()
        ];

        return view('user/admin/pengumuman/new_pengumuman', $data);
    }

    public function save()
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $validate = $this->validate([
            'judul_pengumuman' => [
                'rules' => 'required|is_unique[pengumuman.judul_pengumuman]',
                'errors' => [
                    'required' => '* judul tidak boleh kosong',
                    'is_unique' => '* judul tersebut sudah ada'
                ]
            ],
            'lampiran' => [
                'rules' => 'mime_in[lampiran,file/jpg,file/png,file/jpeg,file/gif,application/pdf]|max_size[lampiran,2000]',
                'errors' => []
            ],
            'isi_pengumuman' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* isi pengumuman tidak boleh kosong'
                ]
            ]
        ]);

        if ($validate == false) {
            return redirect()->to('/user/admin/pengumumanadmin/new_pengumuman')->withInput();
        } else {
            $file_lampiran = $this->request->getFile('lampiran');
            $nama_lampiran = $file_lampiran->getName();
            $file_lampiran->move(ROOTPATH . 'public/file/pengumuman');
        }

        $this->pengumumanModel->save([
            'judul_pengumuman' => $this->request->getVar('judul_pengumuman'),
            'isi_pengumuman' => $this->request->getVar('isi_pengumuman'),
            'lampiran' => $nama_lampiran
        ]);

        session()->setFlashdata('pesan', 'Pengumuman berhasil disimpan.');

        return redirect()->to('/user/admin/pengumumanadmin/index_pengumuman');
    }

    public function delete($id_pengumuman)
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $this->pengumumanModel->delete($id_pengumuman);

        session()->setFlashdata('pesan', 'Pengumuman berhasil dihapus.');

        return redirect()->to('/user/admin/pengumumanadmin/index_pengumuman');
    }

    public function edit_pengumuman($id_pengumuman)
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $data = [
            'title' => 'Edit Pengumuman',
            'validation' => \Config\Services::validation(),
            'pengumuman' => $this->pengumumanModel->getPengumuman($id_pengumuman)
        ];

        return view('user/admin/pengumuman/edit_pengumuman', $data);
    }

    public function update($id_pengumuman)
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $pengumumanLama = $this->pengumumanModel->getPengumuman($id_pengumuman);

        if ($pengumumanLama['0']['judul_pengumuman'] == $this->request->getVar('judul_pengumuman')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[pengumuman.judul_pengumuman]';
        }

        $validate = $this->validate([
            'judul_pengumuman' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '* judul tidak boleh kosong',
                    'is_unique' => '* judul tersebut sudah ada'
                ]
            ],
            'lampiran' => [
                'rules' => 'mime_in[lampiran,file/jpg,file/png,file/jpeg,file/gif,application/pdf]|max_size[lampiran,2000]',
                'errors' => []
            ],
            'isi_pengumuman' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* isi pengumuman tidak boleh kosong'
                ]
            ]
        ]);

        if ($validate == false) {
            return redirect()->to('/user/admin/pengumumanadmin/edit_pengumuman' . $this->request->getVar('id_pengumuman'))->withInput();
        } else {
            $file_lampiran = $this->request->getFile('lampiran');

            // Check file if user have not uploaded file
            if ($file_lampiran->getError() == 4) {
                // name
                $nama_lampiran = $this->request->getPost('oldFile');
            } else {
                $nama_lampiran = $file_lampiran->getName();
                $file_lampiran->move(ROOTPATH . 'public/file/pengumuman', $nama_lampiran);
            }
        }

        $this->pengumumanModel->save([
            'id_pengumuman' => $id_pengumuman,
            'judul_pengumuman' => $this->request->getVar('judul_pengumuman'),
            'isi_pengumuman' => $this->request->getVar('isi_pengumuman'),
            'lampiran' => $nama_lampiran
        ]);

        session()->setFlashdata('pesan', 'Pengumuman berhasil diubah.');

        return redirect()->to('/user/admin/pengumumanadmin/index_pengumuman');
    }

    //--------------------------------------------------------------------

}
