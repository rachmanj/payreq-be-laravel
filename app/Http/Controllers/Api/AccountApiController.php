<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountApiController extends Controller
{
    public function index()
    {
        $accounts = Account::select('id', 'name', 'account_no')
            ->orderBy('name', 'asc')
            ->get();

        return response()->json($accounts);
    }
}
