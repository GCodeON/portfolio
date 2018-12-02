<?php

namespace App\Http\Controllers;

use App\EventRegistration;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Zizaco\Entrust\Entrust;

class AdminController extends Controller
{

    public function __construct(Request $request)
    {
        $this->middleware(function ($request, $next) {
            view()->share('userAccount', auth()->user()->toArray());

            return $next($request);
        });
    }

    function home()
    {
        return view('admin.home');
    }


    function users()
    {
        $users = User::all()->map(function ($user) {
            $user->role = $user->hasRole('admin') ? 'admin' : 'manager';

            return $user;
        });

        return view('admin.users', ['users' => $users->toArray()]);
    }

    function login($id)
    {
        $user = User::where('id', $id)->first();
        if (!empty($user)) {
            Auth::login($user);
        }

        return redirect('/admin');

    }

    function addUser(Request $request)
    {
        $user           = new User;
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $roleName = $request->role;
        $role     = Role::findName($roleName);
        $user->attachRole($role);

        return redirect('admin/users');

    }

}
