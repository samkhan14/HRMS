<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;

class DashboardController extends Controller
{
    public function index()
    {

    }

    //getCheckin TIme
    public function getAttendanceTime()
    {

        return view('portal_pages.dashboard', compact(''));
    }
}
