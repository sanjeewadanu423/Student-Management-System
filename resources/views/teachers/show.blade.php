@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Teacher Details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('teachers') }}"> Back</a>
            </div>
        </div>
    </div>

@foreach ($teacher as $teacher )

    <div class="row container">
        <table style="width:50%">
            <tr>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <th><strong>Name:</strong></th>
                        <td>{{ $teacher->name }}</td>
                    </div>
                </div>
            </tr>
            <tr>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <th><strong>Email:</strong></th>
                        <td>{{ $teacher->email }}</td>
                    </div>
                </div>
            </tr>
            <tr>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <th><strong>Phone Number:</strong></th>
                        <td>{{ $teacher->teacher_phone }}</td>
                    </div>
                </div>
            </tr>
            <tr>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <th><strong>NIC:</strong></th>
                        <td>{{ $teacher->teacher_nic }}</td>
                    </div>
                </div>
            </tr>
            <tr>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <th><strong>Address:</strong></th>
                        <td>{{ $teacher->teacher_address }}</td>
                    </div>
                </div>
            </tr>

    </table>
    </div>


@endforeach
@endsection
