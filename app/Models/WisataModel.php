<?php

namespace App\Models;

use CodeIgniter\Model;

class WisataModel extends Model
{
    protected $table      = 'wisata';
    protected $primaryKey = 'id_wisata';

    protected $allowedFields = ['nama_wisata', 'deskripsi', 'harga_tiket', 'hari_operasi', 'jam_operasi', 'lokasi', 'fasilitas', 'deskripsi', 'gambar'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function __construct()
    {
        parent::__construct();
        $this->db = db_connect();
    }

    public function getWisatas()
    {

        $builder = $this->db->table('wisata');
        $builder->select('id_wisata, nama_wisata, deskripsi, harga_tiket, hari_operasi, jam_operasi, lokasi, fasilitas, deskripsi, gambar, created_at, updated_at');
        $builder->orderBy('id_wisata', 'DESC');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function getWisata($id_wisata)
    {
        $builder = $this->db->table('wisata');
        $builder->select('id_wisata, nama_wisata, deskripsi, harga_tiket, hari_operasi, jam_operasi, lokasi, fasilitas, deskripsi, gambar, created_at, updated_at');
        $builder->where('id_wisata', $id_wisata);
        $query = $builder->get();

        return $query->getResultArray();
    }
}
