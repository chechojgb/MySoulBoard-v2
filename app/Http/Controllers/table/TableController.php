<?php

namespace App\Http\Controllers\table;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function index()
    {
        return view('table.agents');
    }
}
