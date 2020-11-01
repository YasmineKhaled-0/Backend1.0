<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        //
    }
    public function create()
    {
        return view('admin.client.create', [
            'clients' => Client::all()
        ]);
    }
    public function store(Request $request)
    {
        $client = Client::create($request->all());

        return redirect(route('admin.clients.show', $client));
    }
    public function show(Client $client)
    {
        return view('admin.client.show', [
            'client'=> $client
        ]);
    }
    public function edit(Client $client)
    {
        return view('admin.client.edit', [
            'client' => $client,
            'clients' => Client::all()
        ]);
    }
    public function update(Request $request, Client $client)
    {
        $client->update($request->all());
        return redirect(route('admin.clients.show', $client));
    }
    public function destroy(Client $client)
    {
        $client->delete();
        return  redirect(route('admin.clients.index'));
    }
}
