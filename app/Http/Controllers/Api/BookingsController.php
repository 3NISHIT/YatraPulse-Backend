<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BookingsModel;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => BookingsModel::with('tour')->orderByDesc('id')->get(),
            'message' => 'Bookings fetched successfully.',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tour_id' => ['required', 'integer', 'exists:tours,id'],
            'name' => ['required', 'string'],
            'phone' => ['required', 'string', 'max:32'],
            'travel_date' => ['sometimes'],
            'tourist' => ['sometimes'],
        ]);

        $booking = BookingsModel::create($validated);

        return response()->json([
            'success' => true,
            'data' => $booking,
            'message' => 'Booking added successfully.',
        ], 201);
    }
}
