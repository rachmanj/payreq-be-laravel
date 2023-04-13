<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApprovedController;
use App\Http\Controllers\Controller;
use App\Models\Payreq;
use Illuminate\Http\Request;

class PayreqApiController extends Controller
{
    public function index()
    {
        $payreqs = app(ApprovedController::class)->getAllPayreqs()
            ->with('employee:id,name,nik,username')
            ->paginate(10);

        return response()->json($payreqs);
    }

    public function check_unique(Request $request)
    {
        // use params from request
        $payreq_num = $request->payreq_num;

        // check if payreq_num is unique
        $isUnique = Payreq::select('payreq_num')->where('payreq_num', $payreq_num)->first();

        return $isUnique;
    }

    public function update(Request $request, $id)
    {
        $payreq = Payreq::find($id);

        $payreq->update($request->all());

        return response()->json($payreq);
    }

    public function getById($id)
    {
        $payreq = Payreq::find($id);

        return response()->json($payreq);
    }
}
