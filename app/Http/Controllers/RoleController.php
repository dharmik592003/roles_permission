<?php

namespace App\Http\Controllers;
use Validator;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Routing\Controllers\HasMiddleware;
 use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Models\Role;
class RoleController extends Controller  implements HasMiddleware
{

    public static function middleware():array{
        return [
            new Middleware('permission:role view',['index']),
            new Middleware('permission:role edit',['edit']),
            new Middleware('permission:role create',['create']),
            new Middleware('permission:role delete',['destroy']),
        ];
        }
    public function index()
    {
        $Roles = Role::all();

        return view('Role.list', ['Roles' => $Roles]);
    }

    // create Role
    public function create()
    {
        $permission = Permission::all();

        return view('Role.create', ['permissions' => $permission]);
    }

    // store Role in db
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:Roles|min:3'
        ]);

        if ($validator->passes()) {

            $role = Role::create(
                [
                    'name' => $request->name
                ]
            );
            if (!empty($request->permission)) {
                foreach ($request->permission as $name) {
                    $role->givePermissionTo($name);
                }
            }

            return redirect()->route('Role')->with('success', 'Role added successfully');
        } else {
            return redirect()->route('Role.create')->withInput()->withErrors($validator);
        }

    }

    // edit Role in db
    public function edit($id)
    {   $permission = Permission::all();
        $Role = Role::where('id', '=', $id)->first();
        $hasPermissions = $Role->permissions->pluck('name');
        return view('Role.edit', ['Role' => $Role,'permissions' => $permission,'hasPermissions'=>$hasPermissions]);

    }
    // update Role in db
    public function update(Request $request, $id)
    {
        $Role = Role::where('id', '=', $id)->first();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->passes()) {
            $Role->name = $request->name;
           
            $Role->save();
            if (!empty($request->permission)) {
           $Role->syncPermissions($request->permission);
            }
            else{
                $Role->syncPermissions([]);
            }
            return redirect()->route('Role')->with('success', 'Role edited successfully');
        } else {
            return redirect()->route('Role.edit',$id)->withInput()->withErrors($validator);
        }

    }
    // delete Role in db
    public function destroy($id)
    {
        $Role = Role::find($id, 'id');
        $Role->delete();
        return redirect()->route('Role')->with('success', 'Role deleted successfully');
    }
}
