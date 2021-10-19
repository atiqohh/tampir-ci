<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\DashboardModel;
use App\Models\AdminModel;

class HomeAdmin extends BaseController
{
    protected $dashboardModel;
    protected $adminModel;

    public function __construct()
    {
        $this->dashboardModel = new DashboardModel();
        $this->adminModel = new AdminModel();
        helper('form');
    }

    public function index()
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $data = [
            'title' => 'Dashboard Admin',
            'today' => $this->dashboardModel->getRevToday(),
            'month' => $this->dashboardModel->getRevMonth(),
            'platinum' => $this->dashboardModel->getRevPlatToday(),
            'gold' => $this->dashboardModel->getRevGoldToday(),
            'silver' => $this->dashboardModel->getRevSilverToday(),
            'reservasi' => $this->dashboardModel->getReservasi(),
            'jan' => $this->dashboardModel->getRevJan(),
            'feb' => $this->dashboardModel->getRevFeb(),
            'mar' => $this->dashboardModel->getRevMar(),
            'apr' => $this->dashboardModel->getRevApr(),
            'mei' => $this->dashboardModel->getRevMei(),
            'juni' => $this->dashboardModel->getRevJuni(),
            'juli' => $this->dashboardModel->getRevJuli(),
            'ags' => $this->dashboardModel->getRevAgs(),
            'sep' => $this->dashboardModel->getRevSep(),
            'okt' => $this->dashboardModel->getRevOkt(),
            'nov' => $this->dashboardModel->getRevNov(),
            'des' => $this->dashboardModel->getRevDes(),
            'platjan' => $this->dashboardModel->getRevPlatJan(),
            'platfeb' => $this->dashboardModel->getRevPlatFeb(),
            'platmar' => $this->dashboardModel->getRevPlatMar(),
            'platapr' => $this->dashboardModel->getRevPlatApr(),
            'platmei' => $this->dashboardModel->getRevPlatMei(),
            'platjuni' => $this->dashboardModel->getRevPlatJuni(),
            'platjuli' => $this->dashboardModel->getRevPlatJuli(),
            'platags' => $this->dashboardModel->getRevPlatAgs(),
            'platsep' => $this->dashboardModel->getRevPlatSep(),
            'platokt' => $this->dashboardModel->getRevPlatOkt(),
            'platnov' => $this->dashboardModel->getRevPlatNov(),
            'platdes' => $this->dashboardModel->getRevPlatDes(),
            'goldjan' => $this->dashboardModel->getRevGoldJan(),
            'goldfeb' => $this->dashboardModel->getRevGoldFeb(),
            'goldmar' => $this->dashboardModel->getRevGoldMar(),
            'goldapr' => $this->dashboardModel->getRevGoldApr(),
            'goldmei' => $this->dashboardModel->getRevGoldMei(),
            'goldjuni' => $this->dashboardModel->getRevGoldJuni(),
            'goldjuli' => $this->dashboardModel->getRevGoldJuli(),
            'goldags' => $this->dashboardModel->getRevGoldAgs(),
            'goldsep' => $this->dashboardModel->getRevGoldSep(),
            'goldokt' => $this->dashboardModel->getRevGoldOkt(),
            'goldnov' => $this->dashboardModel->getRevGoldNov(),
            'golddes' => $this->dashboardModel->getRevGoldDes(),
            'siljan' => $this->dashboardModel->getRevSilJan(),
            'silfeb' => $this->dashboardModel->getRevSilFeb(),
            'silmar' => $this->dashboardModel->getRevSilMar(),
            'silapr' => $this->dashboardModel->getRevSilApr(),
            'silmei' => $this->dashboardModel->getRevSilMei(),
            'siljuni' => $this->dashboardModel->getRevSilJuni(),
            'siljuli' => $this->dashboardModel->getRevSilJuli(),
            'silags' => $this->dashboardModel->getRevSilAgs(),
            'silsep' => $this->dashboardModel->getRevSilSep(),
            'silokt' => $this->dashboardModel->getRevSilOkt(),
            'silnov' => $this->dashboardModel->getRevSilNov(),
            'sildes' => $this->dashboardModel->getRevSilDes(),
        ];

        return view('user/admin/index', $data);
    }

    public function profile()
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $data = [
            'title' => 'Profile Admin',
            'validation' => \Config\Services::validation(),
        ];
        return view('user/admin/profile', $data);
    }

    public function edit_profile()
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $data = [
            'title' => 'Profile Admin',
            'validation' => \Config\Services::validation(),
        ];
        return view('user/admin/profile', $data);
    }

    public function update($id_user)
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        if (session()->get('nama_user') == $this->request->getVar('nama_user')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[users.nama_user]';
        }

        if (session()->get('email') == $this->request->getVar('email')) {
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
            return redirect()->to('/user/homeadmin/profile')->withInput();
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

            session()->set('nama_user', $this->request->getVar('nama_user'));
            session()->set('foto_profil', $nama_foto_profil);
            session()->set('email', $this->request->getVar('email'));
        }

        $id_user = session()->get('id_user');

        $this->adminModel->save([
            'id_user' => $id_user,
            'nama_user' => $this->request->getVar('nama_user'),
            'email' => $this->request->getVar('email'),
            'foto_profil' => $nama_foto_profil
        ]);

        session()->setFlashdata('pesan', 'Profile anda berhasil diubah.');

        return redirect()->to('/user/homeadmin/profile');
    }

    public function edit_password()
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $data = [
            'title' => 'Profile Admin',
            'validation' => \Config\Services::validation(),
        ];
        return view('user/admin/profile', $data);
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
            return redirect()->to('/user/homeadmin/edit_password')->withInput();
        }

        $pass_lama = md5($this->request->getVar('pass_lama'));
        $pass_baru = md5($this->request->getVar('pass_baru'));

        if (!($pass_lama == session()->get('password'))) {
            session()->setFlashdata('lama', 'Password lama yang anda masukkan salah.');
            return redirect()->to('/user/homeadmin/edit_password')->withInput();
        } else {
            if ($pass_lama == $pass_baru) {
                session()->setFlashdata('baru', 'Password lama dan password baru tidak boleh sama.');
                return redirect()->to('/user/homeadmin/edit_password')->withInput();
            } else {
                $password = $pass_baru;
                $id_user = session()->get('id_user');

                $this->adminModel->save([
                    'id_user' => $id_user,
                    'password' => $password,
                ]);
            }
        }

        $session = session();
        $session->destroy();
        return redirect()->to('/user/login');

        // session()->setFlashdata('pesan', 'Password anda berhasil diubah.');

        // return redirect()->to('/user/homeadmin/profile');
    }
    //--------------------------------------------------------------------

}
