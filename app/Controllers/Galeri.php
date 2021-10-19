<?php

namespace App\Controllers;

use App\Models\GaleriModel;

class Galeri extends BaseController
{
    protected $galeriModel;

    public function __construct()
    {
        $this->galeriModel = new GaleriModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Galeri',
            'galeri' => $this->galeriModel->getGaleris()
        ];

        return view('landingpage/galeri', $data);
    }

    //--------------------------------------------------------------------

}
