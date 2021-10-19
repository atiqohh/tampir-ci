<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
    protected $table      = 'reservasi';
    protected $primaryKey = 'id_reservasi';

    protected $allowedFields = ['nama', 'alamat', 'jumlah_orang', 'tgl_reservasi', 'id_paket', 'no_hp', 'pembayaran'];

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

    public function getRevToday()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('*');
        $builder->like('tgl_reservasi', date('Y-m-d'));

        return $builder->countAllResults();
    }

    public function getRevMonth()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('*');
        $builder->like('tgl_reservasi', date('Y-m'));

        return $builder->countAllResults();
    }

    public function getRevPlatToday()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('*');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->where('nama_paket', 'platinum');
        $builder->like('tgl_reservasi', date('Y-m-d'));

        return $builder->countAllResults();
    }

    public function getRevGoldToday()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('*');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->where('nama_paket', 'gold');
        $builder->like('tgl_reservasi', date('Y-m-d'));

        return $builder->countAllResults();
    }

    public function getRevSilverToday()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('*');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->where('nama_paket', 'silver');
        $builder->like('tgl_reservasi', date('Y-m-d'));

        return $builder->countAllResults();
    }

    public function getReservasi()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('*');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->like('tgl_reservasi', date('Y-m-d'));
        $builder->orderBy('id_reservasi', 'DESC');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function getRevJan()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('*');
        $builder->where('month(tgl_reservasi)', '01');

        return $builder->countAllResults();
    }

    public function getRevFeb()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('*');
        $builder->where('month(tgl_reservasi)', '02');

        return $builder->countAllResults();
    }

    public function getRevMar()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('*');
        $builder->where('month(tgl_reservasi)', '03');

        return $builder->countAllResults();
    }

    public function getRevApr()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('*');
        $builder->where('month(tgl_reservasi)', '04');

        return $builder->countAllResults();
    }

    public function getRevMei()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('*');
        $builder->where('month(tgl_reservasi)', '05');

        return $builder->countAllResults();
    }

    public function getRevJuni()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('*');
        $builder->where('month(tgl_reservasi)', '06');

        return $builder->countAllResults();
    }

    public function getRevJuli()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('*');
        $builder->where('month(tgl_reservasi)', '07');

        return $builder->countAllResults();
    }

    public function getRevAgs()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('*');
        $builder->where('month(tgl_reservasi)', '08');

        return $builder->countAllResults();
    }

    public function getRevSep()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('*');
        $builder->where('month(tgl_reservasi)', '09');

        return $builder->countAllResults();
    }

    public function getRevOkt()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('*');
        $builder->where('month(tgl_reservasi)', '10');

        return $builder->countAllResults();
    }

    public function getRevNov()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('*');
        $builder->where('month(tgl_reservasi)', '11');

        return $builder->countAllResults();
    }

    public function getRevDes()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('*');
        $builder->where('month(tgl_reservasi)', '12');

        return $builder->countAllResults();
    }

    public function getRevPlatJan()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('nama_paket, id_reservasi, nama');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->where('nama_paket', 'platinum');
        $builder->where('month(tgl_reservasi)', '01');
        $builder->like('tgl_reservasi', date('Y'));

        return $builder->countAllResults();
    }

    public function getRevPlatFeb()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('nama_paket, id_reservasi, nama');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->where('nama_paket', 'platinum');
        $builder->where('month(tgl_reservasi)', '02');
        $builder->like('tgl_reservasi', date('Y'));

        return $builder->countAllResults();
    }

    public function getRevPlatMar()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('nama_paket, id_reservasi, nama');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->where('nama_paket', 'platinum');
        $builder->where('month(tgl_reservasi)', '03');
        $builder->like('tgl_reservasi', date('Y'));

        return $builder->countAllResults();
    }

    public function getRevPlatApr()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('nama_paket, id_reservasi, nama');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->where('nama_paket', 'platinum');
        $builder->where('month(tgl_reservasi)', '04');
        $builder->like('tgl_reservasi', date('Y'));

        return $builder->countAllResults();
    }

    public function getRevPlatMei()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('nama_paket, id_reservasi, nama');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->where('nama_paket', 'platinum');
        $builder->where('month(tgl_reservasi)', '05');
        $builder->like('tgl_reservasi', date('Y'));

        return $builder->countAllResults();
    }

    public function getRevPlatJuni()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('nama_paket, id_reservasi, nama');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->where('nama_paket', 'platinum');
        $builder->where('month(tgl_reservasi)', '06');
        $builder->like('tgl_reservasi', date('Y'));

        return $builder->countAllResults();
    }

    public function getRevPlatJuli()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('nama_paket, id_reservasi, nama');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->where('nama_paket', 'platinum');
        $builder->where('month(tgl_reservasi)', '07');
        $builder->like('tgl_reservasi', date('Y'));

        return $builder->countAllResults();
    }

    public function getRevPlatAgs()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('nama_paket, id_reservasi, nama');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->where('nama_paket', 'platinum');
        $builder->where('month(tgl_reservasi)', '08');
        $builder->like('tgl_reservasi', date('Y'));

        return $builder->countAllResults();
    }

    public function getRevPlatSep()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('nama_paket, id_reservasi, nama');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->where('nama_paket', 'platinum');
        $builder->where('month(tgl_reservasi)', '09');
        $builder->like('tgl_reservasi', date('Y'));

        return $builder->countAllResults();
    }

    public function getRevPlatOkt()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('nama_paket, id_reservasi, nama');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->where('nama_paket', 'platinum');
        $builder->where('month(tgl_reservasi)', '10');
        $builder->like('tgl_reservasi', date('Y'));

        return $builder->countAllResults();
    }

    public function getRevPlatNov()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('nama_paket, id_reservasi, nama');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->where('nama_paket', 'platinum');
        $builder->where('month(tgl_reservasi)', '11');
        $builder->like('tgl_reservasi', date('Y'));

        return $builder->countAllResults();
    }

    public function getRevPlatDes()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('nama_paket, id_reservasi, nama');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->where('nama_paket', 'platinum');
        $builder->where('month(tgl_reservasi)', '12');
        $builder->like('tgl_reservasi', date('Y'));

        return $builder->countAllResults();
    }

    public function getRevGoldJan()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('nama_paket, id_reservasi, nama');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->where('nama_paket', 'gold');
        $builder->where('month(tgl_reservasi)', '01');
        $builder->like('tgl_reservasi', date('Y'));

        return $builder->countAllResults();
    }

    public function getRevGoldFeb()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('nama_paket, id_reservasi, nama');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->where('nama_paket', 'gold');
        $builder->where('month(tgl_reservasi)', '02');
        $builder->like('tgl_reservasi', date('Y'));

        return $builder->countAllResults();
    }

    public function getRevGoldMar()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('nama_paket, id_reservasi, nama');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->where('nama_paket', 'gold');
        $builder->where('month(tgl_reservasi)', '03');
        $builder->like('tgl_reservasi', date('Y'));

        return $builder->countAllResults();
    }

    public function getRevGoldApr()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('nama_paket, id_reservasi, nama');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->where('nama_paket', 'gold');
        $builder->where('month(tgl_reservasi)', '04');
        $builder->like('tgl_reservasi', date('Y'));

        return $builder->countAllResults();
    }

    public function getRevGoldMei()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('nama_paket, id_reservasi, nama');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->where('nama_paket', 'gold');
        $builder->where('month(tgl_reservasi)', '05');
        $builder->like('tgl_reservasi', date('Y'));

        return $builder->countAllResults();
    }

    public function getRevGoldJuni()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('nama_paket, id_reservasi, nama');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->where('nama_paket', 'gold');
        $builder->where('month(tgl_reservasi)', '06');
        $builder->like('tgl_reservasi', date('Y'));

        return $builder->countAllResults();
    }

    public function getRevGoldJuli()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('nama_paket, id_reservasi, nama');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->where('nama_paket', 'gold');
        $builder->where('month(tgl_reservasi)', '07');
        $builder->like('tgl_reservasi', date('Y'));

        return $builder->countAllResults();
    }

    public function getRevGoldAgs()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('nama_paket, id_reservasi, nama');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->where('nama_paket', 'gold');
        $builder->where('month(tgl_reservasi)', '08');
        $builder->like('tgl_reservasi', date('Y'));

        return $builder->countAllResults();
    }

    public function getRevGoldSep()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('nama_paket, id_reservasi, nama');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->where('nama_paket', 'gold');
        $builder->where('month(tgl_reservasi)', '09');
        $builder->like('tgl_reservasi', date('Y'));

        return $builder->countAllResults();
    }

    public function getRevGoldOkt()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('nama_paket, id_reservasi, nama');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->where('nama_paket', 'gold');
        $builder->where('month(tgl_reservasi)', '10');
        $builder->like('tgl_reservasi', date('Y'));

        return $builder->countAllResults();
    }

    public function getRevGoldNov()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('nama_paket, id_reservasi, nama');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->where('nama_paket', 'gold');
        $builder->where('month(tgl_reservasi)', '11');
        $builder->like('tgl_reservasi', date('Y'));

        return $builder->countAllResults();
    }

    public function getRevGoldDes()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('nama_paket, id_reservasi, nama');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->where('nama_paket', 'gold');
        $builder->where('month(tgl_reservasi)', '12');
        $builder->like('tgl_reservasi', date('Y'));

        return $builder->countAllResults();
    }

    public function getRevSilJan()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('nama_paket, id_reservasi, nama');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->where('nama_paket', 'silver');
        $builder->where('month(tgl_reservasi)', '01');
        $builder->like('tgl_reservasi', date('Y'));

        return $builder->countAllResults();
    }

    public function getRevSilFeb()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('nama_paket, id_reservasi, nama');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->where('nama_paket', 'silver');
        $builder->where('month(tgl_reservasi)', '02');
        $builder->like('tgl_reservasi', date('Y'));

        return $builder->countAllResults();
    }

    public function getRevSilMar()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('nama_paket, id_reservasi, nama');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->where('nama_paket', 'silver');
        $builder->where('month(tgl_reservasi)', '03');
        $builder->like('tgl_reservasi', date('Y'));

        return $builder->countAllResults();
    }

    public function getRevSilApr()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('nama_paket, id_reservasi, nama');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->where('nama_paket', 'silver');
        $builder->where('month(tgl_reservasi)', '04');
        $builder->like('tgl_reservasi', date('Y'));

        return $builder->countAllResults();
    }

    public function getRevSilMei()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('nama_paket, id_reservasi, nama');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->where('nama_paket', 'silver');
        $builder->where('month(tgl_reservasi)', '05');
        $builder->like('tgl_reservasi', date('Y'));

        return $builder->countAllResults();
    }

    public function getRevSilJuni()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('nama_paket, id_reservasi, nama');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->where('nama_paket', 'silver');
        $builder->where('month(tgl_reservasi)', '06');
        $builder->like('tgl_reservasi', date('Y'));

        return $builder->countAllResults();
    }

    public function getRevSilJuli()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('nama_paket, id_reservasi, nama');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->where('nama_paket', 'silver');
        $builder->where('month(tgl_reservasi)', '07');
        $builder->like('tgl_reservasi', date('Y'));

        return $builder->countAllResults();
    }

    public function getRevSilAgs()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('nama_paket, id_reservasi, nama');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->where('nama_paket', 'silver');
        $builder->where('month(tgl_reservasi)', '08');
        $builder->like('tgl_reservasi', date('Y'));

        return $builder->countAllResults();
    }

    public function getRevSilSep()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('nama_paket, id_reservasi, nama');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->where('nama_paket', 'silver');
        $builder->where('month(tgl_reservasi)', '09');
        $builder->like('tgl_reservasi', date('Y'));

        return $builder->countAllResults();
    }

    public function getRevSilOkt()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('nama_paket, id_reservasi, nama');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->where('nama_paket', 'silver');
        $builder->where('month(tgl_reservasi)', '10');
        $builder->like('tgl_reservasi', date('Y'));

        return $builder->countAllResults();
    }

    public function getRevSilNov()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('nama_paket, id_reservasi, nama');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->where('nama_paket', 'silver');
        $builder->where('month(tgl_reservasi)', '11');
        $builder->like('tgl_reservasi', date('Y'));

        return $builder->countAllResults();
    }

    public function getRevSilDes()
    {
        $builder = $this->db->table('reservasi');
        $builder->select('nama_paket, id_reservasi, nama');
        $builder->join('paket', 'paket.id_paket = reservasi.id_paket');
        $builder->where('nama_paket', 'silver');
        $builder->where('month(tgl_reservasi)', '12');
        $builder->like('tgl_reservasi', date('Y'));

        return $builder->countAllResults();
    }
}
