<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\MailchimpController;
use App\Http\Controllers\DripController;
use DrewM\Drip\Drip;
use Analytics;
use Spatie\Analytics\Period;

class DashboardController extends Controller
{
    public function index()
    {
        $mailchimp = new MailchimpController;
        $subscribers = $mailchimp->getTotalSubscriberCount();
        $lists = $mailchimp->getLists();

        $drip = new DripController;
        $dripTotalSubscribers = $drip->getAllSubscribers()->meta['total_count'];

        //retrieve visitors and pageview data for the current day and the last seven days
        $topPages = Analytics::fetchMostVisitedPages(Period::days(7));

        // dd($topPages);
        
        return view('dashboard', [
            'subscribers' => $subscribers,
            'lists' => $lists,
            'dripTotalSubscribers' => $dripTotalSubscribers,
            'topPages' => $topPages,
        ]);
    }
}
