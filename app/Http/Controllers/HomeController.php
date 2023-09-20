<?php

namespace App\Http\Controllers;

use App\Models\Attended;
use App\Models\AttendedTwo;
use App\Models\Employee;
use App\Models\Status;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()           
    {

        $pending = Status::where('status', 'pending')->count();
        $approved = Status::where('status', 'approved')->count();
        $attended = Attended::count();
        $attended_two = AttendedTwo::count();

        
        $total_pending = "['Pending', $pending],";
        $total_approved = "['Approved', $approved],";
        $total_attended = "['Attended', $attended]";
        return view('admin.dashboard',compact('pending','approved','attended','attended_two','total_pending','total_approved','total_attended'));
    }
}
