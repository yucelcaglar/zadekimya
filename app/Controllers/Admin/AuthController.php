<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login(): string
    {
        if (session()->get('admin_user_id')) {
            return redirect()->to(site_url('yonetim'));
        }

        return view('admin/auth/login', ['title' => 'Yönetim Girişi | Zade Petrokimya']);
    }

    public function attempt()
    {
        $email = trim((string) $this->request->getPost('email'));
        $password = (string) $this->request->getPost('password');
        $user = (new UserModel())->where('email', $email)->where('is_active', 1)->first();

        if ($user === null || ! password_verify($password, $user['password_hash'])) {
            return redirect()->back()->withInput()->with('error', 'E-posta veya şifre hatalı.');
        }

        session()->regenerate(true);
        session()->set([
            'admin_user_id' => $user['id'],
            'admin_user_name' => $user['name'],
        ]);

        return redirect()->to(site_url('yonetim'));
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to(site_url('yonetim/giris'))->with('success', 'Güvenli şekilde çıkış yapıldı.');
    }
}
