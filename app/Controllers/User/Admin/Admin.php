<?php

namespace App\Controllers\User\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class Admin extends BaseController
{
    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
        helper('form');
    }

    public function index_admin()
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $data = [
            'title' => 'Admin',
            'users' => $this->adminModel->getUsers()
        ];

        return view('user/admin/useradmin/index_admin', $data);
    }

    public function detail_admin($id_user)
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $data = [
            'title' => 'Detail Admin',
            'users' => $this->adminModel->getUser($id_user)
        ];

        if (empty($data['users'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Admin tidak ditemukan');
        }

        return view('user/admin/useradmin/detail_admin', $data);
    }

    public function new_admin()
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $data = [
            'title' => 'Tambah Admin',
            'validation' => \Config\Services::validation()
        ];

        return view('user/admin/useradmin/new_admin', $data);
    }

    public function save()
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $validate = $this->validate([
            'foto_profil' => [
                'rules' => 'mime_in[foto_profil,image/jpg,image/png,image/jpeg,image/gif]|max_size[foto_profil,2000]',
                'errors' => []
            ],
            'nama_user' => [
                'rules' => 'required|is_unique[users.nama_user]',
                'errors' => [
                    'required' => '* nama tidak boleh kosong',
                    'is_unique' => '* nama tersebut sudah digunakan'
                ]
            ],
            'email' => [
                'rules' => 'required|is_unique[users.email]|valid_email',
                'errors' => [
                    'required' => '* email tidak boleh kosong',
                    'is_unique' => '* email tersebut sudah digunakan',
                    'valid_email' => '*email anda tidak valid'
                ]
            ],
            'password' => [
                'rules' => 'required|is_unique[users.password]|min_length[10]',
                'errors' => [
                    'required' => '* password tidak boleh kosong',
                    'is_unique' => '* password tersebut sudah digunakan',
                    'min_lenght' => '* password terlalu pendek (minimal 10 karakter)'
                ]
            ],
            'pass_konfirmasi' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => '* konfirmasi password tidak boleh kosong',
                    'matches' => '* konfirmasi password tidak sesuai dengan password'
                ]
            ]
        ]);

        if ($validate == false) {
            return redirect()->to('/user/admin/admin/new_admin')->withInput();
        } else {
            $file_foto_profil = $this->request->getFile('foto_profil');
            $nama_foto_profil = $file_foto_profil->getName();
            $file_foto_profil->move(ROOTPATH . 'public/img/user', $nama_foto_profil);
        }

        $password = md5($this->request->getVar('password'));

        $this->adminModel->save([
            'nama_user' => $this->request->getVar('nama_user'),
            'email' => $this->request->getVar('email'),
            'password' => $password,
            'foto_profil' => $nama_foto_profil
        ]);

        session()->setFlashdata('pesan', 'Admin berhasil disimpan.');

        return redirect()->to('/user/admin/admin/index_admin');
    }

    public function delete($id_user)
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        if ($id_user == session('id_user')) {
            session()->setFlashdata('gagal', 'Anda tidak dapat menghapus admin yang sedang digunakan untuk login.');

            return redirect()->to('/user/admin/admin/index_admin');
        } else {
            $this->adminModel->delete($id_user);

            session()->setFlashdata('pesan', 'Admin berhasil dihapus.');

            return redirect()->to('/user/admin/admin/index_admin');
        }
    }

    public function edit_admin($id_user)
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $data = [
            'title' => 'Edit Admin',
            'validation' => \Config\Services::validation(),
            'users' => $this->adminModel->getUser($id_user)
        ];

        return view('user/admin/useradmin/edit_admin', $data);
    }

    public function update($id_user)
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $adminLama = $this->adminModel->getUser($id_user);

        if ($adminLama['0']['nama_user'] == $this->request->getVar('nama_user')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[users.nama_user]';
        }

        if ($adminLama['0']['email'] == $this->request->getVar('email')) {
            $rule_email = 'required|valid_email';
        } else {
            $rule_email = 'required|is_unique[users.email]|valid_email';
        }

        $validate = $this->validate([
            'foto_profil' => [
                'rules' => 'mime_in[foto_profil,image/jpg,image/png,image/jpeg,image/gif]|max_size[foto_profil,2000]',
                'errors' => []
            ],
            'nama_user' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => '* nama tidak boleh kosong',
                    'is_unique' => '* nama tersebut sudah digunakan'
                ]
            ],
            'email' => [
                'rules' => $rule_email,
                'errors' => [
                    'required' => '* email tidak boleh kosong',
                    'is_unique' => '* email tersebut sudah digunakan',
                    'valid_email' => '*email anda tidak valid'
                ]
            ]
        ]);

        if ($validate == false) {
            return redirect()->to('/user/admin/admin/edit_admin/' . $this->request->getVar('id_user'))->withInput();
        } else {
            $file_foto_profil = $this->request->getFile('foto_profil');


            // Check image if user have not uploaded image
            if ($file_foto_profil->getError() == 4) {
                // name
                $nama_foto_profil = $this->request->getPost('oldImage');
            } else {
                $nama_foto_profil = $file_foto_profil->getName();
                $file_foto_profil->move(ROOTPATH . 'public/img/user', $nama_foto_profil);

                // delete old image
                // unlink(ROOTPATH . 'public/img/artikel' . $this->request->getPost('oldImage'));
            }
        }

        $this->adminModel->save([
            'id_user' => $id_user,
            'nama_user' => $this->request->getVar('nama_user'),
            'email' => $this->request->getVar('email'),
            'foto_profil' => $nama_foto_profil
        ]);

        session()->setFlashdata('pesan', 'Admin berhasil diubah.');

        return redirect()->to('/user/admin/admin/index_admin');
    }

    public function updatepassword($id_user)
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $validate = $this->validate([
            'pass_lama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* password lama tidak boleh kosong'
                ]
            ],
            'pass_baru' => [
                'rules' => 'required|is_unique[users.password]|min_length[10]',
                'errors' => [
                    'required' => '* password baru tidak boleh kosong',
                    'is_unique' => '* password tersebut sudah digunakan',
                    'min_lenght' => '* password baru terlalu pendek (minimal 10 karakter)'
                ]
            ],
            'pass_konfirmasi' => [
                'rules' => 'required|matches[pass_baru]',
                'errors' => [
                    'required' => '* konfirmasi password tidak boleh kosong',
                    'matches' => '* konfirmasi password tidak sesuai dengan password'
                ]
            ]
        ]);

        if ($validate == false) {
            return redirect()->to('/user/admin/admin/edit_admin/' . $id_user)->withInput();
        }

        $pass_lama = md5($this->request->getVar('pass_lama'));
        $pass_baru = md5($this->request->getVar('pass_baru'));

        if (!($pass_lama == $this->request->getVar('password'))) {
            session()->setFlashdata('lama', 'Password lama yang anda masukkan salah.');
            return redirect()->to('/user/admin/admin/edit_admin/' . $id_user)->withInput();
        } else {
            if ($pass_lama == $pass_baru) {
                session()->setFlashdata('baru', 'Password lama dan password baru tidak boleh sama.');
                return redirect()->to('/user/admin/admin/edit_admin/' . $id_user)->withInput();
            } else {
                $password = $pass_baru;

                $this->adminModel->save([
                    'id_user' => $id_user,
                    'password' => $password,
                ]);
            }
        }

        session()->setFlashdata('pesan', 'Password berhasil diubah.');

        return redirect()->to('/user/admin/admin/index_admin');
    }
}
