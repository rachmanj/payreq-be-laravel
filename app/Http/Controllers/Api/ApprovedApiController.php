<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApprovedController;
use App\Http\Controllers\Controller;
use App\Models\Payreq;
use Illuminate\Http\Request;

class ApprovedApiController extends Controller
{
    // Get all approved api
    public function index()
    {
        $payreqs = app(ApprovedController::class)->getApproved()
            ->with('employee:id,name')
            ->get();

        return response()->json($payreqs);
    }

    // store new payreq
    public function store(Request $request)
    {
        $payreq = Payreq::create($request->all());
        // create response
        $response = Payreq::with('employee:id,name')->where('id', $payreq->id)
            ->select('id', 'payreq_num', 'user_id', 'approve_date', 'payreq_type', 'payreq_idr', 'outgoing_date', 'rab_id')
            ->selectRaw('datediff(now(), approve_date) as days')
            ->first();

        return response()->json($response);
    }
}
