<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Myth\Auth\Models\UserModel;
use App\Models\LaporanModel;

class Laporan extends BaseController
{
    protected $db, $builder, $user, $laporan;
    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->user =  new UserModel();
        $this->laporan = new LaporanModel();
    }

    public function index()
    {
        $this->laporan->select('laporan.id,fullname , tanggal, pekerjaan');
        $this->laporan->join('users', 'users.id = laporan.user_id');
        $this->laporan->where("users.id = " . user()->id);
        $this->laporan->orderBy('tanggal DESC');
        $query = $this->laporan->get();
        $data['laporan'] = $query->getResult();
        return view('laporan/index', $data);
    }

    public function create()
    {
        //cara 1
        $data = $this->request->getPost();
        $save = $this->laporan->insert($data);
        if (!$save) {
            return redirect()->back()->withInput()->with('errors', $this->laporan->errors());
        } else {
            return redirect()->to('laporan')->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function delete($id = null)
    {
        // $this->model->where('id_group', $id)->delete();
        $this->laporan->where('id', $id)->delete();
        return redirect()->to('laporan')->with('success', 'Data Berhasil Dihapus');
    }
}
