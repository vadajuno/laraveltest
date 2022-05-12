<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Major;
use Dotenv\Util\Str;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Student $student)
    {
        $student = Student::get();
        $majors = Major::get();

        return view('student.index', compact('student', 'majors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $majors = Major::get();

        return view('student.create', compact('majors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'major_id' => 'required',
            'ipk' => 'required',
        ]);

        $student = Student::create([
            'nama' => $request->input('nama'),
            'major_id' => $request->input('major_id'),
            'ipk' => $request->input('ipk'),
        ]);

        // dd($request->all());
        return redirect('/student')->with('success', 'New Student data has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $majors = Major::get();

        return view('student.edit', compact('student', 'majors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'nama' => 'required',
            'major_id' => 'required',
            'ipk' => 'required',
        ]);

        $student = Student::whereId($student->id)->update([
            'nama' => $request->input('nama'),
            'major_id' => $request->input('major_id'),
            'ipk' => $request->input('ipk'),
        ]);

        return redirect('/student')->with('success', 'Student data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student = student::find($student->id);
        $student->delete();
        return redirect('/student');
    }
}
