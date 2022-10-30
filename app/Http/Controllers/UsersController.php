<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;

class UsersController extends Controller
{

    public function all_Users()
    {
        $get_users = User::get();
        return view('portal_pages.employees.add_user_employees',compact('get_users'));
    }

    //add user for employee
    public function adduserEmployee(Request $request)
    {
        // return Auth::user();
        if(!empty(Auth::user()->rol_id) AND Auth::user()->rol_id == 1){
            if($request->isMethod('post')){
                $data = $request->all();
                $user = new User;
                $user->name = $data['name'];
                $user->email = $data['email'];
                $user->password = bcrypt($data['password']);
                $user->save();
                // $user_id = $user->id;
                return redirect('/add-employee');
            }
            else{
                return redirect::back()->with('error','User not created Yet Please try again');
            }
        }
        else{
            return redirect::back()->with('error','you are not allowed to add a new user');
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
