<input type="hidden" value="fromUnit" name="method">
<div class="form-group {{ $errors->has('unit_id') ? 'has-error' : '' }}">
    <label for="unit_id" class="col-md-2 control-label">Unit</label>
    <div class="col-md-10">
        <select style="width:100%" class="form-control select2 @error('unit_id') is-invalid @enderror" id="unit_id"
            name="unit_id">
            <option value="{{ $unit->id }}" style="display: none;" {{ old('unit_id') }} selected>{{ $unit->nama }}
            </option>
        </select>

        {!! $errors->first('user_id', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
    <label for="nama" class="col-md-2 control-label">Nama</label>
    <div class="col-md-10">
        <input class="form-control  @error('nama') is-invalid @enderror" name="nama" type="text" id="nama"
            value="{{ old('nama', optional($position)->nama) }}" minlength="1" placeholder="Enter nama here...">
        {!! $errors->first('nama', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
    <label for="status" class="col-md-2 control-label">Status</label>
    <div class="col-md-10">
        <select style="width: 100%" class="form-control select2 @error('status') is-invalid @enderror" id="status"
            name="status" required>
            <option value="" style="display: none;"
                {{ old('status', optional($position)->status ?: '') == '' ? 'selected' : '' }} disabled selected>
                Pilih
                Status</option>
            <option value="1" {{ old('status', optional($position)->status) == '1' ? 'selected' : '' }}>
                Aktif
            </option>
            <option value="0" {{ old('status', optional($position)->status) == '0' ? 'selected' : '' }}>
                Tidak Aktif
            </option>
        </select>

        {!! $errors->first('user_id', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>
