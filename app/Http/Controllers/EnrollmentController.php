<?php

namespace App\Http\Controllers;

use App\Models\Enrollment; // Import the Enrollment model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; // Import the Str class for generating random strings

class EnrollmentController extends Controller
{
    public function index()
    {
        return response()->json(Enrollment::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'student_type' => 'nullable|string',
            'full_name' => 'nullable|string',
            'address' => 'nullable|string',
            'email' => 'nullable|string',
            'number' => 'nullable|string',
            'school_level' => 'nullable|string',
            'strand' => 'nullable|string',
            'course' => 'nullable|string',
            'student_picture_path' => 'nullable|string',
            'student_picture_name' => 'nullable|string',
            'grades_copy_path' => 'nullable|string',
            'grades_copy_name' => 'nullable|string',
        ]);

        $data['uuid'] = Str::uuid();
        $enrollment = Enrollment::create($data);

        return response()->json($enrollment, 201);
    }

    public function show($uuid)
    {
        return response()->json(Enrollment::where('uuid', $uuid)->firstOrFail());
    }

    public function update(Request $request, $uuid)
    {
        $enrollment = Enrollment::where('uuid', $uuid)->firstOrFail();

        $data = $request->validate([
            'student_type' => 'nullable|string',
            'full_name' => 'nullable|string',
            'address' => 'nullable|string',
            'email' => 'nullable|string',
            'number' => 'nullable|string',
            'school_level' => 'nullable|string',
            'strand' => 'nullable|string',
            'course' => 'nullable|string',
            'student_picture_path' => 'nullable|string',
            'student_picture_name' => 'nullable|string',
            'grades_copy_path' => 'nullable|string',
            'grades_copy_name' => 'nullable|string',
        ]);

        $enrollment->update($data);
        return response()->json($enrollment);
    }

    public function destroy($uuid)
    {
        $enrollment = Enrollment::where('uuid', $uuid)->firstOrFail();
        $enrollment->delete();
        return response()->json(null, 204);
    }
    // ... other methods ...

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'studentType' => 'required|in:new,transferee,existing',
    //         'fullName' => 'required|string|max:255',
    //         'address' => 'required|string',
    //         'email' => 'required|email|max:255',
    //         'number' => 'required|string|max:20', // Validate the contact number
    //         'schoolLevel' => 'required|in:SHS,COLLEGE',
    //         'strand' => 'nullable|string|max:255',
    //         'course' => 'nullable|string|max:255',
    //         'studentPicture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'gradesCopy' => 'required|mimes:pdf,doc,docx,jpeg,png,jpg,gif,svg|max:5120',
    //     ]);

    //     $studentPicture = $request->file('studentPicture');
    //     $gradesCopy = $request->file('gradesCopy');

    //     // Generate unique filenames
    //     $studentPictureName = Str::random(40) . '.' . $studentPicture->getClientOriginalExtension();
    //     $gradesCopyName = Str::random(40) . '.' . $gradesCopy->getClientOriginalExtension();

    //     // Store the files in the 'public' disk (storage/app/public)
    //     $studentPicturePath = $studentPicture->storeAs('public/student_pictures', $studentPictureName); // Use storeAs
    //     $gradesCopyPath = $gradesCopy->storeAs('public/grades_copies', $gradesCopyName); // Use storeAs

    //     // Get the original file names:
    //     $studentPictureOriginalName = $studentPicture->getClientOriginalName();
    //     $gradesCopyOriginalName = $gradesCopy->getClientOriginalName();

    //     // Save the information to your database (example):
    //     $enrollment = new Enrollment(); // Assuming you have an Enrollment model
    //     $enrollment->student_type = $request->studentType; // Save the student type
    //     $enrollment->full_name = $request->fullName;
    //     $enrollment->address = $request->address;
    //     $enrollment->email = $request->email;
    //     $enrollment->school_level = $request->schoolLevel;
    //     $enrollment->strand = $request->strand;
    //     $enrollment->course = $request->course;
    //     $enrollment->student_picture_path = $studentPicturePath; // Save the path to the file
    //     $enrollment->student_picture_name = $studentPictureOriginalName; // Save the original filename
    //     $enrollment->grades_copy_path = $gradesCopyPath; // Save the path
    //     $enrollment->grades_copy_name = $gradesCopyOriginalName; // Save the original filename
    //     $enrollment->number = $request->number; // Save the contact number
    //     $enrollment->save();

    //     return redirect()->back()->with('success', 'Enrollment submitted successfully!');
    // }

    // // ... other methods ...
}