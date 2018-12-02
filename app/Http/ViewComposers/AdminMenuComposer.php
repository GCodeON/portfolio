<?php
namespace App\Http\ViewComposers;

class AdminMenuComposer extends MenuComposer
{
    protected $adminMenu = true;

    protected function getMenuConfig()
    {
        return config('site.admin_menu', []);
    }
}