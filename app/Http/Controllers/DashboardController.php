<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use guzzlehttp\guzzle;

class DashboardController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pending_tasks'] = auth()->user()->pendingTasks;
        $data['in_process_tasks'] = auth()->user()->inProcessTasks;
        $data['completed_today_tasks'] = auth()->user()->completedTodayTasks;
        return view('dashboard', $data);
    }
}
