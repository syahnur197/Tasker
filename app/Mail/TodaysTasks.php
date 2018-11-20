<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TodaysTasks extends Mailable
{
    use Queueable, SerializesModels;
    private $pendingTasks;
    private $inProcessTasks;
    private $dueTodayTasks;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->pendingTasks = $data->pendingTasks;
        $this->inProcessTasks = $data->inProcessTasks;
        $this->dueTodayTasks = $data->dueTodayTasks;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from(config('mail.from.address'))
            ->markdown('emails.todaysTasks', [
                'pendingTasks' => $this->pendingTasks,
                'inProcessTasks' => $this->inProcessTasks,
                'dueTodayTasks' => $this->dueTodayTasks
            ]);
    }
}


