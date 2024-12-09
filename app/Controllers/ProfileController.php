<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class ProfileController extends BaseController
{
    public function index()
    {
        $session = session();
        $userId = $session->get('user_id'); // Ambil ID pengguna dari sesi login

        $model = new UsersModel();
        $user = $model->find($userId);

        if (!$user) {
            return redirect()->to('/login')->with('error', 'Pengguna tidak ditemukan.');
        }

        return view('profile/v_index', [
            'user' => $user,
            'title' => 'Profile',
        ]);
    }

    public function update()
    {
        $session = session();
        $userId = $session->get('user_id'); // Ambil ID pengguna dari sesi login

        $rules = [
            'name' => 'required|min_length[3]|max_length[255]',
            'position' => 'required|min_length[3]|max_length[255]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'name' => $this->request->getVar('name'),
            'position' => $this->request->getVar('position'),
        ];

        $model = new UsersModel();

        if ($model->update($userId, $data)) {
            return redirect()->to('/profile')->with('success', 'Profil berhasil diperbarui.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui profil.');
        }
    }
}
