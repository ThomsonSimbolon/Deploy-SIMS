<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use CodeIgniter\API\ResponseTrait;
use Firebase\JWT\JWT;

class AuthController extends BaseController
{
    use ResponseTrait;
    public function login()
    {
        return view('auth/login');
    }

    // Fungsi untuk login
    public function loggedIn()
    {

        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]',
        ]);

        // Jika validasi gagal, redirect ke halaman login dengan pesan error
        if (!$validation->withRequest($this->request)->run()) {
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to('/login')->withInput();
        }

        // Proses login
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $model = new UsersModel();

        $user = $model->where('email', $email)->first();

        session()->set('user_id', $user->id);

        if (!$user || !password_verify($password, $user->password)) {
            // return $this->respond(['status' => false, 'message' => 'Emal atau Password salah.'], 401);
            session()->setFlashdata('error', 'Email atau Password salah.');
            return redirect()->to('/login')->withInput();
        }

        $key = getenv("JWT_SECRET");

        $iat = time();
        $exp = $iat + 60 * 60; // 1 hour

        $payload = [
            'iss' => 'sims-app-web',
            'sub' => 'logintoken',
            'iat' => $iat,
            'exp' => $exp,
            'email' => $email,
        ];

        $token = JWT::encode($payload, $key, 'HS256');

        // Simpan token ke dalam session
        session()->set('jwt_token', $token);

        return redirect()->to('/product');
    }


    // Fungso Registrasi
    public function register()
    {
        return view('auth/register');
    }

    // Fungsi untuk menyimpan data user baru
    public function store()
    {

        // Aturan validasi
        $rules = [
            'name' => [
                'rules' => 'required|min_length[3]|max_length[255]'
            ],
            'position' => [
                'rules' => 'required|min_length[3]|max_length[255]',
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[users.email]',
            ],
            'password' => [
                'rules' => 'required|min_length[6]'
            ],
            'password_confirm' => [
                'rules' => 'required|matches[password]'
            ],
        ];

        // Lakukan validasi
        if ($this->validate($rules)) {
            // Menyimpan data jika validasi berhasil
            $userModel = new UsersModel();

            $data = [
                'name' => $this->request->getVar('name'),
                'position' => $this->request->getVar('position'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT), // Enkripsi password
            ];

            // Simpan data ke database
            $userModel->save($data);

            return $this->respond(['status' => true, 'message' => 'Registrasi berhasil']);
        } else {
            $response = [
                'status' => false,
                'errors' => $this->validator->getErrors()
            ];

            return $this->respond($response, 422); // Status code: Bad Request
        }
    }

    // Fungsi logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
