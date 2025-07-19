<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Area;

class AreaController extends Controller
{
  public function index()
  {
return response()->json(Area::all());
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
        return response()->json(Area::findOrFail($id));
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
 public function destroy($id):JsonResponse
    {
        $area = Area::findOrFail($id);
        $area->delete();
        return response()->json([
            'message' => 'Area eliminado correctamente.'
        ], 204);
}
}
