<?php

namespace App\Controllers;

class ContactController extends BaseController
{
    public function index(): string
    {
        return view('contact/index', ['title' => 'İletişim | Zade Petrokimya']);
    }
}
