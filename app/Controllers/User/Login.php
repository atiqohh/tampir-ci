<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class Login extends BaseController
{
    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Login Admin'
        ];

        return view('user/auth/login', $data);
    }

    public function login()
    {
        $email = $this->request->getVar('email');
        $password = md5($this->request->getVar('password'));;

        $login = $this->adminModel->getLogin($email, $password);

        if (($login['email'] == $email) && ($login['password'] == $password)) {
            session()->set('id_user', $login['id_user']);
            session()->set('nama_user', $login['nama_user']);
            session()->set('foto_profil', $login['foto_profil']);
            session()->set('email', $login['email']);
            session()->set('password', $login['password']);
            return redirect()->to(base_url('user/homeadmin'));
        } else {
            session()->setFlashdata('gagal', 'Email atau Password Salah!!');
            return redirect()->to(base_url('user/login'));
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/user/login');
    }
    //--------------------------------------------------------------------

}
