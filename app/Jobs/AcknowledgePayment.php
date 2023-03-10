<?php

namespace App\Jobs;

use App\Gitplus\Arkesel as Sms;
use App\Models\Intern;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AcknowledgePayment implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * An Intern model
     *
     * @var \App\Models\Intern
     */
    public $intern;

    /**
     * A unique ID for the job, so the job cannot be queued multiple times
     *
     * @return string
     */
    public function uniqueId(): string
    {
        return $this->intern->intern_code;
    }

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Intern $intern)
    {
        $this->intern = $intern;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if (!empty($this->intern->phone)) {
            $sms = new Sms(
                env("ARKESEL_SMS_SENDER_ID", "InternGH"),
                env("ARKESEL_SMS_API_KEY")
            );

            $msg = <<<MSG
            Hello %s. We acknowledge receipt of your payment on Internship Ghana.
            Reference number for this payment: %s

            Contact us with your reference number if you have any issue.
            MSG;

            $msg = sprintf(
                $msg,
                ucfirst($this->intern->fname) . " " . ucfirst($this->intern->lname),
                $this->intern->payment_reference
            );

            $sms->send($this->intern->phone, $msg);
        }
    }
}
