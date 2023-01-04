<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use DB;
use Carbon\Carbon;
use Session;

class AttendanceController extends Controller
{
    //index page
    // public function getAllAttendances()
    // {
    //     $data['table'] = DB::table('vattendance')->get();
    //     return view('portal_pages.attendance.attendances', $data);
    // }

    public function getAllAttendances()
    {
        $getAttRecord = Attendance::where(['date' => Carbon::now()])->get();
        dd($getAttRecord);
        //return view('portal_pages.attendance.admin_attendance',compact('getAttRecord'));
    }

    public function SaveUploadAttendance(Request $request)
    {
        $file = $request->file('up_attendance');
        $filename = $file->getPathName();
        $file = fopen($filename, "r");
        while (($at = fgetcsv($file, 100, ",")) !== FALSE) {
            DB::insert(
                'insert into attendances (user_id, date, checkin, checkout, attendance_type) values (?,?,?,?,?)',
                [$at[0], $at[1], $at[2], $at[3], 'Machine']
            );
        }

        fclose($file);
        return redirect('/attendances');
    }

    public function markManualAttendance()
    {
        $eid = request('empid');
        $date = request('att_date');
        $checkin_time = request('att_time_in');
        $checkout_time = request('att_time_out');
        $type = "Manual Mark";
        DB::insert('insert into `attendances` (`user_id`,`date`,`checkin`,`checkout`,`attendance_type`) values (?,?,?,?,?)', [$eid, $date, $checkin_time, $checkout_time, $type]);
        return redirect('/attendance-list')->with('success', 'You have Marked Manual Attendance Successfully');
    }

    // button checkin code
    public function checkin(Request $request)
    {
        //    $check_btnAttendance = Attendance::where(['user_id'=> Auth::user()['id']])->count();
        //    if($check_btnAttendance > 0){
        //         echo"already exists";
        //    }

        if ($request->isMethod('post')) {
            $data = $request->all();
            // return $request->Session::has('checkin_status');

            // checkout functionality
            if ($request->session()->has('checkin_status')) {
                $checksession =  Attendance::where('id', $request->session()->get('checkin_status'))->first();
                $checksession->checkout = Carbon::now();
                $checksession->status = 0;
                $checksession->save();
                if ($checksession) {
                    $request->session()->forget('checkin_status');
                    return redirect()->back()->with('success', 'You have Checked Out Successfully');
                }
            }

            // checkin functionality
            $data = Attendance::create([
                'date'     => Carbon::today(),
                'checkin'  => Carbon::now(),
                'checkout' => '0',
                'status' => 1,
                'user_id'  => auth()->user()->id,
                'attendance_type' => 'on Submit',
            ]);

            $request->session()->put('checkin_status', $data->id);

            if ($data) {
                return redirect()->back()->with('success', 'You have Checked In Successfully');
            } else {
                return redirect()->back()->with('error', 'oops Sorry u did not Checked In .kindly contact with administraitor');
            }
        }
    }

    // END CLASS
}
