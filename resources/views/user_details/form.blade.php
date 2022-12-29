<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <label for="user_id" class="col-md-2 control-label">User</label>
    <div class="col-md-10">
        <select class="form-control select2 @error('user_id') is-invalid @enderror" id="user_id" name="user_id">
            <option value="" style="display: none;"
                {{ old('user_id', optional($userDetail)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>
                Select
                user</option>
            @foreach ($users as $key => $user)
                <option value="{{ $key }}"
                    {{ old('user_id', optional($userDetail)->user_id) == $key ? 'selected' : '' }}>
                    {{ $user }}
                </option>
            @endforeach
        </select>

        {!! $errors->first('user_id', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('nama_lengkap') ? 'has-error' : '' }}">
    <label for="nama_lengkap" class="col-md-2 control-label">Nama Lengkap</label>
    <div class="col-md-10">
        <input class="form-control  @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" type="text"
            id="nama_lengkap" value="{{ old('nama_lengkap', optional($userDetail)->nama_lengkap) }}" minlength="1"
            placeholder="Isikan nama lengkap disini...">
        {!! $errors->first('nama_lengkap', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('jk') ? 'has-error' : '' }}">
    <label for="jk" class="col-md-2 control-label">Jk</label>
    <div class="col-md-10">
        <input class="form-control  @error('jk') is-invalid @enderror" name="jk" type="text" id="jk"
            value="{{ old('jk', optional($userDetail)->jk) }}" minlength="1" placeholder="Isikan jk disini...">
        {!! $errors->first('jk', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('tgl_lahir') ? 'has-error' : '' }}">
    <label for="tgl_lahir" class="col-md-2 control-label">Tgl Lahir</label>
    <div class="col-md-10">
        <input class="form-control  @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" type="text"
            id="tgl_lahir" value="{{ old('tgl_lahir', optional($userDetail)->tgl_lahir) }}"
            placeholder="Isikan tgl lahir disini...">
        {!! $errors->first('tgl_lahir', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('tempat_lahir') ? 'has-error' : '' }}">
    <label for="tempat_lahir" class="col-md-2 control-label">Tempat Lahir</label>
    <div class="col-md-10">
        <input class="form-control  @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" type="text"
            id="tempat_lahir" value="{{ old('tempat_lahir', optional($userDetail)->tempat_lahir) }}" minlength="1"
            placeholder="Isikan tempat lahir disini...">
        {!! $errors->first('tempat_lahir', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('agama') ? 'has-error' : '' }}">
    <label for="agama" class="col-md-2 control-label">Agama</label>
    <div class="col-md-10">
        <input class="form-control  @error('agama') is-invalid @enderror" name="agama" type="text" id="agama"
            value="{{ old('agama', optional($userDetail)->agama) }}" minlength="1"
            placeholder="Isikan agama disini...">
        {!! $errors->first('agama', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('alamat') ? 'has-error' : '' }}">
    <label for="alamat" class="col-md-2 control-label">Alamat</label>
    <div class="col-md-10">
        <input class="form-control  @error('alamat') is-invalid @enderror" name="alamat" type="text" id="alamat"
            value="{{ old('alamat', optional($userDetail)->alamat) }}" minlength="1"
            placeholder="Isikan alamat disini...">
        {!! $errors->first('alamat', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('no_hp') ? 'has-error' : '' }}">
    <label for="no_hp" class="col-md-2 control-label">No Hp</label>
    <div class="col-md-10">
        <input class="form-control  @error('no_hp') is-invalid @enderror" name="no_hp" type="text" id="no_hp"
            value="{{ old('no_hp', optional($userDetail)->no_hp) }}" minlength="1"
            placeholder="Isikan no hp disini...">
        {!! $errors->first('no_hp', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('pendidikan') ? 'has-error' : '' }}">
    <label for="pendidikan" class="col-md-2 control-label">Pendidikan</label>
    <div class="col-md-10">
        <input class="form-control  @error('pendidikan') is-invalid @enderror" name="pendidikan" type="text"
            id="pendidikan" value="{{ old('pendidikan', optional($userDetail)->pendidikan) }}" minlength="1"
            placeholder="Isikan pendidikan disini...">
        {!! $errors->first('pendidikan', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('instansi') ? 'has-error' : '' }}">
    <label for="instansi" class="col-md-2 control-label">Instansi</label>
    <div class="col-md-10">
        <input class="form-control  @error('instansi') is-invalid @enderror" name="instansi" type="text"
            id="instansi" value="{{ old('instansi', optional($userDetail)->instansi) }}" minlength="1"
            placeholder="Isikan instansi disini...">
        {!! $errors->first('instansi', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('jurusan') ? 'has-error' : '' }}">
    <label for="jurusan" class="col-md-2 control-label">Jurusan</label>
    <div class="col-md-10">
        <input class="form-control  @error('jurusan') is-invalid @enderror" name="jurusan" type="text"
            id="jurusan" value="{{ old('jurusan', optional($userDetail)->jurusan) }}" minlength="1"
            placeholder="Isikan jurusan disini...">
        {!! $errors->first('jurusan', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('foto') ? 'has-error' : '' }}">
    <label for="foto" class="col-md-2 control-label">Foto</label>
    <div class="col-md-10">
        <input class="form-control  @error('foto') is-invalid @enderror" name="foto" type="text"
            id="foto" value="{{ old('foto', optional($userDetail)->foto) }}" minlength="1"
            placeholder="Isikan foto disini...">
        {!! $errors->first('foto', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
    <label for="status" class="col-md-2 control-label">Status</label>
    <div class="col-md-10">
        <select class="form-control select2 @error('status') is-invalid @enderror" id="status" name="status">
            <option value="" style="display: none;"
                {{ old('status', optional($position)->status ?: '') == '' ? 'selected' : '' }} disabled selected>
                Select
                unit</option>
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

<div class="form-group {{ $errors->has('is_aktif') ? 'has-error' : '' }}">
    <label for="is_aktif" class="col-md-2 control-label">Is Aktif</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="is_aktif_1">
                <input id="is_aktif_1" class=" @error('is_aktif') is-invalid @enderror" name="is_aktif"
                    type="checkbox" value="1"
                    {{ old('is_aktif', optional($userDetail)->is_aktif) == '1' ? 'checked' : '' }}>
                Yes
            </label>
        </div>

        {!! $errors->first('is_aktif', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>
