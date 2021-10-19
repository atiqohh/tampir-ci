<?php

namespace App\Models;

use CodeIgniter\Model;

class GaleriModel extends Model
{
    protected $table      = 'galeri';
    protected $primaryKey = 'id';

    protected $allowedFields = ['gambar', 'ket'];

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

    public function getGaleris()
    {

        $builder = $this->db->table('galeri');
        $builder->select('id, gambar, ket, created_at, updated_at');
        $builder->orderBy('id', 'DESC');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function getGaleri($id)
    {

        $builder = $this->db->table('galeri');
        $builder->select('id, gambar, ket, created_at, updated_at');
        $builder->where('id', $id);
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function getGaleriHome()
    {

        $builder = $this->db->table('galeri');
        $builder->select('id, gambar, ket, created_at, updated_at');
        $builder->orderBy('id', 'DESC');
        $builder->limit(15);
        $query = $builder->get();

        return $query->getResultArray();
    }
}
