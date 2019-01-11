<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\MailchimpController;
use App\Http\Controllers\DripController;
use DrewM\Drip\Drip;

class DashboardController extends Controller
{
    public function index()
    {
        $mailchimp = new MailchimpController;
        $subscribers = $mailchimp->getTotalSubscriberCount();
        $lists = $mailchimp->getLists();

        $drip = new DripController;
        $dripTotalSubscribers = $drip->getAllSubscribers()->meta['total_count'];
        
        return view('dashboard', [
            'subscribers' => $subscribers,
            'lists' => $lists,
            'dripTotalSubscribers' => $dripTotalSubscribers,
        ]);
    }
}
