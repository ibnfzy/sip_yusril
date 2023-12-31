<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CustLogin extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        return view('login/user');
    }

    public function auth()
    {
        $session = session();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');


        $data = $this->db->table('customer')->where('username', $username)->get()->getRowArray();

        if ($data != null) {
            $password_data = $data['password'];
            $id = $data['id_customer'];

            $verify = password_verify($password ?? '', $password_data);
            // dd($verify);

            if ($verify) {
                $sessionData = [
                    'id_customer' => $data['id_customer'],
                    'fullname' => $data['fullname'],
                    'username' => $data['username'],
                    'kota' => $data['kota'],
                    'nomor_hp' => $data['nomor_hp'],
                    'alamat' => $data['alamat'],
                    'logged_in_cust' => TRUE
                ];

                $session->set($sessionData);
                // $session->markAsTempdata('logged_in_admin', 1800); //timeout 30 menit

                return redirect()->to(base_url('Panel'))->with('type-status', 'info')
                    ->with('message', 'Selamat Datang Kembali ' . $sessionData['fullname']);
            } else {
                return redirect()->to(base_url('User/Login'))->with('type-status', 'error')
                    ->with('message', 'Password tidak benar');
            }
        } else {
            return redirect()->to(base_url('User/Login'))->with('type-status', 'error')
                ->with('message', 'Username tidak benar');
        }
    }

    public function logout()
    {
        $session = session();

        $session->destroy();

        return redirect()->to(base_url('User/Login'));
    }

    public function daftar()
    {

        return view('login/user-signup');
    }

    public function signup()
    {
        $rules = [
            'fullname' => 'required|min_length[5]|max_length[30]',
            'username' => 'required|min_length[5]|max_length[16]|is_unique[customer.username]',
            'password' => 'required|min_length[5]|max_length[16]',
            'confirmPassword' => 'required|matches[password]',
            'kota' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'alamat' => 'required',
            'nomor_hp' => 'required|min_length[10]|max_length[14]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('User/Daftar'))->with('type-status', 'error')
                ->with('dataMessage', $this->validator->getErrors());
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'fullname' => $this->request->getPost('fullname'),
            'password' => password_hash($this->request->getPost('password') ?? '', PASSWORD_DEFAULT),
            'kota' => $this->request->getPost('kota'),
            'kelurahan' => $this->request->getPost('kelurahan'),
            'kecamatan' => $this->request->getPost('kecamatan'),
            'alamat' => $this->request->getPost('alamat'),
            'nomor_hp' => str_replace('+', '', $this->request->getPost('nomor_hp'))
        ];

        $this->db->table('customer')->insert($data);

        return redirect()->to(base_url('User/Login'))->with('type-status', 'success')
            ->with('message', 'Registrasi berhasil, silahkan login untuk memulai session');
    }
}