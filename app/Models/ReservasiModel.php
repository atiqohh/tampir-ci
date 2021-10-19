<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservasiModel extends Model
{
    protected $table      = 'reservasi';
    protected $primaryKey = 'id_reservasi';

    protected $allowedFields = ['nama', 'nama', 'alamat', 'jumlah_orang', 'tgl_reservasi', 'id_paket', 'no_hp', 'pembayaran'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function getReservasis()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('*');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->orderBy('id_reservasi', 'DESC');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function getReservasi($id_reservasi)
    {
        $builder = $this->db->table('reservasi');
        $builder->select('*');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->where('id_reservasi', $id_reservasi);
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function getPaket()
    {
        $builder = $this->db->table('paket');
        $builder->select('*');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function getCetak($startdate, $enddate)
    {
        $builder = $this->db->table('reservasi');
        $builder->select('*');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->where('DATE(reservasi.tgl_reservasi) >=', date('Y-m-d', strtotime($startdate)));
        $builder->where('DATE(reservasi.tgl_reservasi) <=', date('Y-m-d', strtotime($enddate)));
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function getNamaPaket($id_paket)
    {
        $builder = $this->db->table('paket');
        $builder->select('nama_paket');
        $builder->where('id_paket', $id_paket);
        $query = $builder->get();

        return $query->getResultArray();
    }
}
