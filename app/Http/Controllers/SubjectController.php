<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $subject = Subject::orderBy('id','DESC')->paginate(5);
        return view('subjects.index',compact('subject'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subjects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'subject_name'=> 'required',

        ]);

// dd($request);
        $subject = new Subject;

        $subject->subject_name = $request->subject_name;

        $subject->save();

        return redirect()->route('subjects')
                        ->with('success','subject registration successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        
        return view('subjects.show',compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
