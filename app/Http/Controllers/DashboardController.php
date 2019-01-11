<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\MailchimpController;

class DashboardController extends Controller
{
    public function index()
    {
        $mailchimp = new MailchimpController;
        $subscribers = $mailchimp->getTotalSubscriberCount();
        $lists = $mailchimp->getLists();
        // $lists = collect($rawLists)->map->name;
        // dd($lists);
        
        return view('dashboard', [
            'subscribers' => $subscribers,
            'lists' => $lists,
        ]);
    }
}
