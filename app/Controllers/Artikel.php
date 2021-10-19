<?php

namespace App\Controllers\User\Admin;

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\PengumumanModel;
use App\Models\WisataModel;
use App\Models\PaketModel;

class Artikel extends BaseController
{
    protected $artikelModel;
    protected $pengumumanModel;
    protected $wisataModel;
    protected $paketModel;

    public function __construct()
    {
        $this->artikelModel = new ArtikelModel();
        $this->pengumumanModel = new PengumumanModel();
        $this->wisataModel = new WisataModel();
        $this->paketModel = new PaketModel();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Artikel',
            // 'artikel' => $this->artikelModel->getArtikels(),
            'artikel' => $this->artikelModel->paginate(4, 'artikel'),
            'pager' => $this->artikelModel->pager,
            'pengumuman' => $this->pengumumanModel->getPengumumanSide(),
            'wisata' => $this->wisataModel->getWisatas(),
            'paket' => $this->paketModel->getPakets(),
        ];

        return view('landingpage/artikel', $data);
    }

    public function detailartikel($id_artikel)
    {
        $data = [
            'title' => 'Detail Artikel',
            'artikel' => $this->artikelModel->getArtikel($id_artikel),
            'pengumuman' => $this->pengumumanModel->getPengumumanSide(),
            'wisata' => $this->wisataModel->getWisatas(),
            'paket' => $this->paketModel->getPakets(),
        ];

        if (empty($data['artikel'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Artikel tidak ditemukan');
        }

        return view('landingpage/detailartikel', $data);
    }

    //--------------------------------------------------------------------

}
