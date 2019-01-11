<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\MailchimpController;

class DashboardController extends Controller
{
    public function index()
    {
        $mailchimp = new MailchimpController;
        $subscribers = $mailchimp->getTotalSubscriberCount();
        
        return view('dashboard', [
            'subscribers' => $subscribers
        ]);
    }
}
