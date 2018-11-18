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
        $client = new \GuzzleHttp\Client();
        $endpoint = "https://api.forismatic.com/api/1.0/?method=getQuote&format=json&lang=en";
        $response = $client->request('GET', $endpoint);
        $content = json_decode($response->getBody(), true);
        $data["quote"] = (object)$content;
        $data['pending_tasks'] = auth()->user()->pendingTasks;
        $data['in_process_tasks'] = auth()->user()->inProcessTasks;
        $data['completed_today_tasks'] = auth()->user()->completedTodayTasks;
        return view('dashboard', $data);
    }
}
