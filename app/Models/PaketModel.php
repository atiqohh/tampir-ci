<?php

namespace App\Models;

use CodeIgniter\Model;

class PaketModel extends Model
{
    protected $table      = 'paket';
    protected $primaryKey = 'id_paket';

    protected $allowedFields = ['nama_paket', 'harga_paket', 'fasilitas'];

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

    public function getPakets()
    {

        $builder = $this->db->table('paket');
        $builder->select('id_paket, nama_paket, harga_paket, fasilitas, created_at, updated_at');
        $builder->orderBy('id_paket', 'DESC');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function getPaket($id_paket)
    {
        $builder = $this->db->table('paket');
        $builder->select('id_paket, nama_paket, harga_paket, fasilitas, created_at, updated_at');
        $builder->where('id_paket', $id_paket);
        $query = $builder->get();

        return $query->getResultArray();
    }
}
