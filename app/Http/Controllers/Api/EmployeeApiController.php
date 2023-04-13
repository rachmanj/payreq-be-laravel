<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeApiController extends Controller
{
    public function index()
    {
        $employees = User::where('is_active', 1)->select('id', 'name', 'project', 'department_id')
            ->orderBy('name', 'asc')
            ->get();

        return response()->json($employees);
    }
}
