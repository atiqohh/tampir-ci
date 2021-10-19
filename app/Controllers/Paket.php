<?php

namespace App\Controllers;

use App\Models\PaketModel;
use App\Models\PengumumanModel;
use App\Models\WisataModel;

class Paket extends BaseController
{
    protected $paketModel;
    protected $pengumumanModel;
    protected $wisataModel;

    public function __construct()
    {
        $this->paketModel = new PaketModel();
        $this->pengumumanModel = new PengumumanModel();
        $this->wisataModel = new WisataModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Paket Wisata',
            'paket' => $this->paketModel->getPakets(),
            'pengumuman' => $this->pengumumanModel->getPengumumanSide(),
            'wisata' => $this->wisataModel->getWisatas(),
        ];

        return view('landingpage/paket', $data);
    }
    //--------------------------------------------------------------------

}
