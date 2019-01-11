<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \DrewM\MailChimp\MailChimp;
use \DrewM\MailChimp\Webhook;

class MailchimpWebhookController extends Controller
{
    public function handle()
    {
        $mailchimp_api_key = strval(env('MAILCHIMP_API_KEY'));
        $MailChimp = new MailChimp($mailchimp_api_key);

        $account_details = $MailChimp->get('/');

        // return $account_details;
        $payload = $this->getTotalSubscriberCount($account_details);

        dd($payload);
    }

    public function getTotalSubscriberCount($account_details)
    {
        $total_subscriber_count = $account_details['total_subscribers'];

        return $total_subscriber_count;
    }
}
