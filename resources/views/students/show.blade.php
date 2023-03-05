@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Student Details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('students') }}"> Back</a>
            </div>
        </div>
    </div>

@foreach ($students as $student )

    <div class="row container">
        <table style="width:50%">
            <tr>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <th><strong>Name:</strong></th>
                        <td>{{ $student->name }}</td>
                    </div>
                </div>
            </tr>
            <tr>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <th><strong>Email:</strong></th>
                        <td>{{ $student->email }}</td>
                    </div>
                </div>
            </tr>
            <tr>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <th><strong>Contact Number:</strong></th>
                        <td>{{ $student->contact_no }}</td>
                    </div>
                </div>
            </tr>
            <tr>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <th><strong>Address:</strong></th>
                        <td>{{ $student->student_address }}</td>
                    </div>
                </div>
            </tr>

            <tr>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <th><strong>Avarage:</strong></th>
                        <td>{{ $avg}}</td>
                    </div>
                </div>
            </tr>

            <tr>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <th><strong>Avarage:</strong></th>
                        <td>{{ $gpa}}</td>
                    </div>
                </div>
            </tr>





    </table>
    </div>


@endforeach
@endsection
