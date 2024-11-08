<?php

namespace App\Http\Controllers;

use App\Models\Patron;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentRequest;

class PatronController extends Controller
{
    public function index() {
        $patrons = Patron::orderBy('created_at', 'desc');

        return response()->json([
            'success' => true,
            'message' => 'List of patrons',
            'count' => $patrons->count(),
            'data' => $patrons->get()
        ], 200);
    }

    // Store a new student
    public function store(StoreStudentRequest $request)
    {
        // Create the patron record
        $patron = Patron::create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Patron registered successfully',
            'data' => $patron
        ], 201);
    }
}
