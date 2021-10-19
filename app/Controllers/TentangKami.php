<?php

namespace App\Controllers;

use App\Models\PengumumanModel;
use App\Models\WisataModel;
use App\Models\PaketModel;

class TentangKami extends BaseController
{
    protected $pengumumanModel;
    protected $wisataModel;
    protected $paketModel;

    public function __construct()
    {
        $this->pengumumanModel = new PengumumanModel();
        $this->wisataModel = new WisataModel();
        $this->paketModel = new PaketModel();
    }

    public function sejarah()
    {
        $data = [
            'title' => 'Sejarah'
        ];

        return view('landingpage/sejarah', $data);
    }

    public function kepengurusan()
    {
        $data = [
            'title' => 'Kepengurusan',
            'pengumuman' => $this->pengumumanModel->getPengumumanSide(),
            'wisata' => $this->wisataModel->getWisatas(),
            'paket' => $this->paketModel->getPakets(),
        ];

        return view('landingpage/kepengurusan', $data);
    }

    public function kontak()
    {
        $data = [
            'title' => 'Kontak'
        ];

        return view('landingpage/kontak', $data);
    }
    //--------------------------------------------------------------------

}
