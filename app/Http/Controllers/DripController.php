<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DrewM\Drip\Drip;
use DrewM\Drip\Dataset;

class DripController extends Controller
{
    private $subscribers;

    public function __construct()
    {
        $drip_api_key = strval(env('DRIP_API_KEY'));
        $drip_account_id = strval(env('DRIP_ACCOUNT_ID'));

        $Drip = new Drip($drip_api_key, $drip_account_id);

        $subscribers = $Drip->get('subscribers');

        $this->subscribers = $subscribers;
    }

    public function getAllSubscribers()
    {
        return $this->subscribers;
    }
}
