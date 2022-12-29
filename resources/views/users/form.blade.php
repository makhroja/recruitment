<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control  @error('name') is-invalid @enderror" required name="name" type="text"
            id="name" value="{{ old('name', optional($user)->name) }}" minlength="1" maxlength="255"
            placeholder="Enter name here...">
        {!! $errors->first('name', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-md-2 control-label">Email</label>
    <div class="col-md-10">
        <input class="form-control  @error('email') is-invalid @enderror" required name="email" type="email"
            id="email" value="{{ old('email', optional($user)->email) }}" placeholder="Enter email here...">
        {!! $errors->first('email', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
    <label for="password" class="col-md-2 control-label">Password</label>
    <div class="col-md-10">
        <input class="form-control @error('password') is-invalid @enderror" name="password" type="password"
            id="password" value="{{ old('password') }}" placeholder="Enter password here...">
        {!! $errors->first('password', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
    <label for="password" class="col-md-5 control-label">Password Confirmation</label>
    <div class="col-md-10">
        <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror"
            name="password_confirmation" autocomplete="new-password" placeholder="Enter password confirmation here...">
        {!! $errors->first('password', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
    <label for="role" class="col-md-2 control-label">Role</label>
    <div class="col-md-10">
        <input class="form-control  @error('role') is-invalid @enderror" required name="role" type="text"
            id="role" value="{{ old('role', optional($user)->role) }}" minlength="1"
            placeholder="Enter role here...">
        {!! $errors->first('role', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
    <label for="status" class="col-md-2 control-label">Status</label>
    <div class="col-md-10">
        <select class="form-control select2 @error('status') is-invalid @enderror" id="status" name="status">
            <option value="" style="display: none;"
                {{ old('status', optional($user)->status ?: '') == '' ? 'selected' : '' }} disabled selected>
                Select
                unit</option>
            <option value="1" {{ old('status', optional($user)->status) == '1' ? 'selected' : '' }}>
                Aktif
            </option>
            <option value="0" {{ old('status', optional($user)->status) == '0' ? 'selected' : '' }}>
                Tidak Aktif
            </option>
        </select>

        {!! $errors->first('user_id', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>
