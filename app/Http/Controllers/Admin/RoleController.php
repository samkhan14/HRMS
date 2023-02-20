<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $roles = Role::all();
        return view('portal_pages.roles_and_permissions.roles', compact('roles'));
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
        Role::create($request->all());
        return redirect()->route('roles.index')->with('success','New Role has been created');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->back()->with('success','Role has been deleted');
    }

    public function update(Request $request, $id)
    {
        return dd("edit role");
    }
}
