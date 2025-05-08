<?php

namespace App\Http\Controllers\Api\Review;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Repository\DataRepository;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $Repository = new DataRepository(new Review());
        $reviews = $Repository->all();
        return response()->json(['data' => $reviews], 200);
    }
}
