@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Mark</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('marks.create') }}"> Create New Mark</a>

            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Subject</th>
            <th>Mark</th>
            <th>gpa</th>
            <th>Action</th>

        </tr>
	    @foreach ($mark as $mark)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $mark->name }}</td>
	        <td>{{ $mark->subject_name }}</td>
	        <td>{{ $mark->mark }}</td>
	        <td>{{ $mark->gpa }}</td>
	        <td>

                <form action="{{ route('marks.destroy',$mark->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('marks.show', $mark->id) }}">Show</a>

                <a class="btn btn-primary" href="{{ route('marks.edit', $mark->id) }}">Edit</a>


                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>




@endsection
