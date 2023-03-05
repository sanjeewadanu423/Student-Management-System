@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Student Details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('subjects') }}"> Back</a>
            </div>
        </div>
    </div>



    <div class="row container">
        <table style="width:50%">
            <tr>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <th><strong>Subject Name:</strong></th>
                        <td>{{ $subject->subject_name }}</td>
                    </div>
                </div>
            </tr>
    </table>
    </div>


@endsection
