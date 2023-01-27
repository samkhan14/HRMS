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
        // dd($all_employees);
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

    //edit get employee info
    public function editEmployee($id)
    {
        $data = Employee::find($id);
        $user_id = User::orderBy('id', 'Desc')->first()->id;
        $designation = DB::table('designations')->get();
        $department  = DB::table('departments')->get();
        $etypes      = DB::table('employee_types')->get();
        return view('portal_pages.employees.update_employee', compact('data', 'etypes', 'designation', 'department', 'user_id'));
    }

    // update employee info
    public function updateEmployee(Request $request)
    {
        $updateData = Employee::find($request->id);
        //dd($updateData);

            //   image upload code
            if ($request->hasFile('empImage')) {
                $imgtemp = $request->file('empImage');
                if ($imgtemp->isValid()) {
                    //get image ext
                    $imgext = $imgtemp->getClientOriginalExtension();
                    // generate new image name
                    $imgName = rand(111, 99999) . '.' . $imgext;
                    // save in path
                    $imgpath = 'Uploads/employee_images/' . $imgName;
                    // upload the image
                    Image::make($imgtemp)->save($imgpath);
                }
            } elseif (!empty($request['empImageCheck'])) {
                $imgName = $request['empImageCheck'];
            } else {
                $imgName = "";
            }

            $updateData->fname = $request->fname;
            $updateData->lname = $request->lname;
            $updateData->son_of = $request->son_of;
            $updateData->persnol_email = $request->persnol_email;
            $updateData->age = $request->age;
            $updateData->dob = $request->dob;
            $updateData->gender = $request->gender;
            $updateData->city = $request->city;
            $updateData->address = $request->address;
            $updateData->persnol_number = $request->persnol_number;
            $updateData->marital_status = $request->marital_status;
            $updateData->salary = $request->salary;
            $updateData->image = $imgName;
            $updateData->status = $request->status;
            $updateData->etype_id = $request->empType;
            $updateData->desg_id = $request->designation;
            $updateData->dep_id = $request->department;
           // dd($updateData);
            $updateData->save();
            return redirect('/all-employees')->with('success', 'Employee Details updated successfully');
        }


    //employee profile
    public function employee_profile($id)
    {
        $getEmpProfDetails = Employee::with('designation', 'department', 'userinfo', 'empType')->where('user_id', $id)->first();
        $getEmpProfDetails = json_decode(json_encode($getEmpProfDetails));
        // echo "<pre>";
        // print_r($getEmpProfDetails);
        // die;

        return view('portal_pages.employees.profile', compact('getEmpProfDetails'));
    }

    public function employeeStatus(Request $request, $id)
    {


        //Employee::where('id', $id)->update(['status' => 0]);
        //return redirect('/all-employees')->with('success', 'Employee Activated Successfully');
    }
} // end class
