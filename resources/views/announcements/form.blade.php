<div class="form-group {{ $errors->has('job_id') ? 'has-error' : '' }}">
    <label for="job_id" class="col-md-2 control-label">Job</label>
    <div class="col-md-10">
        <select class="form-control select2 @error('job_id') is-invalid @enderror" id="job_id" name="job_id">
            <option value="" style="display: none;"
                {{ old('job_id', optional($announcement)->job_id ?: '') == '' ? 'selected' : '' }} disabled selected>
                Pilih Lowongan</option>
            @foreach ($jobs as $key => $job)
                <option value="{{ $key }}"
                    {{ old('job_id', optional($announcement)->job_id) == $key ? 'selected' : '' }}>
                    {{ $job }}
                </option>
            @endforeach
        </select>

        {!! $errors->first('job_id', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('judul') ? 'has-error' : '' }}">
    <label for="judul" class="col-md-2 control-label">Judul</label>
    <div class="col-md-10">
        <textarea class="form-control  @error('judul') is-invalid @enderror" name="judul" type="text" id="judul"
            rows="3" value="" minlength="1" placeholder="Isikan judul disini...">{{ old('judul', optional($announcement)->judul) }}</textarea>
        {!! $errors->first('judul', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('keterangan') ? 'has-error' : '' }}">
    <label for="keterangan" class="col-md-2 control-label">Keterangan</label>
    <div class="col-md-10">
        <textarea class="form-control  @error('keterangan') is-invalid @enderror" name="keterangan" type="text"
            id="keterangan" rows="8" value="" minlength="1" placeholder="Isikan keterangan disini...">{{ old('keterangan', optional($announcement)->keterangan) }}</textarea>
        {!! $errors->first('keterangan', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('pdf') ? 'has-error' : '' }}">
    <label for="attachments" class="col-md-12 control-label">Pilih File Pengumuman</label>
    <div class="col-md-10">
        <input name="file" type="file" id="file" class="myDropify" class="border" accept="application/pdf" />
        {!! $errors->first('pdf', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
    <label for="status" class="col-md-2 control-label">Is Aktif</label>
    <div class="col-md-10">
        <div class="form-check form-check-inline">
            <label class="form-check-label">Ya
                <input value="1" id="status_1" href="javascript:void(0)" name="status" type="checkbox"
                    class="form-check-input @error('status') is-invalid @enderror"
                    {{ old('status', optional($announcement)->status) == '1' ? 'checked' : '' }}>
            </label>
        </div>
        {!! $errors->first('status', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>
