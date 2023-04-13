<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AdvanceCategoryController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdvanceCategoryApiController extends Controller
{
    public function index()
    {
        $categories = app(AdvanceCategoryController::class)->getAdvanceCategory()->get();

        return response()->json($categories);
    }
}
