<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{
  public function index()
  {
return response()->json(Area::with(['courses', 'teachers'])->get());
  }
    public function store(Request $request)
    {
        $data = $request->validate([
        'name' => 'required|string|max:255|unique:areas,name',
        ]);

        $area = Area::create($data);

        return response()->json($area, 201);
    }

    public function show($id)
    {
        return response()->json(Area::with(['courses', 'teachers'])->findOrFail($id));
    }
    public function update(Request $request, $id)
    {
        $area = Area::findOrFail($id);
        $data = $request->validate([
            'name' => 'sometimes|required|string|max:255|unique:areas,name,' . $id,
        ]);
        $area->update($data);
        return response()->json($area);
}
}
