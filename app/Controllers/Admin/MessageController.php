<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ContactMessageModel;
use CodeIgniter\HTTP\RedirectResponse;

class MessageController extends BaseController
{
    public function index(): string
    {
        return view('admin/messages/index', [
            'title' => 'İletişim Mesajları',
            'messages' => (new ContactMessageModel())->orderBy('id', 'DESC')->findAll(200),
        ]);
    }

    public function read(int $id): RedirectResponse
    {
        (new ContactMessageModel())->update($id, ['is_read' => 1]);

        return redirect()->to(site_url('yonetim/mesajlar'));
    }

    public function delete(int $id): RedirectResponse
    {
        (new ContactMessageModel())->delete($id);

        return redirect()->to(site_url('yonetim/mesajlar'))->with('success', 'Mesaj silindi.');
    }
}
