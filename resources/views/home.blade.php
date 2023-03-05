@extends('layouts.master')


    @section('content')

    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">Dashboard</h3>
    </div>
    <div class="row">
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-primary py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Number of Students</span></div>
                            <div class="text-dark fw-bold h5 mb-0"><span>{{ $count }}</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>

    @endsection
