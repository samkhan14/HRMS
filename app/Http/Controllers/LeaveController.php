<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\User;
use App\Models\Employee;
use DateTime;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
    // all leaves
    public function index()
    {
        $all_leaves = Leave::with('userinfo')->orderBy('id','DESC')->get();
        return view('portal_pages.leaves.leaves', compact('all_leaves'));
    }

    // add new leave
    public function addLeave(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $addLeave = new Leave;

            if (!empty($data['user_id_as_emp_id'])) {
                $addLeave->emp_id = $data['user_id_as_emp_id'];
            }
            // code for make date difference
            // $start_date = new DateTime($request->start_date);
            // $end_date   = new DateTime($request->end_date);
            $start_date = Carbon::parse($request->start_date);
            $end_date   = Carbon::parse($request->end_date);
            $consumed_leaves = $end_date->diffInDays($start_date) + 1;

              // $days = $consumed_leaves->d;
            // $day = $start_date->diff($end_date);
            // $days = $day->d;

            $addLeave->leave_type = $data['leave_type'];
            $addLeave->days = $consumed_leaves;
            $remaining_leaves = $consumed_leaves - $addLeave->remaining_leaves;
            $addLeave->remaining_leaves = $remaining_leaves;
            $addLeave->start_date = $data['start_date'];
            $addLeave->end_date = $data['end_date'];
            $addLeave->reason = $data['reason'];
            dd($addLeave);
            $addLeave->save();
            return redirect('/leaves')->with('success', 'Leave has been Submited');
        }
    }

    //approve leave
    public function approveLeave($id, Request $request)
    {
        // code for make date difference
        $start_date = new DateTime($request->start_date);
        $end_date   = new DateTime($request->end_date);
        $day = $start_date->diff($end_date);
        $days = $day->d;

        Leave::where('id', $id)->update(['status' => 'Approved','remaining_leaves' => - $days ]);
        return redirect()->back()->with('success', 'Leave has been Approved');
    }

    //reject leave
    public function rejectLeave($id)
    {
        Leave::where('id', $id)->update(['status' => 'Rejected']);
        return redirect()->back()->with('success', 'Leave has been Rejected');
    }

    // edit leave
    //public function editLeave(Request $request)
    // {

    //     // code for make date difference
    //     $start_date = new DateTime($request->start_date);
    //     $end_date   = new DateTime($request->end_date);
    //     $day = $start_date->diff($end_date);
    //     $days = $day->d;

    //     $data = [
    //         'id', $request->id,
    //         'leave_type', $request->leave_type,
    //         'days', $days,
    //         'start_date', $request->start_date,
    //         'end_date', $request->end_date,
    //         'reason', $request->reason,
    //     ];

    //     Leave::where('id', $request->id)->update($data);
    //     return redirect()->back();


    //     if ($request->isMethod('post')) {
    //         $data = $request->all();

    //         // if (!empty($data['user_id_as_emp_id'])) {

    //         //     $addLeave->emp_id = $data['user_id_as_emp_id'];
    //         // }

    //         $editLeave->id = $data['id'];
    //         $editLeave->leave_type = $data['leave_type'];
    //         $editLeave->days = $days;
    //         $editLeave->start_date = $data['start_date'];
    //         $editLeave->end_date = $data['end_date'];
    //         $editLeave->reason = $data['reason'];
    //         Leave::where('id', $data['id'])->update();
    //         return redirect('/leaves')->with('success', 'Leave has been Updated');
    //     }
    // }


}
