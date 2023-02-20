<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $permissions = Permission::all();
        return view('portal_pages.roles_and_permissions.permissions', compact('permissions'));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate(['name'=>'required']);
        Permission::create($request->all());
        return redirect()->route('permissions.index')->with('success','New Permission has been created');
    }

    public function destroy(Permission $role)
    {
        $role->delete();
        return redirect()->back()->with('success','Permission has been deleted');
    }

    public function update(Request $request, Permission $permission)
    {
        # code...
    }
}
