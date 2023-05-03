<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Redirect;


class RoleController extends Controller
{
    public function index()
    {
        //
        $data['roles'] = Role::orderBy('id', 'desc')->paginate(18);

        return view('portal_pages.roles_and_permissions.roles', $data);
    }

    public function store(Request $request)
    {
        //
        $postID = $request->role_id;
        $post   =   Role::updateOrCreate(
            ['id' => $postID],
            [
                'name' => $request->name

            ]
        );

        //dd($post);

        return response()->json($post);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $where = array('id' => $id);
        $post  = Role::where($where)->first();

        return response()->json($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Role::where('id', $id)->delete();

        return response()->json($post);
    }
}
