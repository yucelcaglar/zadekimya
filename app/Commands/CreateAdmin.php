<?php

namespace App\Commands;

use App\Models\UserModel;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class CreateAdmin extends BaseCommand
{
    protected $group = 'Admin';
    protected $name = 'admin:create';
    protected $description = 'Yönetim paneli için yeni kullanıcı oluşturur.';
    protected $usage = 'admin:create';

    public function run(array $params)
    {
        $name = trim(CLI::prompt('Ad soyad', null, 'required'));
        $email = trim(CLI::prompt('E-posta', null, 'required'));
        $password = (string) CLI::prompt('Şifre (en az 12 karakter)', null, 'required');

        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            CLI::error('Geçerli bir e-posta adresi girin.');
            return;
        }
        if (mb_strlen($password) < 12) {
            CLI::error('Şifre en az 12 karakter olmalıdır.');
            return;
        }

        $users = new UserModel();
        if ($users->where('email', $email)->first() !== null) {
            CLI::error('Bu e-posta adresi zaten kayıtlı.');
            return;
        }

        $users->insert([
            'name' => $name,
            'email' => $email,
            'password_hash' => password_hash($password, PASSWORD_DEFAULT),
            'is_active' => 1,
        ]);

        CLI::write('Yönetici kullanıcı oluşturuldu.', 'green');
    }
}
