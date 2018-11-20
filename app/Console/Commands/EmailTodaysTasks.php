<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Mail\TodaysTasks;
use Illuminate\Support\Facades\Mail;

class EmailTodaysTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tasks:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Email to users for their current task';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // $users = User::all();
        // foreach ($users as $user) {
        //     $data = (object)array(
        //         "pendingTasks" => $user->pendingTasks,
        //         "inProcessTasks" => $user->inProcessTasks
        //     );
        //     Mail::to($user->email)->send(new TodaysTasks($data));
        // }
        $user = User::find(1);
        $data = (object)array(
            "pendingTasks" => $user->pendingTasks,
            "inProcessTasks" => $user->inProcessTasks
        );
        Mail::to($user->email)->send(new TodaysTasks($data));
    }
}
