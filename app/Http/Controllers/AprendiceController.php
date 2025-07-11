<?php

namespace App\Http\Controllers;

use App\Models\Aprendice;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AprendiceController extends Controller
{
    public function index():JsonResponse{
        return response()->json( Aprendice::with(['computer', 'course'])->get() );


    }
    public function store (Request $request):JsonResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:aprendices,email',
            'phone' => 'nullable|string|max:20',
            'computer_id' => 'required|exists:computers,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        $aprendice = Aprendice::create($data);

        return response()->json($aprendice, 201);
    }
    public function show($id):JsonResponse
    {
      return response()->json( Aprendice::with(['computer', 'course'])->findOrFail($id) );
    }

    public function update(Request $request, $id):JsonResponse
    {
        $aprendice = Aprendice::findOrFail($id);

        $data = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:aprendices,email,' . $id,
            'phone' => 'nullable|string|max:20',
            'computer_id' => 'sometimes|required|exists:computers,id',
            'course_id' => 'sometimes|required|exists:courses,id',
        ]);

        $aprendice->update($data);

        return response()->json($aprendice);
    }
    public function destroy($id):JsonResponse
    {
        $aprendice = Aprendice::findOrFail($id);
        $aprendice->delete();
        return response()->json([
            'message' => 'Aprendice eliminado correctamente.'
        ], 204);
}
}
