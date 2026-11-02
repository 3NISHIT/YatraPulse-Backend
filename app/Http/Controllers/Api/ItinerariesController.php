<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ItinerariesModel;
use Illuminate\Http\Request;

class ItinerariesController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => ItinerariesModel::with('tour')->orderByDesc('id')->get(),
            'message' => 'Itineraries fetched successfully.',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tour_id' => ['required', 'integer', 'exists:tours,id'],
            'day_number' => ['required', 'integer', 'min:1'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:5000'],
        ]);

        $itinerary = ItinerariesModel::create($validated);

        return response()->json([
            'success' => true,
            'data' => $itinerary,
            'message' => 'Itinerary added successfully.',
        ], 201);
    }
}
