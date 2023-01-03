<input type="hidden" name="method" value="fromSchedule">
<div class="form-group {{ $errors->has('job_id') ? 'has-error' : '' }}">
    <label for="job_id" class="col-md-2 control-label">Job</label>
    <div class="col-md-10">
        <select class="form-control text-dark select2 @error('job_id') is-invalid @enderror" id="job_id" name="job_id">
            <option value="" style="display: none;"
                {{ old('job_id', optional($schedule)->job_id ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih
                job</option>
            @foreach ($jobs as $key => $job)
                <option value="{{ $key }}"
                    {{ old('job_id', optional($schedule)->job_id) == $key ? 'selected' : '' }}>
                    {{ $job }}
                </option>
            @endforeach
        </select>

        {!! $errors->first('job_id', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('tahap') ? 'has-error' : '' }}">
    <label for="tahap" class="col-md-2 control-label">Tahap</label>
    <div class="col-md-10">
        <select style="width: 35%" class="form-control text-dark select2 @error('tahap') is-invalid @enderror"
            id="tahap" name="tahap">
            @for ($i = 1; $i < 15; $i++)
                <option value="{{ $i }}" style=""
                    {{ old('tahap', optional($schedule)->tahap) == $i ? 'selected' : '' }}>
                    {{ 'Tahap ' . $i }}
                </option>
            @endfor
        </select>

        {!! $errors->first('tahap', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('nama_tahap') ? 'has-error' : '' }}">
    <label for="nama_tahap" class="col-md-2 control-label">Nama Tahap</label>
    <div class="col-md-10">
        <input class="form-control  @error('nama_tahap') is-invalid @enderror" name="nama_tahap" type="text"
            id="nama_tahap" value="{{ old('nama_tahap', optional($schedule)->nama_tahap) }}" minlength="1"
            placeholder="Isikan nama tahap disini...">
        {!! $errors->first('nama_tahap', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('tgl_mulai') ? 'has-error' : '' }}">
    <label for="tgl_mulai" class="col-md-2 control-label">Tgl Mulai</label>
    <div class="col-md-10">
        <input class="form-control  @error('tgl_mulai') is-invalid @enderror" name="tgl_mulai" type="date"
            id="tgl_mulai" value="{{ old('tgl_mulai', optional($schedule)->tgl_mulai) }}"
            placeholder="Isikan tgl mulai disini...">
        {!! $errors->first('tgl_mulai', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>
