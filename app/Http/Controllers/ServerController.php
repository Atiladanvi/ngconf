<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ServerController extends Controller
{
    public function create()
    {
        return Inertia::render('Servers/Create');
    }

    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        return Inertia::render('Servers/Edit', [
            'server' => Server::findOrFail($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
