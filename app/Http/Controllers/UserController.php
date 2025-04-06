<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Models\Role;

class UserController extends Controller implements HasMiddleware
{
    public static function middleware(): array {
        return [
            new Middleware('permission:user view',  ['index']),
            new Middleware('permission:user edit',  ['edit']),
            new Middleware('permission:user create',  ['create']),
            new Middleware('permission:user delete',  ['delete']),
        ];
    }

    public function index() {
        $users = User::all();
        return view('user.list', ['Users' => $users]);
    }

    // create User
    public function create() {
        $roles = Role::all();
        return view('user.create', ['roles' => $roles]);
    }

    // store User in db
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users|min:3',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:8',
        ]);

        if ($validator->passes()) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
            if (!empty($request->role)) {
                $user->assignRole($request->role);
            }
            return redirect()->route('user')->with('success', 'User added successfully');
        } else {
            return redirect()->route('user.create')->withInput()->withErrors($validator);
        }
    }

    // edit User in db
    public function edit($id) {   
        $user = User::where('id', '=', $id)->first();
        $roles = Role::all();
        $hasRoles = $user->roles->pluck('name');   
        return view('user.edit', ['User' => $user, 'roles' => $roles, 'hasRoles' => $hasRoles]);
    }

    // update User in db
    public function update(Request $request, $id) {
        $user = User::where('id', '=', $id)->first();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
        ]);
        if ($validator->passes()) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            if (!empty($request->role)) {
                $user->syncRoles($request->role);
            } else {
                $user->syncRoles([]);
            }
            return redirect()->route('user')->with('success', 'User edited successfully');
        } else {
            return redirect()->route('user.edit', $id)->withInput()->withErrors($validator);
        }
    }

    // delete User in db
    public function destroy($id) {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user')->with('success', 'User deleted successfully');
    }
}
