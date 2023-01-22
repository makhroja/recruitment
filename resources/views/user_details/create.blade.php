@extends('layout.master')
@section('title', 'UserDetail Create')
@section('content')
    <div>
        <h4 class="mb-3 mb-md-0">Detail Pengguna</h4>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <a href="{{ URL::previous() }}" type="button" title="Back" class="btn btn-sm btn-dark btn-icon-text">
                        <i class="btn-icon-prepend" data-feather="arrow-left"></i>
                        Kembali
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

                    <form method="POST" action="{{ route('userDetails.store') }}" accept-charset="UTF-8"
                        id="create_user_detail_form" name="create_user_detail_form" class="form-horizontal"
                        enctype="multipart/form-data" accept="">
                        {{ csrf_field() }}
                        @include ('user_details.form', ['userDetail' => null])

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
        $(function() {
            'use strict';

            $('.myDropify').dropify();
        });
    </script>
@endpush
