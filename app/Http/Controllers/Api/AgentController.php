<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AgentController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            [ "extension" => "2024", "name" => "Luis Fernández", "ip" => "192.168.1.23", "status" => "En llamada", "time" => $this->randomTimeBetween(0, 400) ],
            [ "extension" => "2025", "name" => "Daniela Rojas", "ip" => "192.168.1.24", "status" => "Pausado", "time" => "-" ],
            [ "extension" => "2026", "name" => "Carlos Mena", "ip" => "192.168.1.25", "status" => "Desconectado", "time" => "-" ],
            [ "extension" => "2027", "name" => "Mónica Salas", "ip" => "192.168.1.26", "status" => "Disponible", "time" => "00:03:17" ],
        ]);
    }

    private function randomTimeBetween(int $minSeconds, int $maxSeconds): string
    {
        $seconds = rand($minSeconds, $maxSeconds);
        return gmdate("H:i:s", $seconds);
    }
}
