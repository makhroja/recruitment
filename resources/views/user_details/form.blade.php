<div class="row">
    <div class="col-md-4">
        <div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
            <label for="user_id" class="col-md-12 control-label">User</label>
            <div class="col-md-12">
                <select class="form-control select2 @error('user_id') is-invalid @enderror" id="user_id" name="user_id">
                    <option value="" style="display: none;"
                        {{ old('user_id', optional($userDetail)->user_id ?: '') == '' ? 'selected' : '' }} disabled
                        selected>
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
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('nama_lengkap') ? 'has-error' : '' }}">
            <label for="nama_lengkap" class="col-md-12 control-label">Nama Lengkap</label>
            <div class="col-md-12">
                <input class="form-control  @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap"
                    type="text" id="nama_lengkap"
                    value="{{ old('nama_lengkap', optional($userDetail)->nama_lengkap) }}" minlength="1"
                    placeholder="Isikan nama lengkap disini...">
                {!! $errors->first('nama_lengkap', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-2">

    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-3">
        <div class="form-group {{ $errors->has('tempat_lahir') ? 'has-error' : '' }}">
            <label for="tempat_lahir" class="col-md-12 control-label">Tempat Lahir</label>
            <div class="col-md-12">
                <input class="form-control  @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir"
                    type="text" id="tempat_lahir"
                    value="{{ old('tempat_lahir', optional($userDetail)->tempat_lahir) }}" minlength="1"
                    placeholder="Isikan tempat lahir disini...">
                {!! $errors->first('tempat_lahir', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group {{ $errors->has('jk') ? 'has-error' : '' }}">
            <label for="jk" class="col-md-12 control-label">Jenis Kelamin</label>
            <div class="col-md-12">
                <select class="form-control select2 @error('jk') is-invalid @enderror" id="jk" name="jk">
                    <option value="" style="display: none;"
                        {{ old('jk', optional($userDetail)->jk ?: '') == '' ? 'selected' : '' }} disabled selected>
                        Pilih
                        Jenis Kelamin</option>
                    <option value="1" {{ old('jk', optional($userDetail)->jk) == '1' ? 'selected' : '' }}>
                        Laki-laki
                    </option>
                    <option value="2" {{ old('jk', optional($userDetail)->jk) == '2' ? 'selected' : '' }}>
                        Perempuan
                    </option>
                </select>
                {!! $errors->first('jk', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group {{ $errors->has('tgl_lahir') ? 'has-error' : '' }}">
            <label for="tgl_lahir" class="col-md-12 control-label">Tgl Lahir</label>
            <div class="col-md-12">
                <input class="form-control  @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" type="date"
                    id="tgl_lahir" value="{{ old('tgl_lahir', optional($userDetail)->tgl_lahir) }}"
                    placeholder="Isikan tgl lahir disini...">
                {!! $errors->first('tgl_lahir', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group {{ $errors->has('no_hp') ? 'has-error' : '' }}">
            <label for="no_hp" class="col-md-12 control-label">No Hp</label>
            <div class="col-md-12">
                <input class="form-control  @error('no_hp') is-invalid @enderror" name="no_hp" type="text"
                    id="no_hp" value="{{ old('no_hp', optional($userDetail)->no_hp) }}" minlength="1"
                    placeholder="Isikan no hp disini...">
                {!! $errors->first('no_hp', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-4">
        <div class="form-group {{ $errors->has('pendidikan') ? 'has-error' : '' }}">
            <label for="pendidikan" class="col-md-12 control-label">Pendidikan</label>
            <div class="col-md-12">
                <select class="form-control select2 @error('pendidikan') is-invalid @enderror" id="pendidikan"
                    name="pendidikan">
                    <option value="" style="display: none;"
                        {{ old('pendidikan', optional($userDetail)->pendidikan ?: '') == '' ? 'selected' : '' }}
                        disabled selected>
                        Pilih
                        Pendidikan</option>
                    <option value="SMA/SMK"
                        {{ old('pendidikan', optional($userDetail)->pendidikan) == 'SMA/SMK' ? 'selected' : '' }}>
                        SMA/SMK
                    </option>
                    <option value="DI"
                        {{ old('pendidikan', optional($userDetail)->pendidikan) == 'DI' ? 'selected' : '' }}>
                        DI
                    </option>
                    <option value="DII"
                        {{ old('pendidikan', optional($userDetail)->pendidikan) == 'DII' ? 'selected' : '' }}>
                        DII
                    </option>
                    <option value="DIII"
                        {{ old('pendidikan', optional($userDetail)->pendidikan) == 'DIII' ? 'selected' : '' }}>
                        DIII
                    </option>
                    <option value="DIV"
                        {{ old('pendidikan', optional($userDetail)->pendidikan) == 'DIV' ? 'selected' : '' }}>
                        DIV
                    </option>
                    <option value="S1"
                        {{ old('pendidikan', optional($userDetail)->pendidikan) == 'S1' ? 'selected' : '' }}>
                        S1
                    </option>
                    <option value="S2"
                        {{ old('pendidikan', optional($userDetail)->pendidikan) == 'S2' ? 'selected' : '' }}>
                        S2
                    </option>
                    <option value="S3"
                        {{ old('pendidikan', optional($userDetail)->pendidikan) == 'S3' ? 'selected' : '' }}>
                        S3
                    </option>
                </select>
                {!! $errors->first('pendidikan', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('instansi') ? 'has-error' : '' }}">
            <label for="instansi" class="col-md-12 control-label">Instansi/Universitas/Sekolah</label>
            <div class="col-md-12">
                <input class="form-control  @error('instansi') is-invalid @enderror" name="instansi" type="text"
                    id="instansi" value="{{ old('instansi', optional($userDetail)->instansi) }}" minlength="1"
                    placeholder="Isikan instansi disini...">
                {!! $errors->first('instansi', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </div>
        </div>
    </div>

</div>
<hr>
<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('jurusan') ? 'has-error' : '' }}">
            <label for="jurusan" class="col-md-12 control-label">Jurusan</label>
            <div class="col-md-12">
                <input class="form-control  @error('jurusan') is-invalid @enderror" name="jurusan" type="text"
                    id="jurusan" value="{{ old('jurusan', optional($userDetail)->jurusan) }}" minlength="1"
                    placeholder="Isikan jurusan disini...">
                {!! $errors->first('jurusan', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group {{ $errors->has('tahun_lulus') ? 'has-error' : '' }}">
            <label for="tahun_lulus" class="col-md-12 control-label">Tahun Lulus</label>
            <div class="col-md-12">
                <input class="form-control  @error('tahun_lulus') is-invalid @enderror" name="tahun_lulus"
                    type="number" id="tahun_lulus"
                    value="{{ old('tahun_lulus', optional($userDetail)->tahun_lulus) }}"
                    placeholder="Isikan tahun lulus disini...">
                {!! $errors->first('tahun_lulus', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-3">
        <div class="form-group {{ $errors->has('agama') ? 'has-error' : '' }}">
            <label for="agama" class="col-md-12 control-label">Agama</label>
            <div class="col-md-12">
                <select class="form-control select2 @error('agama') is-invalid @enderror" id="agama"
                    name="agama">
                    <option value="" style="display: none;"
                        {{ old('agama', optional($userDetail)->agama ?: '') == '' ? 'selected' : '' }} disabled
                        selected>
                        Pilih
                        Agama</option>
                    <option value="Islam"
                        {{ old('agama', optional($userDetail)->agama) == 'Islam' ? 'selected' : '' }}>
                        Islam
                    </option>
                    <option value="Kristen"
                        {{ old('agama', optional($userDetail)->agama) == 'Kristen' ? 'selected' : '' }}>
                        Kristen
                    </option>
                    <option value="Budha"
                        {{ old('agama', optional($userDetail)->agama) == 'Budha' ? 'selected' : '' }}>
                        Budha
                    </option>
                    <option value="Hindu"
                        {{ old('agama', optional($userDetail)->agama) == 'Hindu' ? 'selected' : '' }}>
                        Hindu
                    </option>
                    <option value="Protestan"
                        {{ old('agama', optional($userDetail)->agama) == 'Protestan' ? 'selected' : '' }}>
                        Protestan
                    </option>
                    <option value="Agama Lainya"
                        {{ old('agama', optional($userDetail)->agama) == 'Agama Lainya' ? 'selected' : '' }}>
                        Agama Lainya
                    </option>
                </select>
                {!! $errors->first('agama', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group {{ $errors->has('alamat_ktp') ? 'has-error' : '' }}">
            <label for="alamat_ktp" class="col-md-12 control-label">Alamat KTP</label>
            <div class="col-md-12">
                <textarea class="form-control  @error('alamat_ktp') is-invalid @enderror" name="alamat_ktp" type="text"
                    id="alamat_ktp" value="" minlength="1" placeholder="Isikan alamat_ktp disini..." rows="5"
                    cols="10">{{ old('alamat_ktp', optional($userDetail)->alamat_ktp) }}</textarea>
                {!! $errors->first('alamat_ktp', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group {{ $errors->has('alamat_sekarang') ? 'has-error' : '' }}">
            <label for="alamat_sekarang" class="col-md-12 control-label">Alamat Sekarang</label>
            <div class="col-md-12">
                <textarea class="form-control  @error('alamat_sekarang') is-invalid @enderror" name="alamat_sekarang" type="text"
                    id="alamat_sekarang" value="" minlength="1" placeholder="Isikan alamat_sekarang disini..."
                    rows="5" cols="10">{{ old('alamat_sekarang', optional($userDetail)->alamat_sekarang) }}</textarea>
                {!! $errors->first('alamat_sekarang', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </div>
        </div>
    </div>
</div>

<hr>

<div class="form-group {{ $errors->has('foto') ? 'has-error' : '' }}">
    <label for="foto" class="col-md-12 control-label">Foto</label>
    <div class="col-md-12">
        <div class="input-group uploaded-file-group {{ $errors->has('image') ? 'has-error' : '' }}">
            <label class="input-group-btn">
                <span class="btn btn-default">
                    <input type="file" name="image" id="myDropify"
                        class="hidden myDropify @error('image') is-invalid @enderror" accept=".jpg, .jpeg, .png">
                </span>
            </label>
        </div>
        {!! $errors->first('foto', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
    <label for="status" class="col-md-12 control-label">Status</label>
    <div class="col-md-3">
        <select class="form-control select2 @error('status') is-invalid @enderror" id="status" name="status">
            <option value="" style="display: none;"
                {{ old('status', optional($userDetail)->status ?: '') == '' ? 'selected' : '' }} disabled selected>
                Select
                Status</option>
            <option value="1" {{ old('status', optional($userDetail)->status) == '1' ? 'selected' : '' }}>
                Aktif
            </option>
            <option value="0" {{ old('status', optional($userDetail)->status) == '0' ? 'selected' : '' }}>
                Tidak Aktif
            </option>
        </select>

        {!! $errors->first('status', '<small class="invalid-feedback" role="alert">:message</small>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('is_aktif') ? 'has-error' : '' }}">
    <label for="is_aktif" class="col-md-12 control-label">Is Aktif</label>
    <div class="col-md-12">
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
