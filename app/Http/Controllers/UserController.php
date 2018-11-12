<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

    }

    public function store(Request $request)
    {
        auth()->user()->update($request->all());
        return $this->response->created();
    }
}
