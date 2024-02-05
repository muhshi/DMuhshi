<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Myth\Auth\Models\UserModel;
use App\Models\IzinModel;
use App\Models\AtasanModel;
use App\Models\LaporanModel;


class Admin extends BaseController
{
    protected $db, $izin, $users, $atasan, $laporan;
    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->users = new UserModel();
        $this->izin = new IzinModel();
        $this->atasan = new AtasanModel();
        $this->laporan = new LaporanModel();
    }
    public function index()
    {
        // $users = new \Myth\Auth\Models\UserModel();
        // $data['users'] = $users->findAll();

        $this->users->select('users.id as userid, username,  email, name');
        $this->users->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->users->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        //$this->users->where('deleted_at IS NULL');
        $data['users'] = $this->users->findAll();

        return view('admin/index', $data);
    }

    public function detail($id = 0)
    {
        // $users = new \Myth\Auth\Models\UserModel();
        // $data['users'] = $users->findAll();
        $this->users->select('users.id as userid, username, fullname, user_image,  email, name, deleted_at');
        $this->users->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->users->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->users->where("users.id = $id ");
        $query = $this->users->get();
        $data['user'] = $query->getRow();

        if (empty($data['user'])) {
            return redirect()->to('users');
        }
        return view('admin/detail', $data);
    }

    public function rekap()
    {

        $this->users->select('users.id , nama_atasan, fullname,  keperluan,  jam_pergi, jam_balik, hari');
        $this->users->join('izin', 'izin.user_id = users.id');
        $this->users->join('atasan', 'atasan.id = izin.atas_izin');
        $this->users->orderBy('hari DESC', 'fullname');
        $query = $this->users->get();
        $data['izin'] = $query->getResult();
        return view('izin/rekap', $data);
    }

    public function setting()
    {
        return view('admin/setting');
    }

    public function atasan()
    {
        $data['atasan'] = $this->atasan->findAll();
        return view('admin/atasan', $data);
    }

    public function up_atasan()
    {
        //cara 1
        $data = $this->request->getPost();
        $save = $this->atasan->insert($data);
        if (!$save) {
            return redirect()->back()->withInput()->with('errors', $this->izin->errors());
        } else {
            return redirect()->to('admin/atasan')->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function update_atasan($id = null)
    {
        $data = $this->request->getPost();
        $save = $this->izin->update($id, $data);
        if (!$save) {
            return redirect()->back()->withInput()->with('errors', $this->izin->errors());
        } else {
            return redirect()->to('admin/atasan')->with('success', 'Data Berhasil Diupdate');
        }
    }

    public function delete_atasan($id = null)
    {
        $this->atasan->where('id', $id)->delete();
        return redirect()->to('admin/atasan')->with('success', 'Data Berhasil Dihapus');
    }

    public function edit($id)
    {
        $users = $this->users->find($id);
        //dd($contact);
        if (is_object($users)) { //jika id nya ada maka lanjut jika tidak akan error
            $data['users'] = $users;
            return view('admin/edit', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }




    public function delete($id = null)
    {
        // $this->model->where('id_group', $id)->delete();
        $this->users->where('id', $id)->delete();
        return redirect()->to('admin')->with('success', 'Data Berhasil Dihapus');
    }

    public function trash()
    {
        $this->users->select('users.id as userid, username,  email, name');
        $this->users->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->users->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        //$this->users->where('deleted_at IS NULL');
        $data['users'] = $this->users->onlyDeleted()->findAll();

        return view('admin/trash', $data);
    }

    public function restore($id = null)
    {
        //dd($id);
        if ($id != null) {
            $this->users->update($id, ['deleted_at' => null]);
            return redirect()->to('admin')->with('success', 'Data Berhasil Direstore');
        }
    }

    public function laporan()
    {
        $this->laporan->select('laporan.id,fullname , tanggal, pekerjaan');
        $this->laporan->join('users', 'users.id = laporan.user_id');
        $this->laporan->orderBy('tanggal DESC', 'fullname');
        $query = $this->laporan->get();
        $data['laporan'] = $query->getResult();
        return view('admin/laporan', $data);
    }
}
