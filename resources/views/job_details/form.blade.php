        <input type="hidden" value="{{ $method }}" name="method">
        <div class="form-group {{ $errors->has('job_id') ? 'has-error' : '' }}">
            <label for="job_id" class="col-md-2 control-label">Lowongan</label>
            <div class="col-md-10">
                <select class="form-control select2 @error('job_id') is-invalid @enderror" id="job_id" name="job_id">
                    <option value="" style="display: none;"
                        {{ old('job_id', optional($jobDetail)->job_id ?: '') == '' ? 'selected' : '' }} disabled
                        selected>Pilih Lowongan</option>
                    @foreach ($jobs as $key => $job)
                        <option value="{{ $key }}"
                            {{ old('job_id', optional($jobDetail)->job_id) == $key ? 'selected' : '' }}>
                            {{ $job }}
                        </option>
                    @endforeach
                </select>

                {!! $errors->first('job_id', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('unit_id') ? 'has-error' : '' }}">
            <label for="unit_id" class="col-md-2 control-label">Unit</label>
            <div class="col-md-10">
                <select class="form-control select2 @error('unit_id') is-invalid @enderror" id="unit_id"
                    name="unit_id">
                    <option value="" style="display: none;"
                        {{ old('unit_id', optional($jobDetail)->unit_id ?: '') == '' ? 'selected' : '' }} disabled
                        selected>
                        Pilih unit</option>
                    @foreach ($units as $key => $unit)
                        <option value="{{ $key }}"
                            {{ old('unit_id', optional($jobDetail)->unit_id) == $key ? 'selected' : '' }}>
                            {{ $unit }}
                        </option>
                    @endforeach
                </select>

                {!! $errors->first('unit_id', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('position_id') ? 'has-error' : '' }}">
            <label for="position_id" class="col-md-2 control-label">Posisi</label>
            <div class="col-md-10">
                <select class="form-control select2 @error('position_id') is-invalid @enderror" id="position_id"
                    name="position_id">
                    <option value="" style="display: none;"
                        {{ old('position_id', optional($jobDetail)->position_id ?: '') == '' ? 'selected' : '' }}
                        disabled selected>Pilih posisi</option>
                    @foreach ($positions as $key => $position)
                        <option value="{{ $key }}"
                            {{ old('position_id', optional($jobDetail)->position_id) == $key ? 'selected' : '' }}>
                            {{ $position }}
                        </option>
                    @endforeach
                </select>

                {!! $errors->first('position_id', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('pendidikan') ? 'has-error' : '' }}">
            <label for="pendidikan" class="col-md-2 control-label">Pendidikan</label>
            <div class="col-md-6">
                <select required class="form-control select2" id="pendidikan" name="pendidikan">
                    <option value="" style="display: none;"
                        {{ old('pendidikan', optional($jobDetail)->pendidikan ?: '') == '' ? 'selected' : '' }}
                        disabled selected>
                        Select Pendidikan</option>
                    <option value="SMA/SMK"
                        {{ old('pendidikan', optional($jobDetail)->pendidikan ?: '') == '' ? 'selected' : '' }}>
                        SMA/SMK
                    </option>
                    <option {{ old('pendidikan', optional($jobDetail)->pendidikan ?: '') == 'DI' ? 'selected' : '' }}
                        value="DI">
                        DI
                    </option>
                    <option {{ old('pendidikan', optional($jobDetail)->pendidikan ?: '') == 'DII' ? 'selected' : '' }}
                        value="DII">
                        DII
                    </option>
                    <option {{ old('pendidikan', optional($jobDetail)->pendidikan ?: '') == 'DIII' ? 'selected' : '' }}
                        value="DIII">
                        DIII
                    </option>
                    <option {{ old('pendidikan', optional($jobDetail)->pendidikan ?: '') == 'S1' ? 'selected' : '' }}
                        value="S1">
                        S1
                    </option>
                    <option {{ old('pendidikan', optional($jobDetail)->pendidikan ?: '') == 'S2' ? 'selected' : '' }}
                        value="S2">
                        S2
                    </option>
                    <option {{ old('pendidikan', optional($jobDetail)->pendidikan ?: '') == 'S3' ? 'selected' : '' }}
                        value="S3">
                        S3
                    </option>
                </select>
                {!! $errors->first('pendidikan', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('jurusan') ? 'has-error' : '' }}">
            <label for="jurusan" class="col-md-2 control-label">Jurusan</label>
            <div class="col-md-10">
                <input class="form-control  @error('jurusan') is-invalid @enderror" name="jurusan" type="text"
                    id="jurusan" value="{{ old('jurusan', optional($jobDetail)->jurusan) }}" minlength="1"
                    placeholder="Isikan jurusan disini...">
                {!! $errors->first('jurusan', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('jk') ? 'has-error' : '' }}">
            <label for="jk" class="col-md-2 control-label">Jk</label>
            <div class="col-md-6">
                <select required class="form-control select2 @error('jk') is-invalid @enderror" id="jk"
                    name="jk">
                    <option value="" style="display: none;"
                        {{ old('jk', optional($jobDetail)->jk ?: '') == '' ? 'selected' : '' }} disabled selected>
                        Pilih Jenis Kelamin</option>
                    <option {{ old('jk', optional($jobDetail)->jk ?: '') == '1' ? 'selected' : '' }} value="1">
                        Laki-laki
                    </option>
                    <option {{ old('jk', optional($jobDetail)->jk ?: '') == '2' ? 'selected' : '' }} value="2">
                        Perempuan
                    </option>
                    <option {{ old('jk', optional($jobDetail)->jk ?: '') == '3' ? 'selected' : '' }} value="3">
                        Laki-laki/Perempuan
                    </option>
                </select>
                {!! $errors->first('jk', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('umur') ? 'has-error' : '' }}">
            <label for="umur" class="col-md-2 control-label">Umur</label>
            <div class="col-md-10">
                <input class="form-control  @error('umur') is-invalid @enderror" name="umur" type="text"
                    id="umur" value="{{ old('umur', optional($jobDetail)->umur) }}" minlength="1"
                    placeholder="Isikan umur disini...">
                {!! $errors->first('umur', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('jumlah') ? 'has-error' : '' }}">
            <label for="jumlah" class="col-md-2 control-label">Jumlah</label>
            <div class="col-md-10">
                <input class="form-control  @error('jumlah') is-invalid @enderror" name="jumlah" type="text"
                    id="jumlah" value="{{ old('jumlah', optional($jobDetail)->jumlah) }}" minlength="1"
                    placeholder="Isikan jumlah disini...">
                {!! $errors->first('jumlah', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('catatan') ? 'has-error' : '' }}">
            <label for="catatan" class="col-md-2 control-label">Syarat</label>
            <div class="col-md-10">
                <small class="text-danger"> Gunakan tanda koma ',' jika persyaratan lebih dari satu.</small>
                <textarea class="form-control  @error('catatan') is-invalid @enderror" name="catatan" type="text" id="catatan"
                    rows="5">{!! old('catatan', optional($jobDetail)->catatan) !!}</textarea>
                {!! $errors->first('catatan', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </div>
        </div>
