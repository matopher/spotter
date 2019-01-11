<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\MailchimpWebhookController;

class DashboardController extends Controller
{
    public function index()
    {
        $mailchimp = new MailchimpWebhookController;
        $subscribers = $mailchimp->getTotalSubscriberCount();
        
        return view('dashboard')->withSubscribers($subscribers);
    }
}
