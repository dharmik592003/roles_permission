<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Spatie\Permission\Models\Permission;
use Illuminate\Routing\Controllers\HasMiddleware;
 use Illuminate\Routing\Controllers\Middleware;
class PermissionController extends Controller implements HasMiddleware
{

    public static function middleware():array{
        return [
            new Middleware('permission:permission view',['index']),
            new Middleware('permission:permission edit',['edit']),
            new Middleware('permission:permission create',['create']),
            new Middleware('permission:permission delete',['delete']),
        ];
        }

    // show permission page
    public function index()
    {
        $permissions = Permission::all();

        return view('permission.list', ['permissions' => $permissions]);
    }

    // create permission
    public function create()
    {
        return view('permission.create');
    }

    // store permission in db
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:permissions|min:3'
        ]);

        if ($validator->passes()) {

            Permission::create(
                [
                    'name' => $request->name,
                    'group_name' => $request->group_name,

                ]
            );
            return redirect()->route('permission')->with('success', 'permission added successfully');
        } else {
            return redirect()->route('permission.create')->withInput()->withErrors($validator);
        }

    }

    // edit permission in db
    public function edit($id)
    {
        $permission = Permission::where('id', '=', $id)->first();
        return view('permission.edit', ['permission' => $permission]);

    }
    // update permission in db
    public function update(Request $request, $id)
    {
        $permission = Permission::where('id', '=', $id)->first();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'group_name' => 'required'
        ]);

        if ($validator->passes()) {
            $permission->name = $request->name;
            $permission->group_name = $request->group_name;
            $permission->save();
            return redirect()->route('permission')->with('success', 'permission edited successfully');
        } else {
            return redirect()->route('permission.create')->withInput()->withErrors($validator);
        }

    }
    // delete permission in db
    public function destroy($id)
    {
        $permission = Permission::find($id,'id');
        $permission->delete();
        return redirect()->route('permission')->with('success','permission deleted successfully');
    }
}
