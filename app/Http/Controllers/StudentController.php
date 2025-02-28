<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    public function index()
    {
        return response()->json(Student::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_uuid' => 'required|exists:users,uuid',
            'first_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'last_name' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|in:Male,Female,Other',
            'contact_no' => 'nullable|string',
            'address' => 'nullable|string',
            'lrn' => 'nullable|string|unique:students',
            'grade_level' => 'nullable|string',
            'strand' => 'nullable|string',
            'parent_guardian' => 'nullable|string',
        ]);

        $data['uuid'] = Str::uuid();
        $student = Student::create($data);

        return response()->json($student, 201);
    }

    public function show($uuid)
    {
        return response()->json(Student::where('uuid', $uuid)->firstOrFail());
    }

    public function update(Request $request, $uuid)
    {
        $student = Student::where('uuid', $uuid)->firstOrFail();

        $data = $request->validate([
            'first_name' => 'sometimes|string',
            'middle_name' => 'nullable|string',
            'last_name' => 'sometimes|string',
            'date_of_birth' => 'sometimes|date',
            'gender' => 'sometimes|in:Male,Female,Other',
            'contact_no' => 'sometimes|string',
            'address' => 'sometimes|string',
            'lrn' => 'sometimes|string|unique:students,lrn,' . $student->id,
            'grade_level' => 'sometimes|string',
            'strand' => 'sometimes|string',
            'parent_guardian' => 'sometimes|string',
        ]);

        $student->update($data);
        return response()->json($student);
    }

    public function destroy($uuid)
    {
        $student = Student::where('uuid', $uuid)->firstOrFail();
        $student->delete();
        return response()->json(null, 204);
    }
}