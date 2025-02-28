<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ClassController extends Controller
{
    public function index()
    {
        return response()->json(ClassModel::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'subject_uuid' => 'nullable|exists:subjects,uuid',
            'lecturer_uuid' => 'nullable|exists:lecturers,uuid',
            'schedule' => 'nullable|string',
            'room_number' => 'nullable|string',
        ]);

        $data['uuid'] = Str::uuid();
        $class = ClassModel::create($data);

        return response()->json($class, 201);
    }

    public function show($uuid)
    {
        return response()->json(ClassModel::where('uuid', $uuid)->firstOrFail());
    }

    public function update(Request $request, $uuid)
    {
        $class = ClassModel::where('uuid', $uuid)->firstOrFail();

        $data = $request->validate([
            'schedule' => 'sometimes|string',
            'room_number' => 'sometimes|string',
        ]);

        $class->update($data);
        return response()->json($class);
    }

    public function destroy($uuid)
    {
        $class = ClassModel::where('uuid', $uuid)->firstOrFail();
        $class->delete();
        return response()->json(null, 204);
    }
}