<div class="form-group {{ $errors->has('job_id') ? 'has-error' : '' }}">
    <label for="job_id" class="col-md-2 control-label">Job</label>
    <div class="col-md-10">
        <select class="form-control select2 @error('job_id') is-invalid @enderror" id="job_id" name="job_id">
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

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Jadwal Seleksi</h4>
                <p class="card-description">Read the <a href="https://www.tiny.cloud/docs/" target="_blank"> Official
                        TinyMCE Documentation </a>for a full list of instructions and other options.</p>
                <textarea class="form-control" name="jadwal" id="tinymceExample" rows="25">{{ old('job_id', optional($schedule)->jadwal) }}</textarea>
            </div>
        </div>
    </div>
</div>
