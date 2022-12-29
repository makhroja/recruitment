<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <label for="user_id" class="col-md-6 control-label">User</label>
    <div class="col-md-10">
        <select class="getUserLists form-control select2 @error('user_id') is-invalid @enderror" id="user_id"
            name="user_id">
            <option value="" style="display: none;"
                {{ old('user_id', optional($job)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Pilih user
            </option>
            @foreach ($users as $key => $user)
                <option value="{{ $key }}"
                    {{ old('user_id', optional($job)->user_id) == $key ? 'selected' : '' }}>
                    {{ $user }}
                </option>
            @endforeach
        </select>

        {!! $errors->first('user_id', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('no_surat') ? 'has-error' : '' }}">
    <label for="no_surat" class="col-md-2 control-label">No Surat</label>
    <div class="col-md-10">
        <input class="form-control  @error('no_surat') is-invalid @enderror" name="no_surat" type="text"
            id="no_surat" value="{{ old('no_surat', optional($job)->no_surat) }}" minlength="1"
            placeholder="Isikan no surat disini...">
        {!! $errors->first('no_surat', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('judul') ? 'has-error' : '' }}">
    <label for="judul" class="col-md-2 control-label">Judul</label>
    <div class="col-md-10">
        <input class="form-control  @error('judul') is-invalid @enderror" name="judul" type="text" id="judul"
            value="{{ old('judul', optional($job)->judul) }}" minlength="1" placeholder="Isikan judul disini...">
        {!! $errors->first('judul', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('informasi') ? 'has-error' : '' }}">
    <label for="informasi" class="col-md-2 control-label">Informasi</label>
    <div class="col-md-10">
        <input class="form-control  @error('informasi') is-invalid @enderror" name="informasi" type="text"
            id="informasi" value="{{ old('informasi', optional($job)->informasi) }}" minlength="1"
            placeholder="Isikan informasi disini...">
        {!! $errors->first('informasi', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('tgl_mulai') ? 'has-error' : '' }}">
    <label for="tgl_mulai" class="col-md-5 control-label">Tgl Mulai Pengumpulan Berkas</label>
    <div class="col-md-5">
        <input class="form-control  @error('tgl_mulai') is-invalid @enderror" name="tgl_mulai" type="date"
            id="tgl_mulai" value="{{ old('tgl_mulai', optional($job)->tgl_mulai) }}"
            placeholder="Isikan tgl mulai disini...">
        {!! $errors->first('tgl_mulai', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('tgl_akhir') ? 'has-error' : '' }}">
    <label for="tgl_akhir" class="col-md-5 control-label">Tgl Akhir Pengumpulan Berkas</label>
    <div class="col-md-5">
        <input class="form-control  @error('tgl_akhir') is-invalid @enderror" name="tgl_akhir" type="date"
            id="tgl_akhir" value="{{ old('tgl_akhir', optional($job)->tgl_akhir) }}"
            placeholder="Isikan tgl akhir disini...">
        {!! $errors->first('tgl_akhir', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('lampiran') ? 'has-error' : '' }}">
    <label for="lampiran" class="col-md-2 control-label">Lampiran</label>
    <div class="col-md-10">
        <input type="file" name="file" id="file" accept="application/pdf"
            class="form-control myDropify @error('file') is-invalid @enderror">
        {!! $errors->first('lampiran', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('is_aktif') ? 'has-error' : '' }}">
    <label for="is_aktif" class="col-md-2 control-label">Is Aktif</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="is_aktif_1">
                <input id="is_aktif_1" class="checkbox @error('is_aktif') is-invalid @enderror" name="is_aktif"
                    type="checkbox" value="1"
                    {{ old('is_aktif', optional($job)->is_aktif) == '1' ? 'checked' : '' }}>
                Yes
            </label>
        </div>

        {!! $errors->first('is_aktif', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>
