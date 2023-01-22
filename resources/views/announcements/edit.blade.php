@extends('layout.master')
@section('title', 'Announcement Edit')
@push('plugin-styles')
@endpush

@section('content')
    <div>
        <h4 class="mb-3 mb-md-0">Ubah Pengumuman</h4>
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
                    <form method="POST" action="{{ route('announcements.update', $announcement->uuid) }}"
                        id="edit_announcement_form" name="edit_announcement_form" accept-charset="UTF-8"
                        class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PUT">
                        @include ('announcements.form', [
                            'announcement' => $announcement,
                        ])

                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-10">
                                <input class="btn btn-sm btn-outline-primary" type="submit" value="Update">
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
@endpush
