@extends('layout.master2')
@push('css')
@endpush
@section('content')
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">INFORMASI</h4>
        <p>Mohon maaf lowongan {{ Str::ucFirst($jobs->judul) }} belum dibuka atau sudah ditutup.</p>
        <p class="mb-0">Silahkan akses laman sesuai tanggal yang sudah ditentukan terimakasih.</p>
        <hr>
        <p class="mb-0">Ttd SDM RSU Harapan Ibu Purbalingga.</p>
    </div>
@endsection

@push('js')
@endpush
