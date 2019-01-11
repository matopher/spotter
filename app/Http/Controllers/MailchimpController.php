<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \DrewM\MailChimp\MailChimp;
use \DrewM\MailChimp\Webhook;

class MailchimpController extends Controller
{
    private $details;
    private $lists;

    public function __construct()
    {
        $mailchimp_api_key = strval(env('MAILCHIMP_API_KEY'));
        $MailChimp = new MailChimp($mailchimp_api_key);

        $account_details = $MailChimp->get('/');
        $lists = $MailChimp->get('lists');

        $this->details = $account_details;
        $this->lists = $lists['lists'];
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

    public function getLists()
    {
        return $this->lists;
    }
}
