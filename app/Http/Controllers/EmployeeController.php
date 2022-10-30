<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;
use Image;
use File;

class EmployeeController extends Controller
{
    //all employees method
    public function index()
    {

        $all_employees = Employee::with('designation', 'department', 'userinfo', 'empType')->get();
        dd($all_employees);
        return view('portal_pages.employees.employees-list', compact('all_employees'));
    }

    //  add employee method
    public function addEmployee(Request $request)
    {


        if ($request->isMethod('post')) {
            $data = $request->all();

            //   image upload code
            if ($request->hasFile('image')) {
                $files = $request->file('image');

                foreach ($files as $file) {
                    //get photo extension
                    $ext = $file->getClientOriginalExtension();
                    //give random name and add its ext
                    $filename = time() . '.' . $ext;
                    //set img path
                    $img_path = 'uploads/employee_images/' . $filename;
                    //intervention code for uploading photo
                    Image::make($file)->resize(250, 150)->save($img_path);
                }
            }

            // save user id
            if (!empty($data['user_id'])) {
                $employee = new Employee;
                $employee->user_id = $data['user_id'];
            }

            $employee->fname = $data['fname'];
            $employee->lname = $data['lname'];
            $employee->son_of = $data['son_of'];
            $employee->persnol_email = $data['persnol_email'];
            $employee->age = $data['age'];
            $employee->dob = $data['dob'];
            $employee->gender = $data['gender'];
            $employee->city = $data['city'];
            $employee->address = $data['address'];
            $employee->persnol_number = $data['persnol_number'];
            $employee->marital_status = $data['marital_status'];
            $employee->salary = $data['salary'];
            $employee->image = $filename;
            $employee->etype_id = $data['empType'];
            $employee->desg_id = $data['designation'];
            $employee->dep_id = $data['department'];
            $employee->save();
            return redirect('/all-employees')->with('success', 'Employee Has Been Added');
        }
        $user_id = User::orderBy('id', 'Desc')->first()->id;
        $designation = DB::table('designations')->get();
        $department  = DB::table('departments')->get();
        $etypes      = DB::table('employee_types')->get();
        return view('portal_pages.employees.add_employee_details', compact('etypes', 'designation', 'department', 'user_id'));
    }


    //edit employee
    public function editEmployee($id)
    {
        $data = Employee::find($id);
        $user_id = User::orderBy('id', 'Desc')->first()->id;
        $designation = DB::table('designations')->get();
        $department  = DB::table('departments')->get();
        $etypes      = DB::table('employee_types')->get();
        return view('portal_pages.employees.update_employee', compact('data', 'etypes', 'designation', 'department', 'user_id'));
    }

    public function updateEmployee(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            return  Employee::findOrFail($request->id);
            // $data->fname = $request->fname;
            // $data->lname = $request->lname;
            // $data->save();

            // return $data->fname = $data['fname'];
            // $employee->lname = $data['lname'];
            // $employee->save();
            // return redirect('/');

        }
    }


    // update employee info
    // public function updateEmployee(Request $request, $id)
    // {
    //     if($request->isMethod('post')){
    //         $data = $request->all();

    //           //   image upload code
    //       if($request->hasFile('image')){
    //          $files = $request->file('image');

    //          foreach ($files as $file) {
    //              //get photo extension
    //              $ext = $file->getClientOriginalExtension();
    //              //give random name and add its ext
    //              $filename = time().'.'. $ext;
    //              //set img path
    //              $img_path = 'admin/Uploads/Empoyee_images/' .$filename;
    //              //intervention code for uploading photo
    //              Image::make($file)->resize(250,150)->save($img_path);
    //          }
    //       }

    //          // save user id
    //         if(!empty($data['user_id'])){
    //          $employee = new Employee;
    //          $employee->user_id = $data['user_id'];
    //         }

    //         $employee->fname = $data['fname'];
    //         $employee->lname = $data['lname'];
    //         $employee->son_of = $data['son_of'];
    //         $employee->persnol_email = $data['persnol_email'];
    //         $employee->age = $data['age'];
    //         $employee->dob = $data['dob'];
    //         $employee->gender = $data['gender'];
    //         $employee->city = $data['city'];
    //         $employee->address = $data['address'];
    //         $employee->persnol_number = $data['persnol_number'];
    //         $employee->marital_status = $data['marital_status'];
    //         $employee->salary = $data['salary'];
    //         $employee->image = $filename;
    //         $employee->etype_id = $data['empType'];
    //         $employee->desg_id = $data['designation'];
    //         $employee->dep_id = $data['department'];
    //         $employee->update();
    //         return redirect('/dashboard')->with('flash_message_success','Employee Has Been Updated');
    //  }

    //       $user_id = User::orderBy('id','Desc')->first()->id;
    //          $designation = DB::table('designations')->get();
    //          $department  = DB::table('departments')->get();
    //          $etypes      = DB::table('employee_types')->get();
    //          return view('portal_pages.employees.update_employee',compact('etypes','designation','department','user_id',));

    // }


    //employee profile
    public function employee_profile($id)
    {
        $getEmpProfDetails = Employee::with('designation', 'department', 'userinfo', 'empType')->where('user_id',$id)->first();
        $getEmpProfDetails = json_decode(json_encode($getEmpProfDetails));
        // echo "<pre>";
        // print_r($getEmpProfDetails);
        // die;

        return view('portal_pages.employees.profile',compact('getEmpProfDetails'));
    }




} // end class
