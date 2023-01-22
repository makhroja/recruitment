@extends('layout.master')
@section('title', 'Schedule Create')
@push('plugin-styles')
    <link href="{{ asset('assets/plugins/simplemde/simplemde.min.css') }}" rel="stylesheet" />
@endpush
@section('content')
    <div>
        <h4 class="mb-3 mb-md-0">Buat Jadwal</h4>
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

                    <form method="POST" action="{{ route('schedules.store') }}" accept-charset="UTF-8"
                        id="create_schedule_form" name="create_schedule_form" class="form-horizontal"[% upload_files %]>
                        {{ csrf_field() }}
                        @include ('schedules.form', ['schedule' => null])

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
    <script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script>
        $(function() {
            'use strict';

            $('table').addClass('table table-bordered table-striped table-hover table-sm wrap');
            //Tinymce editor
            if ($("#tinymceExample").length) {
                tinymce.init({
                    selector: '#tinymceExample',
                    height: 800,
                    theme: 'silver',
                    content_style: "body {font-size: 12pt;font-family: times new roman,times;}",
                    // content_style: "body {font-size: 12pt;font-family: times new roman,times;}",
                    plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap',
                    menubar: 'file edit view insert format tools table help',
                    toolbar1: 'undo redo | insert | fontselect fontsizeselect formatselect | styleselect | bold italic | alignleft aligncenter alignright alignjustify',
                    toolbar2: 'print preview media | forecolor backcolor emoticons | codesample  | bullist numlist outdent indent | link image',
                    image_advtab: true,
                    templates: [{
                            title: 'Test template 1',
                            content: 'Test 1'
                        },
                        {
                            title: 'Test template 2',
                            content: 'Test 2'
                        }
                    ],
                    content_css: []
                });
            }
        });
        $(function() {
            'use strict'

            if ($(".select2").length) {
                $(".select2").select2();
            }
        });
    </script>
@endpush
