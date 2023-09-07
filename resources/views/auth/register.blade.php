@extends('layout.guest')

@section('content')
    <div class="page-content d-flex align-items-center justify-content-center mt-4">

        <div class="row w-100 mx-0 auth-page">
            <div class="col-md-4 mx-auto">
                <div class="card">
                    <div class="row">
                        <div class="col-md-12 pl-md-0">
                            <div class="auth-form-wrapper px-4 py-5">
                                <h5 class="text-muted font-weight-normal mb-4">Daftar akun Rekrutment</h5>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Nama Lengkap</label>
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password </label>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password Confrim</label>
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Masukan Captcha</label></br>
                                        <div class="media d-block d-sm-flex captcha">
                                            <button type="button" class="btn btn-lg bg-danger text-white" class="reload"
                                                id="reload">
                                                &#x21bb;
                                            </button>
                                            <span>{!! captcha_img() !!}</span>
                                            <div class="media-body">
                                                <input id="captcha" type="captcha" class="form-control" name="captcha"
                                                    required placeholder="ketikan captcha disini">
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="form-check form-check-flat form-check-primary">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input">
                                            Remember me
                                        </label>
                                    </div> --}}
                                    <div class="mt-3">
                                        <button class="btn btn-primary mr-2 mb-2 mb-md-0" type="submit">Daftar</button>
                                    </div>
                                    <a href="{{ url('/login') }}" class="d-block mt-3 text-muted">Sudah punya akun?
                                        Masuk</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('custom-scripts')
    <script type="text/javascript">
        $('#reload').click(function() {
            $.ajax({
                type: 'GET',
                url: '{{ url('reload-captcha') }}',
                success: function(data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
    </script>
@endpush
