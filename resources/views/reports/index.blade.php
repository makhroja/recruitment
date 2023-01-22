@extends('layout.master')

@section('title', 'Export Page')

@push('plugin-styles')
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <h5>Export Peserta</h5>
                </div>
                <div class="card-body">
                    {{-- @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
                    <form action="{{ route('export.peserta') }}" method="post">
                        @csrf
                        <div class="form-group {{ $errors->has('job_id') ? 'has-error' : '' }}">
                            <label for="job_id" class="col-md-2 control-label">Lowongan</label>
                            <div class="col-md-12">
                                <select class="form-control text-dark select2 @error('job_id') is-invalid @enderror"
                                    id="job_id" name="job_id">
                                    <option value="" style="display: none;"
                                        {{ old('job_id', optional($jobs)->job_id ?: '') == '' ? 'selected' : '' }} disabled
                                        selected>Pilih Lowongan</option>
                                    @foreach ($jobs as $key => $job)
                                        <option value="{{ $key }}"
                                            {{ old('job_id', optional($jobs)->job_id) == $key ? 'selected' : '' }}>
                                            {{ $job }}
                                        </option>
                                    @endforeach
                                </select>
                                {!! $errors->first('job_id', '<small class="invalid-feedback" role="alert">:message</small>') !!}
                            </div>
                        </div>
                        <input type="submit" class="btn btn-sm btn-primary" value="Download" name="peserta">
                    </form>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <h5>Export Peserta Lolos Tahap Akhir</h5>
                </div>
                <div class="card-body">
                    {{-- @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
                    <form action="{{ route('export.peserta') }}" method="post">
                        @csrf
                        <input type="hidden" name="akhir" value="1">
                        <div class="form-group {{ $errors->has('job_id') ? 'has-error' : '' }}">
                            <label for="job_id" class="col-md-2 control-label">Lowongan</label>
                            <div class="col-md-12">
                                <select class="form-control text-dark select2 @error('job_id') is-invalid @enderror"
                                    id="job_id" name="job_id">
                                    <option value="" style="display: none;"
                                        {{ old('job_id', optional($jobs)->job_id ?: '') == '' ? 'selected' : '' }} disabled
                                        selected>Pilih Lowongan</option>
                                    @foreach ($jobs as $key => $job)
                                        <option value="{{ $key }}"
                                            {{ old('job_id', optional($jobs)->job_id) == $key ? 'selected' : '' }}>
                                            {{ $job }}
                                        </option>
                                    @endforeach
                                </select>
                                {!! $errors->first('job_id', '<small class="invalid-feedback" role="alert">:message</small>') !!}
                            </div>
                        </div>
                        <input type="submit" class="btn btn-sm btn-primary" value="Download" name="peserta">
                    </form>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <h5>Export Unit</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('export.unit') }}" method="post">
                        @csrf
                        <input type="hidden" name="akhir" value="1">
                        <div class="form-group {{ $errors->has('job_id') ? 'has-error' : '' }}">
                            <label for="job_id" class="col-md-2 control-label">Lowongan</label>
                            <div class="col-md-12">
                                <select class="form-control text-dark select2 @error('job_id') is-invalid @enderror"
                                    id="job_id" name="job_id">
                                    <option value="" style="display: none;"
                                        {{ old('job_id', optional($jobs)->job_id ?: '') == '' ? 'selected' : '' }} disabled
                                        selected>Pilih Unit</option>
                                    <option value="0">Semua Unit</option>
                                    @foreach ($jobs as $key => $job)
                                        <option value="{{ $key }}"
                                            {{ old('job_id', optional($jobs)->job_id) == $key ? 'selected' : '' }}>
                                            {{ $job }}
                                        </option>
                                    @endforeach
                                </select>
                                {!! $errors->first('job_id', '<small class="invalid-feedback" role="alert">:message</small>') !!}
                            </div>
                        </div>
                        <input type="submit" class="btn btn-sm btn-primary" value="Download" name="peserta">
                    </form>
                </div>
                <div class="card-footer">
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
