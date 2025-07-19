<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
class CourseController extends Controller
{
    public function index()
    {
        return response()->json(Course::with([ 'area','training_center'])->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
          'course_number' => 'required|string|max:255|unique:courses,course_number',
          'day' => 'required|string|max:255',
          'area_id' => 'required|exists:areas,id',
          'training_center_id' => 'required|exists:training_centers,id',

        ]);

        $course = Course::create($data);

        return response()->json($course, 201);
    }

    public function show($id)
    {
        return response()->json(Course::with(['area','training_center'])->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $data = $request->validate([
          'course_number' => 'required|string|max:255|unique:courses,course_number',
          'day' => 'required|string|max:255',
           'area_id' => 'required|exists:areas,id',
          'training_center_id' => 'required|exists:training_centers,id',

        ]);
        $course->update($data);
        return response()->json($course);
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return response()->json([
            'message' => 'Course deleted successfully.'
        ], 204);
    }
}
