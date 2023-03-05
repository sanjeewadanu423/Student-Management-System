<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacher=DB::table('users')
            ->join('teachers', 'users.id', '=', 'teachers.user_id')
            ->select('users.*', 'teachers.*')
            ->paginate(25);

            return view('teachers.index',compact('teacher'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teachers.create');
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


        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        $teacher = new Teacher;
        $teacher->teacher_address = $request->address;
        $teacher->teacher_phone = $request->phone;
        $teacher->teacher_nic = $request->nic;


        $user->teacher()->save($teacher);

        $user->assignRole('teacher');

        return redirect()->route('teachers')
                        ->with('success','teacher registration successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        $teacher=DB::table('users')
            ->join('teachers', 'users.id', '=', 'teachers.user_id')
            ->select('users.*', 'teachers.*')
            ->get();

        return view('teachers.show',compact('teacher'));


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        return view('teachers.edit',compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        request()->validate([

            'teacher_nic' => 'required',
            'teacher_phone' => 'required',
            'teacher_address' => 'required',

        ]);
        $teacher->update($request->all());

        return redirect()->route('teachers')
                        ->with('success','customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return redirect()->route('teachers')
                        ->with('success','teacher deleted successfully');
    }
}
