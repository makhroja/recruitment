@extends('layout.master')
@section('title', 'Schedule Lists')
@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('assets/plugins/datatables/DataTables-1.10.16/css/styling-dataTables.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/datatables/datatables.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}" rel="stylesheet" />
@endpush


@section('content')
    <div>
        <h4 class="mb-3 mb-md-0">Schedule List</h4>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <h4>Pilih Lowongan</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group {{ $errors->has('job_id') ? 'has-error' : '' }}">
                                <select class="form-control select2 @error('job_id') is-invalid @enderror" id="job_id"
                                    name="job_id">
                                    <option value="" style="display: none;" selected>Pilih Lowongan</option>
                                    @foreach ($jobs as $key => $job)
                                        <option value="{{ $key }}">
                                            {{ $job }}
                                        </option>
                                    @endforeach
                                </select>
                                {!! $errors->first('job_id', '<small class="invalid-feedback" role="alert">:message</small>') !!}
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary jobSelect">Pilih</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script type="text/javascript">
        $(function() {

            $('body').on('click', '.jobSelect', function() {
                var uuid = document.getElementById("job_id").value;
                if (uuid === '') {
                    alert('Silahkan pilih lowongan');
                } else {
                    var url = "{{ url('/schedules') }}" + '/' + uuid;
                    window.open(url, "_self");
                }
            });

            //Select2
            $(function() {
                'use strict'

                if ($(".select2").length) {
                    $(".select2").select2();
                }
            });
            /*
             *End Document Ready
             */
        });
    </script>
@endpush
