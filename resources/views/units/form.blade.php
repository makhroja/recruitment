<div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
    <label for="nama" class="col-md-2 control-label">Nama</label>
    <div class="col-md-10">
        <input class="form-control  @error('nama') is-invalid @enderror" name="nama" type="text" id="nama"
            value="{{ old('nama', optional($unit)->nama) }}" minlength="1" placeholder="Enter nama here...">
        {!! $errors->first('nama', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <label for="user_id" class="col-md-2 control-label">User</label>
    <div class="col-md-10">
        <select class="form-control select2 @error('user_id') is-invalid @enderror" id="user_id" name="user_id">
            <option value="" style="display: none;"
                {{ old('user_id', optional($unit)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select
                user</option>
            @foreach ($users as $key => $user)
                <option value="{{ $key }}"
                    {{ old('user_id', optional($unit)->user_id) == $key ? 'selected' : '' }}>
                    {{ $user }}
                </option>
            @endforeach
        </select>

        {!! $errors->first('user_id', '<small class="invalid-feedback" role="alert">:message</small>') !!}
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
