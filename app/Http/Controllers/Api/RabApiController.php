<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\RabController;
use Illuminate\Http\Request;

class RabApiController extends Controller
{
    public function index()
    {
        $rabs = app(RabController::class)->getRabs()
            ->select('id', 'rab_no', 'date', 'description')
            ->get();

        return response()->json($rabs);
    }
}
