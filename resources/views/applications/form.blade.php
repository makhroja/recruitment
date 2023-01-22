<div class="form-group {{ $errors->has('job_id') ? 'has-error' : '' }}">
    <label for="job_id" class="col-md-12 control-label">Job</label>
    <div class="col-md-10">
        <select class="form-control select2 @error('job_id') is-invalid @enderror" id="job_id" name="job_id">
            <option value="" style="display: none;"
                {{ old('job_id', optional($application)->job_id ?: '') == '' ? 'selected' : '' }} disabled selected>
                Pilih Lowongan</option>
            @foreach ($jobs as $key => $job)
                <option value="{{ $key }}"
                    {{ old('job_id', optional($application)->job_id) == $key ? 'selected' : '' }}>
                    {{ $job }}
                </option>
            @endforeach
        </select>

        {!! $errors->first('job_id', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <label for="user_id" class="col-md-12 control-label">User</label>
    <div class="col-md-10">
        <select class="form-control select2 @error('user_id') is-invalid @enderror" id="user_id" name="user_id">
            <option value="" style="display: none;"
                {{ old('user_id', optional($application)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>
                Pilih user</option>
            @foreach ($users as $key => $user)
                <option value="{{ $key }}"
                    {{ old('user_id', optional($application)->user_id) == $key ? 'selected' : '' }}>
                    {{ $user }}
                </option>
            @endforeach
        </select>

        {!! $errors->first('user_id', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('unit_id') ? 'has-error' : '' }}">
    <label for="unit_id" class="col-md-12 control-label">Unit</label>
    <div class="col-md-10">
        <select class="form-control select2 @error('unit_id') is-invalid @enderror" id="unit_id" name="unit_id">
            <option value="" style="display: none;"
                {{ old('unit_id', optional($application)->unit_id ?: '') == '' ? 'selected' : '' }} disabled selected>
                Pilih unit</option>
            @foreach ($units as $key => $unit)
                <option value="{{ $key }}"
                    {{ old('unit_id', optional($application)->unit_id) == $key ? 'selected' : '' }}>
                    {{ $unit }}
                </option>
            @endforeach
        </select>

        {!! $errors->first('unit_id', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('position_id') ? 'has-error' : '' }}">
    <label for="position_id" class="col-md-12 control-label">Position</label>
    <div class="col-md-10">
        <select class="form-control select2 @error('position_id') is-invalid @enderror" id="position_id"
            name="position_id">
            <option value="" style="display: none;"
                {{ old('position_id', optional($application)->position_id ?: '') == '' ? 'selected' : '' }} disabled
                selected>Pilih posisi</option>
            @foreach ($positions as $key => $position)
                <option value="{{ $key }}"
                    {{ old('position_id', optional($application)->position_id) == $key ? 'selected' : '' }}>
                    {{ $position }}
                </option>
            @endforeach
        </select>

        {!! $errors->first('position_id', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('administrasi') ? 'has-error' : '' }}">
    <label for="administrasi" class="col-md-12 control-label">Administrasi</label>
    <div class="col-md-10">
        <select class="form-control select2 @error('administrasi') is-invalid @enderror" id="administrasi"
            name="administrasi">
            <option value="{{ old('administrasi', optional($application)->administrasi) }}"
                {{ old('administrasi', optional($application)->administrasi) == 1 ? 'selected' : '' }}>
                Ya
            </option>
            <option value="{{ old('administrasi', optional($application)->administrasi) }}"
                {{ old('administrasi', optional($application)->administrasi) == 0 ? 'selected' : '' }}>
                Tidak
            </option>
            <option value="" style=""
                {{ old('administrasi', optional($application)->administrasi ?: '') == '' ? 'selected' : '' }} disabled
                selected>
                Pilih Status Seleksi</option>
        </select>

        {!! $errors->first('administrasi', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phase2s') ? 'has-error' : '' }}">
    <label for="phase2s" class="col-md-12 control-label">Tertulis</label>
    <div class="col-md-10">
        <input class="form-control  @error('phase2s') is-invalid @enderror" name="phase2s" type="text" id="phase2s"
            value="{{ old('phase2s', optional($application)->tertulis) }}" placeholder="Isikan tertulis disini...">
        {!! $errors->first('phase2s', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phase3s') ? 'has-error' : '' }}">
    <label for="phase3s" class="col-md-12 control-label">Wawancara Unit</label>
    <div class="col-md-10">
        <input class="form-control  @error('phase3s') is-invalid @enderror" name="phase3s" type="text" id="phase3s"
            value="{{ old('phase3s', optional($application)->phase3s) }}"
            placeholder="Isikan wawancara unit disini...">
        {!! $errors->first('phase3s', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phase4s') ? 'has-error' : '' }}">
    <label for="phase4s" class="col-md-12 control-label">Praktek</label>
    <div class="col-md-10">
        <input class="form-control  @error('phase4s') is-invalid @enderror" name="phase4s" type="text" id="phase4s"
            value="{{ old('phase4s', optional($application)->praktek) }}" placeholder="Isikan praktek disini...">
        {!! $errors->first('phase4s', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phase5s') ? 'has-error' : '' }}">
    <label for="phase5s" class="col-md-12 control-label">Wawancara Hrd</label>
    <div class="col-md-10">
        <input class="form-control  @error('phase5s') is-invalid @enderror" name="phase5s" type="text" id="phase5s"
            value="{{ old('phase5s', optional($application)->phase5s) }}" placeholder="Isikan wawancara hrd disini...">
        {!! $errors->first('phase5s', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phase6s') ? 'has-error' : '' }}">
    <label for="phase6s" class="col-md-12 control-label">Psikotes</label>
    <div class="col-md-10">
        <input class="form-control  @error('phase6s') is-invalid @enderror" name="phase6s" type="text" id="phase6s"
            value="{{ old('phase6s', optional($application)->phase6s) }}" placeholder="Isikan psikotes disini...">
        {!! $errors->first('phase6s', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phase7s') ? 'has-error' : '' }}">
    <label for="phase7s" class="col-md-12 control-label">Wawancara Performance</label>
    <div class="col-md-10">
        <input class="form-control  @error('phase7s') is-invalid @enderror" name="phase7s" type="text"
            id="phase7s" value="{{ old('phase7s', optional($application)->phase7s) }}"
            placeholder="Isikan wawancara performance disini...">
        {!! $errors->first('phase7s', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phase8s') ? 'has-error' : '' }}">
    <label for="phase8s" class="col-md-12 control-label">Kesehatan</label>
    <div class="col-md-10">
        <input class="form-control  @error('phase8s') is-invalid @enderror" name="phase8s" type="text"
            id="phase8s" value="{{ old('phase8s', optional($application)->phase8s) }}"
            placeholder="Isikan kesehatan disini...">
        {!! $errors->first('phase8s', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phase9s') ? 'has-error' : '' }}">
    <label for="phase9s" class="col-md-12 control-label">Tahap Akhir</label>
    <div class="col-md-10">
        <input class="form-control  @error('phase9s') is-invalid @enderror" name="phase9s" type="text"
            id="phase9s" value="{{ old('phase9s', optional($application)->phase9s) }}"
            placeholder="Isikan tahap akhir disini...">
        {!! $errors->first('phase9s', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>
