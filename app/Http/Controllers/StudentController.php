<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\SchoolClass;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentController extends Controller
{
    public function index(Request $request): View
    {
        $students = Student::with(['major', 'schoolClass'])
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('students.index', compact('students'));
    }

    public function create(): View
    {
        $majors = Major::where('status', true)
            ->orderBy('name')
            ->get();

        $classes = SchoolClass::where('status', true)
            ->with('major')
            ->orderBy('name')
            ->get();

        return view('students.create', compact('majors', 'classes'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nis' => ['required', 'string', 'max:30', 'unique:students,nis'],
            'nisn' => ['nullable', 'string', 'max:30', 'unique:students,nisn'],
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'in:L,P'],
            'birth_date' => ['nullable', 'date'],
            'address' => ['nullable', 'string'],
            'phone' => ['nullable', 'string', 'max:30'],
            'class_id' => ['nullable', 'exists:school_classes,id'],
            'major_id' => ['required', 'exists:majors,id'],
            'status' => ['required', 'boolean'],
        ]);

        Student::create($validated);

        return redirect()
            ->route('students.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function show(Student $student): View
    {
        $student->load(['major', 'schoolClass']);

        return view('students.show', compact('student'));
    }

    public function edit(Student $student): View
    {
        $majors = Major::where('status', true)
            ->orderBy('name')
            ->get();

        $classes = SchoolClass::where('status', true)
            ->with('major')
            ->orderBy('name')
            ->get();

        return view('students.edit', compact(
            'student',
            'majors',
            'classes'
        ));
    }

    public function update(
        Request $request,
        Student $student
    ): RedirectResponse {
        $validated = $request->validate([
            'nis' => [
                'required',
                'string',
                'max:30',
                'unique:students,nis,' . $student->id,
            ],
            'nisn' => [
                'nullable',
                'string',
                'max:30',
                'unique:students,nisn,' . $student->id,
            ],
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'in:L,P'],
            'birth_date' => ['nullable', 'date'],
            'address' => ['nullable', 'string'],
            'phone' => ['nullable', 'string', 'max:30'],
            'class_id' => ['nullable', 'exists:school_classes,id'],
            'major_id' => ['required', 'exists:majors,id'],
            'status' => ['required', 'boolean'],
        ]);

        $student->update($validated);

        return redirect()
            ->route('students.index')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(Student $student): RedirectResponse
    {
        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}