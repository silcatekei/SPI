<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubjectController extends Controller
{
    public function index()
    {
        return response()->json(Subject::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'subject_name' => 'nullable|string',
            'strand' => 'nullable|string',
            'grade_level' => 'nullable|string',
            'units' => 'nullable|integer',
            'lecturer_uuid' => 'nullable|string',
        ]);

        $data['uuid'] = Str::uuid();
        $subject = Subject::create($data);

        return response()->json($subject, 201);
    }

    public function show($uuid)
    {
        return response()->json(Subject::where('uuid', $uuid)->firstOrFail());
    }

    public function update(Request $request, $uuid)
    {
        $subject = Subject::where('uuid', $uuid)->firstOrFail();

        $data = $request->validate([
            'subject_name' => 'sometimes|string',
            'strand' => 'sometimes|string',
            'grade_level' => 'sometimes|string',
            'units' => 'sometimes|integer',
            'lecturer_uuid' => 'sometimes|string',
        ]);

        $subject->update($data);
        return response()->json($subject);
    }

    public function destroy($uuid)
    {
        $subject = Subject::where('uuid', $uuid)->firstOrFail();
        $subject->delete();
        return response()->json(null, 204);
    }
}