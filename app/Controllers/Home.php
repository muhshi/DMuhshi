<?php

namespace App\Controllers;

use App\Models\AtasanModel;

class Home extends BaseController
{
    protected $db, $builder, $atasan;
    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->atasan = new AtasanModel();
    }

    public function index(): string
    {
        if (in_groups('admin')) {
            $this->builder->select('users.id , nama_atasan, fullname,  keperluan,  jam_pergi, jam_balik, hari');
            $this->builder->join('izin', 'izin.user_id = users.id');
            $this->builder->join('atasan', 'atasan.id = izin.atas_izin');
            $query = $this->builder->get();
            $data['izin'] = $query->getResult();
            return view('admin/rekap', $data);
        } else {
            $atasan = new AtasanModel();
            //$data['users'] = $atasan->findAll();
            $data['atasan'] = $this->atasan->findAll();
            return view('izin/index', $data);
        }
    }
}
