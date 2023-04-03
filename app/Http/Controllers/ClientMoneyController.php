<?php

namespace App\Http\Controllers;


use App\Models\Client;
use Illuminate\Http\Request;

class ClientMoneyController extends Controller
{
    public function syncMoney($clientId,$oldMoney,$newMoney){
        $client = Client::find($clientId);
        $deposit_amount = $client->deposit_amount + $newMoney - $oldMoney;

        $client->update([
            'deposit_amount' => $deposit_amount
        ]);
    }

    public function getClientMoney($clientId){
        return Client::find($clientId)->deposit_amount;
    }
}
