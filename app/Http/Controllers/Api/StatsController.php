<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class StatsController extends Controller
{
    public function index(): JsonResponse
    {
        // Simulación de datos de prueba
        return response()->json([
            'queue'     => rand(4, 10),
            'available' => rand(2, 6),
            'onCall'    => rand(1, 4),
            'paused'    => rand(0, 3),
        ]);
    }
}
