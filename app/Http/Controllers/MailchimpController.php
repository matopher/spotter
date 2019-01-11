<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \DrewM\MailChimp\MailChimp;
use \DrewM\MailChimp\Webhook;

class MailchimpController extends Controller
{
    private $details;

    public function __construct()
    {
        $mailchimp_api_key = strval(env('MAILCHIMP_API_KEY'));
        $MailChimp = new MailChimp($mailchimp_api_key);

        $account_details = $MailChimp->get('/');

        $this->details = $account_details;
    }

    public function getDetails()
    {
        return $this->details;
    }

    public function getTotalSubscriberCount()
    {
        $total_subscriber_count = $this->details['total_subscribers'];

        return $total_subscriber_count;
    }
}
