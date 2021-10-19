<?php

namespace App\Controllers;

use App\Models\UmkmModel;
use App\Models\PengumumanModel;
use App\Models\WisataModel;
use App\Models\PaketModel;

class Umkm extends BaseController
{
    protected $umkmModel;
    protected $pengumumanModel;
    protected $paketModel;
    protected $wisataModel;

    public function __construct()
    {
        $this->umkmModel = new UmkmModel();
        $this->pengumumanModel = new PengumumanModel();
        $this->wisataModel = new WisataModel();
        $this->paketModel = new PaketModel();
    }

    public function index()
    {
        $data = [
            'title' => 'umkm',
            'umkm' => $this->umkmModel->paginate(5, 'umkm'),
            'pager' => $this->umkmModel->pager,
            'pengumuman' => $this->pengumumanModel->getPengumumanSide(),
            'wisata' => $this->wisataModel->getWisatas(),
            'paket' => $this->paketModel->getPakets(),
        ];

        return view('landingpage/umkm', $data);
    }

    public function detailumkm($id_umkm)
    {
        $data = [
            'title' => 'umkm',
            'umkm' => $this->umkmModel->getUmkm($id_umkm),
            'pengumuman' => $this->pengumumanModel->getPengumumanSide(),
            'wisata' => $this->wisataModel->getWisatas(),
            'paket' => $this->paketModel->getPakets(),
        ];

        return view('landingpage/detailumkm', $data);
    }
    //--------------------------------------------------------------------

}
