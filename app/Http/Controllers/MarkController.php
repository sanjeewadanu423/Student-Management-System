<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mark=DB::table('users')
            ->join('students', 'users.id', '=', 'students.user_id')
            ->join('marks', 'students.id', '=', 'marks.student_id')
            ->join('subjects', 'subjects.id', '=', 'marks.subject_id')
            ->select('users.*', 'subjects.*', 'marks.*' )
            ->paginate(1000);

        return view('marks.index',compact('mark'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $student=DB::table('users')
            ->join('students', 'users.id', '=', 'students.user_id')
            ->select('users.*', 'students.*')
            ->get();
// dd($student);
        $subject=DB::table('subjects')
            ->select('subjects.*' )
            ->get();

            return view('marks.create', compact('student', 'subject'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'student'=> 'required',
            'subject'=> 'required',
            'mark'=> 'required',
        ]);

// dd($request);
        $mark = new Mark;

        $mark->student_id = $request->student;
        $mark->subject_id = $request->subject;
        $mark->mark = $request->mark;

        if ($request->mark >= '70') {
            $mark -> gpa = 4;
        }
        elseif ($request->mark >= '65') {
            $mark -> gpa = 3.7;
        }
        elseif ($request->mark >= '60') {
            $mark -> gpa = 3.3;
        }
        elseif ($request->mark >= '55') {
            $mark -> gpa = 3;
        }
        elseif ($request->mark >= '50') {
            $mark -> gpa = 2.7;
        }
        elseif ($request->mark >= '45') {
            $mark -> gpa = 2.3;
        }
        elseif ($request->mark >= '40') {
            $mark -> gpa = 2;
        }
        else {
            $mark -> gpa = 0;
        }
// dd($mark);
        $mark->save();

        return redirect()->route('marks')
                        ->with('success','mark added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mark $mark)
    {
        $mark=DB::table('users')
            ->join('students', 'users.id', '=', 'students.user_id')
            ->join('marks', 'students.id', '=', 'marks.student_id')
            ->join('subjects', 'subjects.id', '=', 'marks.subject_id')
            ->where('marks.id', '=', $mark->id)
            ->select('users.*', 'subjects.*', 'marks.*' )
            ->get();

        return view('marks.show',compact('mark'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mark $mark)
    {
        return view('marks.edit',compact('mark'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mark $mark)
    {
        request()->validate([

            'mark' => 'required',

        ]);
        $mark->update($request->all());

        return redirect()->route('marks')
                        ->with('success','mark updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mark $mark)
    {
        $mark->delete();

        return redirect()->route('marks')
                        ->with('success','mark deleted successfully');
    }
}
