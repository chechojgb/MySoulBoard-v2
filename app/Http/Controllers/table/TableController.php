<?php

namespace App\Http\Controllers\table;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $areaRoles = $user->areaRoles;
        return view('table.agents', compact('user'));
    }

    public function indexSoporte()
    {
        $user = auth()->user();
        $areaRoles = $user->areaRoles;
        return view('table.agentsSoporte', compact('user'));
    }

    public function indexTramites()
    {
        $user = auth()->user();
        $areaRoles = $user->areaRoles;
        return view('table.agentsTramites', compact('user'));
    }

    public function indexMovil()
    {
        $user = auth()->user();
        $areaRoles = $user->areaRoles;
        return view('table.agentsMovil', compact('user'));
    }

    public function indexRetencion()
    {
        $user = auth()->user();
        $areaRoles = $user->areaRoles;
        return view('table.agentsRetencion', compact('user'));
    }
}
