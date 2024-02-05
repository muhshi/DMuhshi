<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Myth\Auth\Models\UserModel;
use App\Models\AtasanModel;
use App\Models\IzinModel;

class Izin extends BaseController
{
    protected $db, $builder, $user, $atasan, $izin;
    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->user =  new UserModel();
        $this->atasan = new AtasanModel();
        $this->izin = new IzinModel();
    }

    public function index()
    {
        // $atasan = new AtasanModel();
        //$data['users'] = $atasan->findAll();
        $data['atasan'] = $this->atasan->findAll();
        return view('izin/index', $data);
    }

    public function edit($id = null)
    {
        $izin = $this->izin->find($id);
        //dd($izin);
        if (is_object($izin)) { //jika id nya ada maka lanjut jika tidak akan error
            $data['izin'] = $izin;
            $data['atasan'] = $this->atasan->findAll();
            return view('izin/edit', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function create()
    {
        //cara 1
        $data = $this->request->getPost();
        $save = $this->izin->insert($data);
        if (!$save) {
            return redirect()->back()->withInput()->with('errors', $this->izin->errors());
        } else {
            return redirect()->to('izin/rekap')->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function update($id = null)
    {
        $data = $this->request->getPost();
        $save = $this->izin->update($id, $data);
        if (!$save) {
            return redirect()->back()->withInput()->with('errors', $this->izin->errors());
        } else {
            return redirect()->to('izin/rekap')->with('success', 'Data Berhasil Diupdate');
        }
    }

    public function delete($id = null)
    {
        // $this->model->where('id_group', $id)->delete();
        $this->izin->where('id', $id)->delete();
        return redirect()->to('izin/rekap')->with('success', 'Data Berhasil Dihapus');
    }

    public function rekap()
    {

        $this->builder->select('users.id as userid, izin.id, nama_atasan, fullname,  keperluan,  jam_pergi, jam_balik, hari');
        $this->builder->join('izin', 'izin.user_id = users.id');
        $this->builder->join('atasan', 'atasan.id = izin.atas_izin');
        $this->builder->where("users.id = " . user()->id);
        $this->builder->orderBy('hari DESC');
        $query = $this->builder->get();
        $data['izin'] = $query->getResult();
        return view('izin/rekap', $data);
    }
}
