<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Welcome;
use Response;
use Session;
use DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Employee;

class UsersController extends Controller
{

    public function all_Users()
    {
        // return User::role('HR')->get();
        //return auth()->user()->getAllPermissions();
        //return  auth()->user()->givePermissionTo('edit user');
        //auth()->user()->assignRole('executive');

        //  Role::create(['name' => 'writer']);
        //  Permission::create(['name' => 'edit articles']);
        //          $role = Role::findById(3);
        // // // $role->revokePermissionTo($role);
        //  $permission = Permission::findById(3);
        // // // $permission->removeRole($role);
        //  $role->givePermissionTo($permission);

        $get_users = User::with('empRelation', 'roles')->get();
        //dd($get_users);
        return view('portal_pages.employees.add_user_employees', compact('get_users'));
    }

    public function adduserEmployee(Request $request)
{
    if ($request->isMethod('post')) {
        $data = $request->all();
        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->save();

        if ($user) {
            // Assign multiple roles to the user
            $roles = $request->input('roles'); // Assuming 'roles' is an array of role names
            $user->assignRole($roles);
        }

        // Retrieve the user's full name
        $full_name = $data['name'];

        $user_id = $user->id;
        $employee = new Employee;
        $employee->user_id = $user_id;
        $employee->full_name = $full_name;
        $employee->save();

        if ($user && $employee) {
            // Save the full name in the session
            session(['user_full_name' => $full_name]);
            return redirect('/add-employee');
        }
    } else {
        return redirect()->back()->with('error', 'User not created yet. Please try again');
    }
}




    public function adminlogin(Request $request)
    {

        // if ($request->isMethod('post'))
        // {

        //     $data = $request->input();
        //     // echo "<pre>"; print_r($data); die;
        //     if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']])){

        //         if(Auth::user()->rol_id==1){
        //             $request->session()->put('frontM', $data['email']);
        //             return redirect('/dashboard');
        //         }
        //         else if(Auth::user()->rol_id==2){
        //             return redirect('/dashboard');
        //         }
        //     }

        //     else{
        //         return back()->with('error','email or password is invalid');
        //    }
        // }

    }

    // public function logout(Request $request)
    // {
    //     Auth::logout();
    //     $request->session()->forget('frontM');
    //     return redirect('/');

    //     // $request->session()->flush();
    //     // Auth::logout();
    //     // return redirect('/');
    // }





}
