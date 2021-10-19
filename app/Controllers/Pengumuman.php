<?php

namespace App\Controllers\User\Admin;

namespace App\Controllers;

use App\Models\PengumumanModel;

class Pengumuman extends BaseController
{
    protected $pengumumanModel;

    public function __construct()
    {
        $this->pengumumanModel = new PengumumanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Pengumuman',
            'pengumuman' => $this->pengumumanModel->paginate(5, 'pengumuman'),
            'pager' => $this->pengumumanModel->pager
        ];

        return view('landingpage/pengumuman', $data);
    }

    public function detailpengumuman($id_pengumuman)
    {
        $data = [
            'title' => 'Detail Pengumuman',
            'pengumuman' => $this->pengumumanModel->getPengumuman($id_pengumuman),
        ];

        if (empty($data['pengumuman'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Pengumuman tidak ditemukan');
        }

        return view('landingpage/detailpengumuman', $data);
    }

    //--------------------------------------------------------------------

}
