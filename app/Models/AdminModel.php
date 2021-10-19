<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id_user';

    protected $allowedFields = ['nama_user', 'email', 'password', 'level', 'foto_profil'];

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

    public function getUsers()
    {
        $builder = $this->db->table('users');
        $builder->select('*');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function getLogin($email, $password)
    {
        $builder = $this->db->table('users');
        $builder->select('*');
        $builder->where(array('email' => $email, 'password' => $password));
        $query = $builder->get();

        return $query->getRowArray();
    }

    public function getUser($id_user)
    {
        $builder = $this->db->table('users');
        $builder->select('*');
        $builder->where('id_user', $id_user);
        $query = $builder->get();

        return $query->getResultArray();
    }
}
