<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;

class ComputerController extends Controller
{
    public function index()
    {
        return response()->json(Computer::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'number' => 'required|string|max:255|unique:computers,number',
            'brand' => 'required|string|max:255',


        ]);

        $computer = Computer::create($data);

        return response()->json($computer, 201);
    }

    public function show($id)
    {
        return response()->json(Computer::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $computer = Computer::findOrFail($id);
        $data = $request->validate([
            'number' => 'sometimes|required|string|max:255|unique:computers,number,' . $id,
            'brand' => 'required|string|max:255',


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
