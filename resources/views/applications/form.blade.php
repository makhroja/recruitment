<div class="form-group {{ $errors->has('job_id') ? 'has-error' : '' }}">
    <label for="job_id" class="col-md-12 control-label">Job</label>
    <div class="col-md-10">
        <select class="form-control select2 @error('job_id') is-invalid @enderror" id="job_id" name="job_id">
            <option value="" style="display: none;"
                {{ old('job_id', optional($application)->job_id ?: '') == '' ? 'selected' : '' }} disabled selected>
                Pilih job</option>
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
                selected>Pilih position</option>
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

<div class="form-group {{ $errors->has('tertulis') ? 'has-error' : '' }}">
    <label for="tertulis" class="col-md-12 control-label">Tertulis</label>
    <div class="col-md-10">
        <input class="form-control  @error('tertulis') is-invalid @enderror" name="tertulis" type="text"
            id="tertulis" value="{{ old('tertulis', optional($application)->tertulis) }}"
            placeholder="Isikan tertulis disini...">
        {!! $errors->first('tertulis', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('wawancara_unit') ? 'has-error' : '' }}">
    <label for="wawancara_unit" class="col-md-12 control-label">Wawancara Unit</label>
    <div class="col-md-10">
        <input class="form-control  @error('wawancara_unit') is-invalid @enderror" name="wawancara_unit" type="text"
            id="wawancara_unit" value="{{ old('wawancara_unit', optional($application)->wawancara_unit) }}"
            placeholder="Isikan wawancara unit disini...">
        {!! $errors->first('wawancara_unit', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('praktek') ? 'has-error' : '' }}">
    <label for="praktek" class="col-md-12 control-label">Praktek</label>
    <div class="col-md-10">
        <input class="form-control  @error('praktek') is-invalid @enderror" name="praktek" type="text" id="praktek"
            value="{{ old('praktek', optional($application)->praktek) }}" placeholder="Isikan praktek disini...">
        {!! $errors->first('praktek', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('wawancara_hrd') ? 'has-error' : '' }}">
    <label for="wawancara_hrd" class="col-md-12 control-label">Wawancara Hrd</label>
    <div class="col-md-10">
        <input class="form-control  @error('wawancara_hrd') is-invalid @enderror" name="wawancara_hrd" type="text"
            id="wawancara_hrd" value="{{ old('wawancara_hrd', optional($application)->wawancara_hrd) }}"
            placeholder="Isikan wawancara hrd disini...">
        {!! $errors->first('wawancara_hrd', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('psikotes') ? 'has-error' : '' }}">
    <label for="psikotes" class="col-md-12 control-label">Psikotes</label>
    <div class="col-md-10">
        <input class="form-control  @error('psikotes') is-invalid @enderror" name="psikotes" type="text"
            id="psikotes" value="{{ old('psikotes', optional($application)->psikotes) }}"
            placeholder="Isikan psikotes disini...">
        {!! $errors->first('psikotes', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('wawancara_performance') ? 'has-error' : '' }}">
    <label for="wawancara_performance" class="col-md-12 control-label">Wawancara Performance</label>
    <div class="col-md-10">
        <input class="form-control  @error('wawancara_performance') is-invalid @enderror"
            name="wawancara_performance" type="text" id="wawancara_performance"
            value="{{ old('wawancara_performance', optional($application)->wawancara_performance) }}"
            placeholder="Isikan wawancara performance disini...">
        {!! $errors->first('wawancara_performance', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('kesehatan') ? 'has-error' : '' }}">
    <label for="kesehatan" class="col-md-12 control-label">Kesehatan</label>
    <div class="col-md-10">
        <input class="form-control  @error('kesehatan') is-invalid @enderror" name="kesehatan" type="text"
            id="kesehatan" value="{{ old('kesehatan', optional($application)->kesehatan) }}"
            placeholder="Isikan kesehatan disini...">
        {!! $errors->first('kesehatan', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('tahap_akhir') ? 'has-error' : '' }}">
    <label for="tahap_akhir" class="col-md-12 control-label">Tahap Akhir</label>
    <div class="col-md-10">
        <input class="form-control  @error('tahap_akhir') is-invalid @enderror" name="tahap_akhir" type="text"
            id="tahap_akhir" value="{{ old('tahap_akhir', optional($application)->tahap_akhir) }}"
            placeholder="Isikan tahap akhir disini...">
        {!! $errors->first('tahap_akhir', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>
