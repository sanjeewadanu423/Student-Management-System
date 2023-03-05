<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PDF;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student=DB::table('users')
            ->join('students', 'users.id', '=', 'students.user_id')
            ->select('users.*', 'students.*')
            ->paginate(100);

        return view('students.index',compact('student'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'name'=> 'required',
            'email'=> 'required',
            'phone'=> 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

// dd($request);
        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        $student = new Student;
        $student->student_address = $request->address;
        $student->contact_no = $request->phone;


        $user->student()->save($student);

        $user->assignRole('student');

        return redirect()->route('students')
                        ->with('success','student registration successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {

        $students = DB::table('users')
            ->join('students', 'users.id', '=', 'students.user_id')
            ->where('students.id', '=', $student->id)
            ->select('users.*', 'students.*', 'students.id as student_id')
            ->get();

        $mark = DB::table('students')
            ->join('marks', 'students.id', '=', 'marks.student_id')
            ->where('students.id', '=', $student->id)
            ->select('marks.*')
            ->sum('marks.mark');

        $mgpa = DB::table('students')
            ->join('marks', 'students.id', '=', 'marks.student_id')
            ->where('students.id', '=', $student->id)
            ->select('marks.*')
            ->sum('marks.gpa');

        $marks = DB::table('students')
            ->join('marks', 'students.id', '=', 'marks.student_id')
            ->where('students.id', '=', $student->id)
            ->select('marks.*')
            ->get();

        $count = $marks->count();

        if ($mark == null) {
            $avg = 0;
        }
        else {
            $avg = $mark / $count ;
        }

        if ($mgpa == null) {
            $gpa = 0;
        }
        else {
            $gpa = $mgpa / $count ;
        }

// dd($mark);

        return view('students.show',compact('students', 'avg', 'gpa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('students.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        request()->validate([

            'contact_no' => 'required',
            'student_address' => 'required',

        ]);
        $student->update($request->all());

        return redirect()->route('students')
                        ->with('success','student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students')
                        ->with('success','student deleted successfully');
    }

    public function student1()
    {
// dd('1');
        $user = Auth::id();

        $mark = DB::table('subjects')
            ->join('marks', 'subjects.id', '=', 'marks.subject_id')
            ->join('students', 'students.id', '=', 'marks.student_id')
            ->where('students.user_id', '=', $user)
            ->select('subjects.*', 'marks.*')
            ->get();

            // $student=Auth::user()->student()->mark();

            // dd($mark);
        // dd($user);

        return view('student', compact('mark'));
    }

    public function createPDF() {

        $user = Auth::id();
        $users = Auth::user();

        $data = DB::table('subjects')
            ->join('marks', 'subjects.id', '=', 'marks.subject_id')
            ->join('students', 'students.id', '=', 'marks.student_id')
            ->join('users', 'users.id', '=', 'students.user_id')
            ->where('users.id', '=', $user)
            ->select('subjects.*', 'marks.*', 'users.*')
            ->get();

        $mark = $data->toArray();

        $mark1 = DB::table('students')
            ->join('marks', 'students.id', '=', 'marks.student_id')
            ->join('users', 'users.id', '=', 'students.user_id')
            ->where('users.id', '=', $user)
            ->select('marks.*')
            ->sum('marks.mark');
// dd($mark1);
        $mgpa = DB::table('students')
            ->join('marks', 'students.id', '=', 'marks.student_id')
            ->join('users', 'users.id', '=', 'students.user_id')
            ->where('users.id', '=', $user)
            ->select('marks.*')
            ->sum('marks.gpa');

        $marks = DB::table('students')
            ->join('marks', 'students.id', '=', 'marks.student_id')
            ->join('users', 'users.id', '=', 'students.user_id')
            ->where('users.id', '=', $user)
            ->select('marks.*')
            ->get();

        $count = $marks->count();

        if ($mark1 == null) {
            $avg = 0;
        }
        else {
            $avg = $mark1 / $count ;
        }

        if ($mgpa == null) {
            $gpa = 0;
        }
        else {
            $gpa = $mgpa / $count ;
        }

        view()->share('student',$mark);
        view()->share('student1',$users);
        view()->share('avg',$avg);
        view()->share('gpa',$gpa);
        $pdf = PDF::loadView('pdf', $mark);

        return $pdf->download('pdf_file.pdf');
      }


    public function index1()
    {
        $student = DB::table('students')
            ->select('students.*')
            ->get();

        $count = $student->count();
        // dd($count);
        return view('home', compact('count'));
    }
}
