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

    public function addEmployee(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            // Validate the request data here (if needed) before saving
            // ...

            // Image upload code
            if ($request->hasFile('image')) {
                $file = $request->file('image');

                if ($file->isValid() && in_array($file->getClientOriginalExtension(), ['jpeg', 'jpg', 'png', 'gif'])) {
                    // Ensure that the "uploads/employee_images/" directory exists
                    $uploadPath = public_path('uploads/employee_images/');
                    if (!file_exists($uploadPath)) {
                        File::makeDirectory($uploadPath, 0755, true);
                    }

                    // Give a random name and add its extension
                    $filename = time() . '.' . $file->getClientOriginalExtension();

                    try {
                        // Intervention code for uploading photo
                        Image::make($file)->resize(250, 150)->save($uploadPath . $filename);
                    } catch (\Exception $e) {
                        return redirect()->back()->with('error', 'Error while uploading the image.');
                    }
                } else {
                    return redirect()->back()->with('error', 'Invalid image file. Only jpeg, jpg, png, and gif files are allowed.');
                }
            } else {
                $filename = '';
            }

            // Save user id
            if (!empty($data['user_id'])) {
                $employee = new Employee;
                $employee->user_id = $data['user_id'];
            } else {
                // If user_id is not provided, handle the situation (you might want to add appropriate error handling here)
                return redirect()->back()->with('error', 'User ID not provided.');
            }

            // Save other employee details
            $employee->full_name = $data['full_name'];
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

        $user_id = User::orderBy('id', 'desc')->first()->id;
        $designation = DB::table('designations')->get();
        $department = DB::table('departments')->get();
        $etypes = DB::table('employee_types')->get();
        // Retrieve the full name from the session
        $user_full_name = $request->session()->get('user_full_name');
        return view('portal_pages.employees.add_employee_details', compact('etypes', 'designation', 'department', 'user_id', 'user_full_name'));
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

        $updateData->full_name = $request->full_name;
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
