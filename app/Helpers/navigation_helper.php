<?php

use App\Models\MenuItemModel;
use App\Models\MenuModel;

if (! function_exists('main_menu')) {
    /**
     * @return list<array<string, mixed>>
     */
    function main_menu(): array
    {
        static $menuTree = null;

        if ($menuTree !== null) {
            return $menuTree;
        }

        try {
            $menu = (new MenuModel())->where('code', 'main')->first();

            if ($menu === null) {
                return $menuTree = [];
            }

            $items = (new MenuItemModel())
                ->where('menu_id', $menu['id'])
                ->where('is_active', 1)
                ->orderBy('sort_order', 'ASC')
                ->findAll();

            return $menuTree = build_menu_tree($items);
        } catch (\Throwable) {
            return $menuTree = [];
        }
    }
}

if (! function_exists('build_menu_tree')) {
    /**
     * @param list<array<string, mixed>> $items
     * @return list<array<string, mixed>>
     */
    function build_menu_tree(array $items, ?int $parentId = null): array
    {
        $branch = [];

        foreach ($items as $item) {
            $itemParentId = $item['parent_id'] === null ? null : (int) $item['parent_id'];

            if ($itemParentId !== $parentId) {
                continue;
            }

            $item['children'] = build_menu_tree($items, (int) $item['id']);
            $branch[] = $item;
        }

        return $branch;
    }
}

if (! function_exists('menu_link')) {
    function menu_link(string $url): string
    {
        if ($url === '#' || str_starts_with($url, 'http://') || str_starts_with($url, 'https://')) {
            return $url;
        }

        return site_url(ltrim($url, '/'));
    }
}
