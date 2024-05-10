<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index()
    {
        $requests = Request::all();
        $requestsCount = Request::where;
        return view ('dashboard', [
            'requests' => $requests,
        ]);
    }
}
