<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table      = 'artikel';
    protected $primaryKey = 'id_artikel';

    protected $allowedFields = ['judul_artikel', 'isi_artikel', 'gambar'];

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

    public function getArtikels()
    {

        $builder = $this->db->table('artikel');
        $builder->select('id_artikel, judul_artikel, isi_artikel, gambar, created_at, updated_at');
        $builder->orderBy('id_artikel', 'DESC');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function getArtikel($id_artikel)
    {
        $builder = $this->db->table('artikel');
        $builder->select('id_artikel, judul_artikel, isi_artikel, gambar, created_at, updated_at');
        $builder->where('id_artikel', $id_artikel);
        $query = $builder->get();

        return $query->getResultArray();
    }
}
