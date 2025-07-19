<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Models\TrainingCenter;
class TrainingCenterController extends Controller
{
public function index()
{
    return response()->json(TrainingCenter::with(['courses', 'teachers'])->get());
}
public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:255|unique:training_centers,name',
        'location' => 'required|string|max:255',
    ]);

    TrainingCenter::create([
        'name' => $data['name'],
        'location' => $data['location'],

    ]);
    return response()->json($data, 201);
}

public function show($id)
{
    $trainingCenter = TrainingCenter::with(['courses', 'teachers'])->findOrFail($id);
    return response()->json($trainingCenter);
}
public function update(Request $request, $id)
{
    $data = $request->validate([
        'name' => 'required|string|max:255|unique:training_centers,' . $id,
        'location' => 'required|string|max:255',
    ]);

    $trainingCenter = TrainingCenter::findOrFail($id);
    $trainingCenter->update($data);
    return response()->json($trainingCenter);
}
public function destroy($id)
{
    $trainingCenter = TrainingCenter::findOrFail($id);
    $trainingCenter->delete();
    return response()->json([
        'message' => 'Training center deleted successfully.'
    ], 204);
}
}

