<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ToursModel;
use Illuminate\Http\Request;

class ToursController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'destination_id' => ['required', 'integer', 'exists:destinations,id'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:tours,slug'],
            'price' => ['required', 'numeric', 'min:0'],
            'duration' => ['required', 'integer', 'min:1'],
            'description' => ['required', 'string', 'max:5000'],
            'inclusions' => ['required', 'string', 'max:5000'],
            'exclusions' => ['required', 'string', 'max:5000'],
        ]);

        $tour = ToursModel::create($validated);

        return response()->json([
            'success' => true,
            'data' => $tour,
            'message' => 'Tour added successfully.',
        ], 201);
    }

    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => ToursModel::with('destination')->orderByDesc('id')->get(),
            'message' => 'Tours fetched successfully.',
        ]);
    }
}
