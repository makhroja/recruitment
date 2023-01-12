@extends('layout.master2')

@push('plugin-styles')
@endpush

@section('content')
    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <table id="dataTable" style="width:100%" class="table table-bordered table-hover display nowrap">
                        <thead>
                            <tr class="table-info">
                                <th style="width: 2%">No</th>
                                <th>Nama Lengkap</th>
                                <th>Pendidikan</th>
                                <th>Instansi</th>
                                <th>Posisi Di Lamar</th>
                                <th style="width: 5%">Surat Lamaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    1.
                                </td>
                                <td>
                                    {{ $phase->application->user->userDetail->nama_lengkap }}
                                </td>
                                <td>
                                    {{ $phase->application->user->userDetail->pendidikan }}
                                    {{ $phase->application->user->userDetail->jurusan }}
                                </td>
                                <td>
                                    {{ $phase->application->user->userDetail->instansi }}
                                </td>
                                <td>
                                    {{ $phase->application->position->nama }}
                                </td>
                                <td>
                                    <!-- Large modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target=".bd-example-modal-lg">Lamaran</button>

                                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <iframe
                                                    src="{{ url('assets/uploads/attachment') }}/{{ $phase->application->pdf }}"
                                                    frameborder="0" height="400px"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
                    <div class="table-responsive">
                        <form action="" method="post" id="storeNilai">
                            @csrf
                            <table id="dataTable" style="width:100%"
                                class="table table-bordered table-hover display nowrap">
                                <thead>
                                    <tr class="table-info">
                                        <th style="width: 2%">No</th>
                                        <th>Nama Indikator</th>
                                        <th style="width: 20%" class="text-center">Nilai</th>
                                    </tr>
                                    <tr class="text-center">
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <input type="hidden" name="uuid" value="{{ $phase->uuid }}">
                                    <input type="hidden" name="phase" value="{{ $method }}">
                                    <input type="hidden" name="status" value="1">
                                    <tr>
                                        <td>
                                            1.
                                        </td>
                                        <td>
                                            Indikator 1
                                        </td>
                                        <td>
                                            <select class="form-control text-dark @error('indikator1') is-invalid @enderror"
                                                id="indikator1" name="indikator1">
                                                <option value="" style="display: none;"
                                                    {{ old('indikator1', optional($phase)->indikator1 ?: '') == '' ? 'selected' : '' }}
                                                    disabled selected>- Nilai -</option>
                                                <option value="20"
                                                    {{ old('indikator1', optional($phase)->indikator1) == '20' ? 'selected' : '' }}>
                                                    20</option>
                                                <option value="15"
                                                    {{ old('indikator1', optional($phase)->indikator1) == '15' ? 'selected' : '' }}>
                                                    15 </option>
                                                <option value="10"
                                                    {{ old('indikator1', optional($phase)->indikator1) == '10' ? 'selected' : '' }}>
                                                    10 </option>
                                                <option value="5"
                                                    {{ old('indikator1', optional($phase)->indikator1) == '5' ? 'selected' : '' }}>
                                                    5 </option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            2.
                                        </td>
                                        <td>
                                            Indikator 2
                                        </td>
                                        <td>
                                            <select class="form-control text-dark @error('indikator2') is-invalid @enderror"
                                                id="indikator2" name="indikator2">
                                                <option value="" style="display: none;"
                                                    {{ old('indikator2', optional($phase)->indikator2 ?: '') == '' ? 'selected' : '' }}
                                                    disabled selected>- Nilai -</option>
                                                <option value="20"
                                                    {{ old('indikator2', optional($phase)->indikator2) == '20' ? 'selected' : '' }}>
                                                    20</option>
                                                <option value="15"
                                                    {{ old('indikator2', optional($phase)->indikator2) == '15' ? 'selected' : '' }}>
                                                    15 </option>
                                                <option value="10"
                                                    {{ old('indikator2', optional($phase)->indikator2) == '10' ? 'selected' : '' }}>
                                                    10 </option>
                                                <option value="5"
                                                    {{ old('indikator2', optional($phase)->indikator2) == '5' ? 'selected' : '' }}>
                                                    5 </option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            3.
                                        </td>
                                        <td>
                                            Nilai Akhir
                                        </td>
                                        <td>
                                            <input type="text" value="{{ $phase->nilai_akhir }}" name="nilai_akhir"
                                                class="form-control" aria-required="true">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <input id="btnSimpan" type="submit" value="Simpan" class="btn btn-primary">
                        </form>
                    </div>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
    </div> <!-- row -->
@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
    <script>
        $(function() {

            //ajax setup
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta [name="csrf-token"]').attr('content')
                }
            });

            $('#btnSimpan').click(function(e) {
                e.preventDefault();
                $(this).html('Sending..');
                var formData = $(this).serialize();;
                var uuid = $(this).data('id');
                var token = $("meta[name='csrf-token']").attr("content");

                $.ajax({
                    url: "{{ route('store.nilai') }}",
                    type: 'post',
                    dataType: "JSON",
                    data: $('#storeNilai').serialize(),
                    success: function(data) {
                        swal({
                            icon: 'success',
                            title: data.success
                        });
                        console.log(data);
                    },
                    error: function(data) {

                        swal({
                            icon: 'error',
                            title: data.responseJSON.message,
                            content: printErrorMsg(data.responseJSON.errors),
                        });
                        console.log('Error:', data);
                    },
                });

                function printErrorMsg(msg) {
                    $(".print-error-msg").find("ul").html('');
                    $(".print-error-msg").css('display', 'block');
                    $.each(msg, function(key, value) {
                        $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                    });
                }
            })
            /*
             *End Document Ready
             */
        });
    </script>
@endpush
