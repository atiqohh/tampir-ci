<?php

namespace App\Models;

use CodeIgniter\Model;

class UmkmModel extends Model
{
    protected $table      = 'umkm';
    protected $primaryKey = 'id_umkm';

    protected $allowedFields = ['nama_umkm', 'pemilik', 'kontak', 'deskripsi', 'gambar'];

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

    public function getUmkms()
    {

        $builder = $this->db->table('umkm');
        $builder->select('id_umkm, nama_umkm, pemilik, kontak, deskripsi, gambar, created_at, updated_at');
        $builder->orderBy('id_umkm', 'DESC');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function getUmkm($id_umkm)
    {
        $builder = $this->db->table('umkm');
        $builder->select('id_umkm, nama_umkm, pemilik, kontak, deskripsi, gambar, created_at, updated_at');
        $builder->where('id_umkm', $id_umkm);
        $query = $builder->get();

        return $query->getResultArray();
    }
}
