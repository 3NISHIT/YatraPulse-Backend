<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DestinationModel;
use Illuminate\Http\Request;

class DestinationsController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => DestinationModel::orderByDesc('id')->get(),
            'message' => 'Destinations fetched successfully',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'image' => ['required', 'string', 'max:2048'],
            'description' => ['required', 'string', 'max:5000'],
        ]);

        $destination = DestinationModel::create($validated);

        return response()->json([
            'success' => true,
            'data' => $destination,
            'message' => 'Destination added successfully.',
        ], 201);
    }
}
