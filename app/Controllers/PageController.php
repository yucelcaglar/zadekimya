<?php

namespace App\Controllers;

use App\Models\PageModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class PageController extends BaseController
{
    public function show(string $slug): string
    {
        $page = (new PageModel())->where('slug', $slug)->where('is_active', 1)->first();

        if ($page === null) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('pages/show', [
            'title' => ($page['seo_title'] ?: $page['title']) . ' | Zade Petrokimya',
            'description' => $page['seo_description'] ?: $page['excerpt'],
            'page' => $page,
        ]);
    }
}
