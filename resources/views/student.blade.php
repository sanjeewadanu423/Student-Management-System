@extends('layouts.student')


   @section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Student Dashboard</h2>
            </div>
        </div>

        <div class="d-flex justify-content-end mb-4">
            <a class="btn btn-primary" href="{{ URL::to('/student/pdf') }}">Export to PDF</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>

            <th>Subject Name</th>
            <th>Marks</th>
            <th>GPA</th>

        </tr>
	    @foreach ($mark as $mark)
	    <tr>

	        <td>{{ $mark->subject_name }}</td>
	        <td>{{ $mark->mark }}</td>
	        <td>{{ $mark->gpa }}</td>

	    </tr>
	    @endforeach
    </table>




@endsection
