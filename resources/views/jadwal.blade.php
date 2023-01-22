@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/simplemde/simplemde.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">TinyMCE</h4>
                    <p class="card-description">Read the <a href="https://www.tiny.cloud/docs/" target="_blank"> Official
                            TinyMCE Documentation </a>for a full list of instructions and other options.</p>
                    <textarea class="form-control" name="tinymce" id="tinymceExample" rows="10">{!! $html !!}</textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">SimpleMDE</h4>
                    <p class="card-description">Read the <a href="https://simplemde.com/" target="_blank"> Official
                            SimpleMDE Documentation </a>for a full list of instructions and other options.</p>
                    <textarea class="form-control" name="tinymce" id="simpleMdeExample" rows="10"></textarea>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/simplemde/simplemde.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/ace-builds/ace.js') }}"></script>
    <script src="{{ asset('assets/plugins/ace-builds/theme-chaos.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/tinymce.js') }}"></script>
    <script src="{{ asset('assets/js/simplemde.js') }}"></script>
    <script src="{{ asset('assets/js/ace.js') }}"></script>
@endpush
