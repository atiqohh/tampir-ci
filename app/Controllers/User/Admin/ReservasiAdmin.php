<?php

namespace App\Controllers\User\Admin;

use App\Controllers\BaseController;
use App\Models\ReservasiModel;
use TCPDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ReservasiAdmin extends BaseController
{
    protected $reservasiModel;

    public function __construct()
    {
        $this->reservasiModel = new ReservasiModel();
        helper('form');
    }

    public function index_reservasi()
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $data = [
            'title' => 'Reservasi',
            'paket' => $this->reservasiModel->getPaket(),
            'reservasi' => $this->reservasiModel->getReservasis()
        ];

        return view('user/admin/reservasi/index_reservasi', $data);
    }

    public function new_reservasi()
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $data = [
            'title' => 'Tambah Reservasi',
            'validation' => \Config\Services::validation(),
            'paket' => $this->reservasiModel->getPaket()
        ];

        return view('user/admin/reservasi/new_reservasi', $data);
    }

    public function save()
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

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
            return redirect()->to('/user/admin/reservasiadmin/new_reservasi')->withInput();
        }

        $this->reservasiModel->save([
            'nama' => $this->request->getVar('nama'),
            'id_paket' => $this->request->getVar('id_paket'),
            'alamat' => $this->request->getVar('alamat'),
            'jumlah_orang' => $this->request->getVar('jumlah_orang'),
            'tgl_reservasi' => $this->request->getVar('tgl_reservasi'),
            'no_hp' => $this->request->getVar('no_hp'),
            'pembayaran' => $this->request->getVar('pembayaran')
        ]);

        session()->setFlashdata('pesan', 'Reservasi berhasil disimpan.');

        return redirect()->to('/user/admin/reservasiadmin/index_reservasi');
    }

    public function edit_reservasi($id_reservasi)
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $data = [
            'title' => 'Edit Reservasi',
            'validation' => \Config\Services::validation(),
            'reservasi' => $this->reservasiModel->getReservasi($id_reservasi),
            'paket' => $this->reservasiModel->getPaket()
        ];

        return view('user/admin/reservasi/edit_reservasi', $data);
    }

    public function update($id_reservasi)
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

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
            return redirect()->to('/user/admin/reservasiadmin/edit_reservasi')->withInput();
        }

        $this->reservasiModel->save([
            'id_reservasi' => $id_reservasi,
            'nama' => $this->request->getVar('nama'),
            'id_paket' => $this->request->getVar('id_paket'),
            'alamat' => $this->request->getVar('alamat'),
            'jumlah_orang' => $this->request->getVar('jumlah_orang'),
            'tgl_reservasi' => $this->request->getVar('tgl_reservasi'),
            'no_hp' => $this->request->getVar('no_hp'),
            'pembayaran' => $this->request->getVar('pembayaran')
        ]);

        session()->setFlashdata('pesan', 'Reservasi berhasil diubah.');

        return redirect()->to('/user/admin/reservasiadmin/index_reservasi');
    }

    public function delete($id_reservasi)
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $this->reservasiModel->delete($id_reservasi);

        session()->setFlashdata('pesan', 'Reservasi berhasil dihapus.');

        return redirect()->to('/user/admin/reservasiadmin/index_reservasi');
    }

    public function cetak_laporan_pdf()
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $startdate = date('Y-m-d', strtotime($this->request->getVar('startdate')));
        $enddate = date('Y-m-d', strtotime($this->request->getVar('enddate')));

        $data = [
            'title' => 'Cetak Laporan',
            'reservasi' => $this->reservasiModel->getCetak($startdate, $enddate),
            'startdate' => $startdate,
            'enddate' => $enddate
        ];

        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml(view('user/admin/reservasi/cetak_laporan', $data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $filename = date('Y-m-d') . '-Laporan-Reservasi';
        $dompdf->stream($filename . ".pdf");
    }

    public function cetak_laporan_excel()
    {
        if (session()->get('email') == '') {
            session()->setFlashdata('gagal', 'Anda Belum Login!!');
            return redirect()->to(base_url('user/login'));
        }

        $startdate = date('Y-m-d', strtotime($this->request->getVar('startdate')));
        $enddate = date('Y-m-d', strtotime($this->request->getVar('enddate')));

        $data = $this->reservasiModel->getCetak($startdate, $enddate);

        $spreadsheet = new Spreadsheet();

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Nama')
            ->setCellValue('C1', 'Alamat')
            ->setCellValue('D1', 'Jumlah')
            ->setCellValue('E1', 'Tanggal')
            ->setCellValue('F1', 'Paket Wisata')
            ->setCellValue('G1', 'No HP')
            ->setCellValue('H1', 'Status Pembayaran');

        $column = 2;
        $i = 1;

        foreach ($data as $reservasi) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $i++)
                ->setCellValue('B' . $column, $reservasi['nama'])
                ->setCellValue('C' . $column, $reservasi['alamat'])
                ->setCellValue('D' . $column, $reservasi['jumlah_orang'])
                ->setCellValue('E' . $column, $reservasi['tgl_reservasi'])
                ->setCellValue('F' . $column, $reservasi['nama_paket'])
                ->setCellValue('G' . $column, $reservasi['no_hp'])
                ->setCellValue('H' . $column, $reservasi['pembayaran']);

            $column++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = date('Y-m-d') . '-Laporan-Reservasi';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
