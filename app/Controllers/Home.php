<?php

namespace App\Controllers;

use App\Models\PaketModel;
use App\Models\PengumumanModel;
use App\Models\GaleriModel;

class Home extends BaseController
{
	protected $paketModel;
	protected $pengumumanModel;
	protected $galeriModel;

	public function __construct()
	{
		$this->paketModel = new PaketModel();
		$this->pengumumanModel = new PengumumanModel();
		$this->galeriModel = new GaleriModel();
	}

	public function index()
	{
		$data = [
			'title' => 'Home',
			'paket' => $this->paketModel->getPakets(),
			'pengumuman' => $this->pengumumanModel->getPengumumanSide(),
			'galeri' => $this->galeriModel->getGaleriHome()
		];

		return view('landingpage/index', $data);
	}

	//--------------------------------------------------------------------

}
