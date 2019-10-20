<?php

namespace App\Http\Controllers;

use Cswiley\Blogger\Repositories\BlogRepository;
use Cswiley\Cms\Cms;
use Illuminate\Http\Request;
use Html;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class AppController extends Controller
{
    private $cms;
    private $request;

    public function __construct(Cms $cms, Request $request)
    {
        $this->cms     = $cms;
        $this->request = $request;
        View::share('globals', $this->cms->get('globals'));
    }

    function home()
    {
        // $data = $this->cms->get('home');
        // return view('home', $data);
        return redirect('/about');
    }

    function blog($idOrSlug, BlogRepository $blogRepository) {
        $query = $blogRepository->idOrSlug($idOrSlug)->onlyActive()->execute();
        dd($query->first());
    }

    function page(Request $request)
    {
        $page = $request->segment(1);
        $data = $this->cms->get($page);
        $data['page'] = $page;
        if (View::exists($page)) {
            return view($page, $data);
        }

        abort(404);
    }

}
