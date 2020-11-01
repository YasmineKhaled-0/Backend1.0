<?php

namespace App\Http\Controllers\Api;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Client;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClientList;
use App\Http\Resources\ClientShow;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    use CoreJsonResponse;

    public function index()
    {
        $clients = ClientList::collection(Client::all());
        return $this->ok($clients->resolve());
    }

    public function show(Client $client)
    {
        return new ClientShow($client);
    }
}
