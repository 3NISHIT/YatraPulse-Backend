<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function index()
    {

        return response()->json([
            'success' => true,
            'message' => 'Welcome to Yatra Pulse!!',
        ]);
    }

    public function data()
    {

        return response()->json([
            'success' => true,
            'message' => 'Tours of Yatra Pulse!!',
            'data' => [
                [
                    'id' => 1,
                    'name' => 'Char Dham Yatra',
                    'duration' => '5 Days/ 4 Nights',
                    'persons' => '5',
                    'cost' => '20000',
                    'origin' => 'Hyderabad',
                ],
                [
                    'id' => 2,
                    'name' => 'Do Dham Yatra',
                    'duration' => '4 Days/ 3 Nights',
                    'persons' => '10',
                    'cost' => '50000',
                    'origin' => 'Warangal',
                ],
                [
                    'id' => 3,
                    'name' => 'Kedarnath Yatra',
                    'duration' => '6 Days/ 5 Nights',
                    'persons' => '20',
                    'cost' => '100000',
                    'origin' => 'Hyderabad',
                ],
                [
                    'id' => 4,
                    'name' => 'Kerala',
                    'duration' => '5 Days/ 4 Nights',
                    'persons' => '5',
                    'cost' => '20000',
                    'origin' => 'Hyderabad',
                ],

            ]]);
    }
}
