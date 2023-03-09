<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\InternRegistrationEmail;
use Illuminate\Support\Facades\Mail;
use App\Gitplus\Arkesel as Sms;

class SendOnBoardingNotifications implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $user;
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
        
         $message = <<<MSG
            Hello {$this->user->fname} {$this->user->lname}, welcome to Internship Ghana.
            Here, we link students to the right job environment to acquire the appropriate and relevant skillset needed in their desired field of practice.
            MSG;

           
                $sms = new Sms(env("ARKESEL_SMS_SENDER_ID", "InternGh"), env("ARKESEL_SMS_API_KEY"));
                $sms->send($this->user->phone, $message);
            

            Mail::to($this->user->email)->send(new InternRegistrationEmail([

                "fname" => $this->user->fname,
                "lname" => $this->user->lname,
            ]));
            
            
    }
}
