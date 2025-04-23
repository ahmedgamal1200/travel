<?php

namespace App\Http\Controllers\V1\APi\Users;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Api\TourResource;
use App\Models\Tour;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $tours = TourResource::collection(Tour::query()->paginate(15));

        return response()->json([
            'message' => 'Tours retrieved successfully',
            'tours' => $tours,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $tour = Tour::query()->findOrFail($id);
        return response()->json([
            'message' => 'Tour retrieved successfully',
            'tour' => new TourResource($tour),
        ]);
    }
}
