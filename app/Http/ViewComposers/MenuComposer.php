<?php
namespace App\Http\ViewComposers;

use App\Traits\MenuTraits;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MenuComposer
{
    use MenuTraits;
    protected $menu;
    protected $subMenu;
    protected $adminMenu = false;

    function __construct(Request $request)
    {
        if (! empty($this->adminMenu)) {
            $this->menu = $this->setAdminMenu($request, $this->getMenuConfig());
        }
        else {
            $this->menu = $this->setMenu($request, $this->getMenuConfig());
            $this->subMenu = $this->setMenu($request, config('site.sub_menu', []));
        }

    }

    protected function getMenuConfig()
    {
        return config('site.menu', []);
    }

    public function compose(View $view)
    {
        $view->with('menu', $this->menu);
        if (! empty($this->subMenu)) {
            $view->with('subMenu', $this->subMenu);
        }
    }
}