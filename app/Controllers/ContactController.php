<?php

namespace App\Controllers;

use App\Models\ContactMessageModel;
use CodeIgniter\HTTP\RedirectResponse;

class ContactController extends BaseController
{
    public function index(): string
    {
        return view('contact/index', ['title' => 'İletişim | Zade Petrokimya']);
    }

    public function send(): RedirectResponse
    {
        // Botlar için gizli alan: insan ziyaretçi doldurmaz.
        if ((string) $this->request->getPost('website') !== '') {
            return redirect()->to(site_url('iletisim'))->with('success', 'Teşekkür ederiz! Mesajınız bize ulaştı.');
        }

        $rules = [
            'first_name' => 'required|max_length[100]',
            'last_name' => 'required|max_length[100]',
            'email' => 'required|valid_email|max_length[190]',
            'phone' => 'permit_empty|max_length[40]',
            'subject' => 'permit_empty|max_length[190]',
            'message' => 'required|max_length[5000]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->to(site_url('iletisim') . '#iletisim-formu')->withInput()->with('errors', $this->validator->getErrors());
        }

        (new ContactMessageModel())->insert([
            'first_name' => trim((string) $this->request->getPost('first_name')),
            'last_name' => trim((string) $this->request->getPost('last_name')),
            'email' => trim((string) $this->request->getPost('email')),
            'phone' => trim((string) $this->request->getPost('phone')),
            'subject' => trim((string) $this->request->getPost('subject')),
            'message' => trim((string) $this->request->getPost('message')),
        ]);

        return redirect()->to(site_url('iletisim') . '#iletisim-formu')->with('success', 'Teşekkür ederiz! Mesajınız bize ulaştı, en kısa sürede dönüş yapacağız.');
    }
}
