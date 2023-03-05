@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Mark</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('marks') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('marks.store') }}" method="POST">
    	@csrf


         <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12 row">
		        <div class="form-group">
		            <strong>Student Name:</strong>
		            <select name="student" id="student" class="form-control">
                        @foreach ($student as $student)

                        <option value="{{ $student->id }}">{{ $student->name}}</option>
                        @endforeach
                    </select>
		        </div>
		    </div>

            <div class="col-xs-12 col-sm-12 col-md-12 row">
		        <div class="form-group">
		            <strong>Subject Name:</strong>
		            <select name="subject" id="subject" class="form-control">
                        @foreach ($subject as $subject)

                        <option value="{{ $subject->id }}">{{ $subject->subject_name}}</option>
                        @endforeach
                    </select>
		        </div>
		    </div>

		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Mark:</strong>
		            <input type="text" name="mark" class="form-control" placeholder="75">
		        </div>
		    </div>
            <div>
                <br>
            </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>


@endsection
