        <input type="hidden" value="fromJob" name="method">
        <div class="form-group {{ $errors->has('job_id') ? 'has-error' : '' }}">
            <label for="job_id" class="col-md-2 control-label">Lowongan</label>
            <div class="col-md-12">
                <select style="width:100%" class="form-control select2 @error('job_id') is-invalid @enderror"
                    id="job_id" name="job_id">
                    <option value="{{ $job->id }}" style="display: none;" {{ old('job_id') }} selected>
                        {{ $job->judul }}</option>
                </select>

                {!! $errors->first('job_id', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('unit_id') ? 'has-error' : '' }}">
            <label for="unit_id" class="col-md-2 control-label">Unit</label>
            <div class="col-md-12">
                <select style="width:100%" class="form-control select2 @error('unit_id') is-invalid @enderror"
                    id="unit_id" name="unit_id">
                    <option value="" style="display: none;" {{ old('unit_id') }} disabled selected>
                        Pilih unit</option>
                    @foreach ($units as $key => $unit)
                        <option value="{{ $key }}" {{ old('unit_id') }}>
                            {{ $unit }}
                        </option>
                    @endforeach
                </select>

                {!! $errors->first('unit_id', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('position_id') ? 'has-error' : '' }}">
            <label for="position_id" class="col-md-2 control-label">Posisi</label>
            <div class="col-md-12">
                <select style="width:100%" class="form-control select2 @error('position_id') is-invalid @enderror"
                    id="position_id" name="position_id">
                    <option value="" style="display: none;" disabled selected>Pilih Posisi</option>
                    @foreach ($positions as $key => $position)
                        <option value="{{ $key }}" {{ old('position_id') }}>
                            {{ $position }}
                        </option>
                    @endforeach
                </select>

                {!! $errors->first('position_id', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('pendidikan') ? 'has-error' : '' }}">
            <label for="pendidikan" class="col-md-2 control-label">Pendidikan</label>
            <div class="col-md-12">
                <select style="width:100%" class="form-control select2" id="pendidikan" required name="pendidikan">
                    <option value="" style="display: none;" {{ old('pendidikan') }} disabled selected>
                        Select Pendidikan</option>
                    <option value="SMA/SMK" {{ old('pendidikan') }}>
                        SMA/SMK
                    </option>
                    <option {{ old('pendidikan') }} value="DI">
                        DI
                    </option>
                    <option {{ old('pendidikan') }} value="DII">
                        DII
                    </option>
                    <option {{ old('pendidikan') }} value="DIII">
                        DIII
                    </option>
                    <option {{ old('pendidikan') }} value="S1">
                        S1
                    </option>
                    <option {{ old('pendidikan') }} value="S2">
                        S2
                    </option>
                    <option {{ old('pendidikan') }} value="S3">
                        S3
                    </option>
                </select>
                {!! $errors->first('pendidikan', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('jurusan') ? 'has-error' : '' }}">
            <label for="jurusan" class="col-md-2 control-label">Jurusan</label>
            <div class="col-md-12">
                <input class="form-control  @error('jurusan') is-invalid @enderror" name="jurusan" type="text"
                    id="jurusan" value="{{ old('jurusan') }}" minlength="1" placeholder="Isikan jurusan disini...">
                {!! $errors->first('jurusan', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('jk') ? 'has-error' : '' }}">
            <label for="jk" class="col-md-2 control-label">Jenis Kelamin</label>
            <div class="col-md-12">
                <select style="width:100%" class="form-control select2 @error('jk') is-invalid @enderror" id="jk"
                    name="jk" required>
                    <option value="" style="display: none;" {{ old('jk') }} disabled selected>
                        Pilih Jenis Kelamin</option>
                    <option {{ old('jk') }} value="1">
                        Laki-laki
                    </option>
                    <option {{ old('jk') }} value="2">
                        Perempuan
                    </option>
                    <option {{ old('jk') }} value="3">
                        Laki-laki/Perempuan
                    </option>
                </select>
                {!! $errors->first('jk', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('umur') ? 'has-error' : '' }}">
            <label for="umur" class="col-md-2 control-label">Umur</label>
            <div class="col-md-12">
                <input class="form-control  @error('umur') is-invalid @enderror" name="umur" type="text"
                    id="umur" value="{{ old('umur') }}" minlength="1" placeholder="Isikan umur disini...">
                {!! $errors->first('umur', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('jumlah') ? 'has-error' : '' }}">
            <label for="jumlah" class="col-md-2 control-label">Jumlah</label>
            <div class="col-md-12">
                <input class="form-control  @error('jumlah') is-invalid @enderror" name="jumlah" type="text"
                    id="jumlah" value="{{ old('jumlah') }}" minlength="1" placeholder="Isikan jumlah disini...">
                {!! $errors->first('jumlah', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('catatan') ? 'has-error' : '' }}">
            <label for="catatan" class="col-md-2 control-label">Catatan</label>
            <div class="col-md-12">
                <small class="text-danger"> Gunakan tanda koma ',' jika persyaratan lebih dari satu.</small>
                <textarea class="form-control  @error('catatan') is-invalid @enderror" name="catatan" type="text" id="catatan"
                    rows="5">{!! old('catatan') !!}</textarea>
                {!! $errors->first('catatan', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </div>
        </div>
