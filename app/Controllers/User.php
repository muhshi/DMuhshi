<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Myth\Auth\Models\UserModel;

class User extends BaseController
{
    protected $db, $builder, $user;
    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->user =  new UserModel();
    }

    public function index()
    {
        return view('user/index');
    }

    public function edit($id)
    {

        $user = $this->user->find($id);

        if (is_object($user)) { //jika id nya ada maka lanjut jika tidak akan error
            $data['user'] = $user;
            return view('user/edit', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // $this->builder->select('id, username, fullname, user_image,  email');
        // $this->builder->where("id = $id");
        // $query = $this->builder->get();
        // $data['user'] = $query->getRow();

        // if (empty($data['user'])) {
        //     return redirect()->to('user');
        // }
        // return view('user/edit', $data);
    }

    public function update($id = null)
    {
        $data = $this->request->getPost();
        $save = $this->user->update($id, $data);
        if (!$save) {
            return redirect()->back()->withInput()->with('errors', $this->user->errors());
        } else {
            return redirect()->to('user')->with('success', 'Data Berhasil Diupdate');
        }

        // $data = $this->request->getPost();
        // $validate = $this->validate([
        //     'user_image' => [
        //         'rules' => 'max_size[user_image,512]|is_image[user_image]|mime_in[user_image,image/jpg,image/jpeg,image/png]',
        //         'errors' => [
        //             'max_size' => 'Maksimal ukuran file 512 kb',
        //             'is_image' => 'Yang anda pilih bukan gambar',
        //             'mime_in' => 'Yang anda pilih bukan gambar',
        //         ],
        //     ],
        // ]);
        // if (!$validate) {
        //     session()->setFlashdata('errors', $this->validator->listErrors());
        //     return redirect()->back()->withInput();
        // }
        // $this->db->table('users')->where(['id' => $id])->update($data);
        // return redirect()->to('user')->with('success', 'Data Berhasil Diupdate');
    }
}
