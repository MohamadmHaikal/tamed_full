<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;


class SendAdsNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $data, $title, $message, $type, $from;
    public function __construct($data, $type, $title, $message, $from)
    {
        $this->data = $data;
        $this->title = $title;
        $this->message = $message;
        $this->type = $type;
        $this->from = $from;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->data as $user) {
            if ($this->from != $user->id) {

                addNotification($this->from, $user->id, $this->title, $this->message, $this->type);
                addMessage($this->from, $user->id, $this->title);
            }
        }
    }
}
