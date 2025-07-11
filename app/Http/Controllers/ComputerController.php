<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;

class ComputerController extends Controller
{
    public function index()
    {
        return response()->json(Computer::with(['aprendices'])->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:computers,name',
            'brand' => 'required|string|max:255',

            'aprendices_id' => 'required|exists:aprendices,id',
        ]);

        $computer = Computer::create($data);

        return response()->json($computer, 201);
    }

    public function show($id)
    {
        return response()->json(Computer::with(['aprendices'])->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $computer = Computer::findOrFail($id);
        $data = $request->validate([
            'name' => 'sometimes|required|string|max:255|unique:computers,name,' . $id,
            'brand' => 'required|string|max:255',

            'aprendices_id' => 'required|exists:aprendices,id',
        ]);
        $computer->update($data);
        return response()->json($computer);
    }

    public function destroy($id)
    {
        $computer = Computer::findOrFail($id);
        $computer->delete();
        return response()->json([
            'message' => 'Computer deleted successfully.'
        ], 204);
    }
}
