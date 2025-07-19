<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
class TeacherController extends Controller
{
    public function index()
    {
        return response()->json(Teacher::with([ 'area','trainingCenter'])->get());
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:teachers,name',
            'email' => 'required|email|unique:teachers,email',
            'phone' => 'nullable|string|max:20',
            'area_id' => 'required|exists:areas,id',
            'training_center_id' => 'required|exists:training_centers,id',

        ]);
        $teacher = Teacher::create($data);
        return response()->json($teacher, 201);
    }
    public function show($id)
    {
        return response()->json(Teacher::with([ 'area','trainingCenter'])->findOrFail($id));
    }
    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);
        $data = $request->validate([
            'name' => 'sometimes|required|string|max:255|unique:teachers,name,' . $id,
            'email' => 'sometimes|required|email|unique:teachers,email,' . $id,
            'phone' => 'nullable|string|max:20',
            'area_id' => 'sometimes|required|exists:areas,id',
            'training_center_id' => 'sometimes|required|exists:training_centers,id',
        ]);
        $teacher->update($data);
        return response()->json($teacher);
    }
Public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        return response()->json([
            'message' => 'Teacher eliminado exitosamente.'
        ], 204);
    }
}
