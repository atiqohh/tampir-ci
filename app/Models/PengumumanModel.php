<?php

namespace App\Models;

use CodeIgniter\Model;

class PengumumanModel extends Model
{
    protected $table      = 'pengumuman';
    protected $primaryKey = 'id_pengumuman';

    protected $allowedFields = ['judul_pengumuman', 'isi_pengumuman', 'lampiran'];

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

    public function getPengumumans()
    {

        $builder = $this->db->table('pengumuman');
        $builder->select('id_pengumuman, judul_pengumuman, isi_pengumuman, lampiran, created_at, updated_at');
        $builder->orderBy('id_pengumuman', 'DESC');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function getPengumuman($id_pengumuman)
    {
        $builder = $this->db->table('pengumuman');
        $builder->select('id_pengumuman, judul_pengumuman, isi_pengumuman, lampiran, created_at, updated_at');
        $builder->where('id_pengumuman', $id_pengumuman);
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function getPengumumanSide()
    {

        $builder = $this->db->table('pengumuman');
        $builder->select('id_pengumuman, judul_pengumuman, isi_pengumuman, lampiran, created_at, updated_at');
        $builder->orderBy('id_pengumuman', 'DESC');
        $builder->limit(5);
        $query = $builder->get();

        return $query->getResultArray();
    }
}
