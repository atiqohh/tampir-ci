<?php

namespace App\Models;

use CodeIgniter\Model;

class PemanduModel extends Model
{
    protected $table      = 'pemandu';
    protected $primaryKey = 'id';

    protected $allowedFields = ['nama_pemandu'];

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

    public function getPemandus()
    {
        $builder = $this->db->table('pemandu');
        $builder->select('id, nama_pemandu');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function getPemandu($id)
    {
        $builder = $this->db->table('pemandu');
        $builder->select('id, nama_pemandu');
        $builder->where('id', $id);
        $query = $builder->get();

        return $query->getResultArray();
    }
}
