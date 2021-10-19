<?php

namespace App\Controllers;

use App\Models\PengumumanModel;
use App\Models\WisataModel;
use App\Models\PaketModel;

class Wisata extends BaseController
{
    protected $pengumumanModel;
    protected $paketModel;
    protected $wisataModel;

    public function __construct()
    {
        $this->pengumumanModel = new PengumumanModel();
        $this->wisataModel = new WisataModel();
        $this->paketModel = new PaketModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Wisata',
            'pengumuman' => $this->pengumumanModel->getPengumumanSide(),
            'wisata' => $this->wisataModel->paginate(5, 'wisata'),
            'pager' => $this->wisataModel->pager,
            'paket' => $this->paketModel->getPakets(),
        ];

        return view('landingpage/wisata', $data);
    }

    public function detailwisata($id_wisata)
    {
        $data = [
            'title' => 'Detail Wisata',
            'pengumuman' => $this->pengumumanModel->getPengumumanSide(),
            'wisata' => $this->wisataModel->getWisata($id_wisata),
            'paket' => $this->paketModel->getPakets(),
        ];

        return view('landingpage/detailwisata', $data);
    }
    //--------------------------------------------------------------------

}
