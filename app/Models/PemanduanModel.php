<?php

namespace App\Models;

use CodeIgniter\Model;

class PemanduanModel extends Model
{
    protected $table      = 'pemanduan';
    protected $primaryKey = 'id_pemanduan';

    protected $allowedFields = ['waktu', 'tanggal', 'jumlah', 'id'];

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

    public function getPemanduans($id)
    {
        $builder = $this->db->table('pemanduan');
        $builder->select('id_pemanduan, waktu, tanggal, jumlah, pemanduan.id as idpem, pemandu.id as id, nama_pemandu');
        $builder->join('pemandu', 'pemandu.id = pemanduan.id');
        $builder->where('pemandu.id', $id);
        $builder->orderBy('pemandu.id', 'DESC');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function getPemandu()
    {
        $builder = $this->db->table('pemandu');
        $builder->select('*');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function getPemanduan($id_pemanduan)
    {
        $builder = $this->db->table('pemanduan');
        $builder->select('*');
        $builder->join('pemandu', 'pemandu.id = pemanduan.id');
        $builder->where('id_pemanduan', $id_pemanduan);
        $query = $builder->get();

        return $query->getResultArray();
    }
}
