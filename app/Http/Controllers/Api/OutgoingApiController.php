<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\OutgoingController;
use Illuminate\Http\Request;

class OutgoingApiController extends Controller
{
    public function index()
    {
        $outgoings = app(OutgoingController::class)->getOutgoing()
            ->with('employee:id,name')
            ->get();

        return response()->json($outgoings);
    }
}
