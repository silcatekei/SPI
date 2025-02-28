<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LecturerController extends Controller
{
    public function index()
    {
        return response()->json(Lecturer::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'nullable|string',
            'email' => 'nullable|email|unique:lecturers',
            'contact_number' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        $data['uuid'] = Str::uuid();
        $lecturer = Lecturer::create($data);

        return response()->json($lecturer, 201);
    }

    public function show($uuid)
    {
        return response()->json(Lecturer::where('uuid', $uuid)->firstOrFail());
    }

    public function update(Request $request, $uuid)
    {
        $lecturer = Lecturer::where('uuid', $uuid)->firstOrFail();

        $data = $request->validate([
            'name' => 'sometimes|string',
            'email' => 'sometimes|email|unique:lecturers,email,' . $lecturer->id,
            'contact_number' => 'sometimes|string',
            'address' => 'sometimes|string',
        ]);

        $lecturer->update($data);
        return response()->json($lecturer);
    }

    public function destroy($uuid)
    {
        $lecturer = Lecturer::where('uuid', $uuid)->firstOrFail();
        $lecturer->delete();
        return response()->json(null, 204);
    }
}