@extends('layout.master')
@section('title', 'Job Lists')
@push('plugin-styles')
    <style>
        option {
            margin: 5px;
        }

        select[multiple]:focus option:checked {
            background: #727CF5 linear-gradient(0deg, #727CF5 0%, #727CF5 100%);
        }
    </style>
@endpush


@section('content')
    <div>
        <h4 class="mb-3 mb-md-0">List Lowongan</h4>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('post.inputNilai') }}" method="post">
                        @csrf
                        <div class="form-group {{ $errors->has('job_id') ? 'has-error' : '' }}">
                            <label for="job_id" class="col-md-2 control-label">Job</label>
                            <div class="col-md-12">
                                <select class="form-control select2 @error('job_id') is-invalid @enderror" id="job_id"
                                    name="job_id">
                                    <option value="" style="display: none;"
                                        {{ old('job_id', optional($jobs)->uuid ?: '') == '' ? 'selected' : '' }} disabled
                                        selected>Pilih
                                        job</option>
                                    @foreach ($jobs as $key => $job)
                                        <option value="{{ $key }}"
                                            {{ old('job_id', optional($jobs)->uuid) == $key ? 'selected' : '' }}>
                                            {{ $job }}
                                        </option>
                                    @endforeach
                                </select>

                                {!! $errors->first('job_id', '<small class="invalid-feedback" role="alert">:message</small>') !!}
                            </div>
                        </div>
                        <br>
                        <div class="form-group {{ $errors->has('phase') ? 'has-error' : '' }}">
                            <label for="phase" class="col-md-2 control-label">Pilih Jenis Tes</label>
                            <div class="col-md-6">
                                <select size="12" style="height: 100%;" multiple
                                    class="text-dark form-control @error('phase') is-invalid @enderror" id="phase"
                                    name="phase">
                                    <option disabled>
                                        1. Seleksi Administrasi
                                    </option>
                                    <option value="phase2">
                                        2. Tes Tertulis
                                    </option>
                                    <option value="phase3">
                                        3. Wawancara Unit
                                    </option>
                                    <option value="phase4">
                                        4. Tes Praktek
                                    </option>
                                    <option value="phase5">
                                        5. Wawancara HRD
                                    </option>
                                    <option value="phase6">
                                        6. Tes Psikotes
                                    </option>
                                    <option value="phase7">
                                        7. Wawancara Performance
                                    </option>
                                    <option value="phase8">
                                        8. Tes Kesehatan
                                    </option>
                                    <option value="phase9">
                                        9. Tahap Akhir
                                    </option>
                                </select>

                                {!! $errors->first('phase', '<small class="invalid-feedback" role="alert">:message</small>') !!}
                            </div>
                        </div>
                        <input type="submit" class="btn btn-sm btn-primary" value="Pilih">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
    <script type="text/javascript">
        $(function() {
            'use strict'

            if ($(".select2").length) {
                $(".select2").select2();
            }
        });
    </script>
@endpush
