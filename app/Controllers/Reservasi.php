<?php

namespace App\Controllers;

use App\Models\ReservasiModel;
use TCPDF;

class Reservasi extends BaseController
{
    protected $reservasiModel;

    public function __construct()
    {
        $this->reservasiModel = new ReservasiModel();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Reservasi',
            'validation' => \Config\Services::validation(),
            'paket' => $this->reservasiModel->getPaket()
        ];

        return view('landingpage/reservasi', $data);
    }

    public function save()
    {
        $validate = $this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* nama pemesan tidak boleh kosong'
                ]
            ],
            'id_paket' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* pilihan paket tidak boleh kosong'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* alamat asal tidak boleh kosong'
                ]
            ],
            'jumlah_orang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* jumlah orang tidak boleh kosong'
                ]
            ],
            'tgl_reservasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* tanggal reservasi tidak boleh kosong'
                ]
            ],
            'no_hp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* no hp pemesan tidak boleh kosong'
                ]
            ]
        ]);

        if ($validate == false) {
            return redirect()->to('/reservasi')->withInput();
        }

        $this->reservasiModel->save([
            'nama' => $this->request->getVar('nama'),
            'id_paket' => $this->request->getVar('id_paket'),
            'alamat' => $this->request->getVar('alamat'),
            'jumlah_orang' => $this->request->getVar('jumlah_orang'),
            'tgl_reservasi' => $this->request->getVar('tgl_reservasi'),
            'no_hp' => $this->request->getVar('no_hp')
        ]);

        $id_paket = $this->request->getVar('id_paket');
        $paket = $this->reservasiModel->getNamaPaket($id_paket);

        $data = [
            'nama' => $this->request->getVar('nama'),
            'paket' => $paket,
            'alamat' => $this->request->getVar('alamat'),
            'jumlah_orang' => $this->request->getVar('jumlah_orang'),
            'tgl_reservasi' => $this->request->getVar('tgl_reservasi'),
            'no_hp' => $this->request->getVar('no_hp'),
            'title' => 'Cetak Bukti Reservasi'
        ];

        return view('landingpage/cetakbukti', $data);
    }

    public function cetak()
    {
        $data = [
            'title' => 'Cetak Bukti Reservasi',
            'nama' => $this->request->getVar('nama'),
            'paket' => $this->request->getVar('paket'),
            'alamat' => $this->request->getVar('alamat'),
            'jumlah_orang' => $this->request->getVar('jumlah_orang'),
            'tgl_reservasi' => $this->request->getVar('tgl_reservasi'),
            'no_hp' => $this->request->getVar('no_hp')
        ];

        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml(view('landingpage/cetak', $data));
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $filename = date('Y-m-d') . '-Bukti-Reservasi';
        $dompdf->stream($filename . ".pdf");
    }
    //--------------------------------------------------------------------

}
