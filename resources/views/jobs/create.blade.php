@extends('layout.master')
@push('plugin-styles')
    <style>
        .table-responsive {
            max-width: 100%;
            overflow-x: auto;
        }
    </style>
@endpush
@section('title', 'Job Create')
@section('content')
    <div>
        <h4 class="mb-3 mb-md-0">Job Create</h4>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <a href="{{ URL::previous() }}" type="button" title="Back" class="btn btn-sm btn-dark btn-icon-text">
                        <i class="btn-icon-prepend" data-feather="arrow-left"></i>
                        Back
                    </a>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form method="POST" action="{{ route('jobs.store') }}" accept-charset="UTF-8" id="create_job_form"
                        name="create_job_form" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @include ('jobs.form', ['job' => null])

                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-10">
                                <input class="btn btn-sm btn-outline-primary" type="submit" value="Add">
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('plugin-scripts')
@endpush

@push('custom-scripts')
    <script>
        $(function() {
            'use strict'

            if ($(".select2").length) {
                $(".select2").select2();
            }
        });
    </script>
@endpush
