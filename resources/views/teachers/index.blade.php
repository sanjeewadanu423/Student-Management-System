@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Teachers</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('teachers.create') }}"> Create New Teacher</a>

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
            <th>Phone</th>
            <th>NIC</th>
            <th>Action</th>

        </tr>
	    @foreach ($teacher as $teacher)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $teacher->name }}</td>
	        <td>{{ $teacher->teacher_phone }}</td>
	        <td>{{ $teacher->teacher_nic }}</td>
	        <td>

                <form action="{{ route('teachers.destroy',$teacher->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('teachers.show', $teacher->id) }}">Show</a>

                <a class="btn btn-primary" href="{{ route('teachers.edit', $teacher->id) }}">Edit</a>


                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>




@endsection
