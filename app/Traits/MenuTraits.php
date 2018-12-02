<?php namespace App\Traits;

use Illuminate\Http\Request;

trait MenuTraits
{
    protected function setAdminMenu(Request $request, $menu = [], $varName = 'menu')
    {
        $user = auth()->user();
        $menu = array_filter($menu, function ($menu) use ($user) {
            if (empty($menu['role'])) {
                return true;
            }

            if (empty($user) && !empty($menu['role'])) {
                return false;
            }

            if ($menu['role'] === 'auth') {
                return true;
            }

            if ($user->hasRole('admin')) {
                return true;
            }


            if ($user->hasRole($menu['role'])) {
                return true;
            }

            return false;
        });

        return $this->setMenu($request, $menu, $varName);

    }

    protected function setMenu(Request $request, $menu = [])
    {
        $url     = $request->segment(1);
        $pattern = !empty($url) ? "/$url/" : false;
        $menu    = array_map(function ($n) use ($pattern) {
            $n['active'] = false;
            if ($pattern !== false && preg_match($pattern, $n['url'])) {
                $n['active'] = true;
            }

            return $n;
        }, $menu);

        return $menu;
    }
}