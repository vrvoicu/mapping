<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    //

    public function index(){
        return view('clients.index');
    }

    public function create(){
        return view('clients.create');
    }

    public function store(Request $request){

        $rules = [
            'client_name' => 'required',
            'client_url' => 'required',
        ];

        $this->validate($request, $rules);

        Clients::create($request->only([
            'client_name', 'client_url'
        ]));

    }
}
