@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Mark Details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('marks') }}"> Back</a>
            </div>
        </div>
    </div>

@foreach ($mark as $mark )

    <div class="row container">
        <table style="width:50%">
            <tr>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <th><strong>Student Name:</strong></th>
                        <td>{{ $mark->name }}</td>
                    </div>
                </div>
            </tr>
            <tr>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <th><strong>Subject:</strong></th>
                        <td>{{ $mark->subject_name }}</td>
                    </div>
                </div>
            </tr>
            <tr>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <th><strong>Mark:</strong></th>
                        <td>{{ $mark->mark }}</td>
                    </div>
                </div>
            </tr>
            <tr>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <th><strong>GPA:</strong></th>
                        <td>{{ $mark->gpa }}</td>
                    </div>
                </div>
            </tr>


    </table>
    </div>


@endforeach
@endsection
