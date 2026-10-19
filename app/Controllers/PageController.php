<?php

namespace App\Controllers;

use App\Models\CategoryModel;
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

        $view = is_file(APPPATH . 'Views/pages/' . $page['slug'] . '.php') ? 'pages/' . $page['slug'] : 'pages/show';

        return view($view, [
            'title' => ($page['seo_title'] ?: $page['title']) . ' | Zade Petrokimya',
            'description' => $page['seo_description'] ?: $page['excerpt'],
            'page' => $page,
            'categories' => $slug === 'katalog' ? (new CategoryModel())->active() : [],
        ]);
    }
}
