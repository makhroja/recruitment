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

<table class="table table-bordered">
    <thead>
        <tr>
            <th>
                Tahapan
            </th>
            <th style="width: 0%">
                Tanggal
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                {{ $tahap[1] }}
            </td>
            <td>
                <input class="form-control  @error('tahap_1') is-invalid @enderror" name="tahap_1" type="date"
                    id="tahap_1" value="{{ old('tahap_1', optional($schedule)->tahap_1) }}">
                {!! $errors->first('tahap_1', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </td>
        </tr>
        <tr>
            <td>
                {{ $tahap[2] }}
            </td>
            <td>
                <input class="form-control  @error('tahap_2') is-invalid @enderror" name="tahap_2" type="date"
                    id="tahap_2" value="{{ old('tahap_2', optional($schedule)->tahap_2) }}">
                {!! $errors->first('tahap_2', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </td>
        </tr>
        <tr>
            <td>
                {{ $tahap[3] }}
            </td>
            <td>
                <input class="form-control  @error('tahap_3') is-invalid @enderror" name="tahap_3" type="date"
                    id="tahap_3" value="{{ old('tahap_3', optional($schedule)->tahap_3) }}">
                {!! $errors->first('tahap_3', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </td>
        </tr>
        <tr>
            <td>
                {{ $tahap[4] }}
            </td>
            <td>
                <input class="form-control  @error('tahap_4') is-invalid @enderror" name="tahap_4" type="date"
                    id="tahap_4" value="{{ old('tahap_4', optional($schedule)->tahap_4) }}">
                {!! $errors->first('tahap_4', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </td>
        </tr>
        <tr>
            <td>
                {{ $tahap[5] }}
            </td>
            <td>
                <input class="form-control  @error('tahap_5') is-invalid @enderror" name="tahap_5" type="date"
                    id="tahap_5" value="{{ old('tahap_5', optional($schedule)->tahap_5) }}">
                {!! $errors->first('tahap_5', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </td>
        </tr>
        <tr>
            <td>
                {{ $tahap[6] }}
            </td>
            <td>
                <input class="form-control  @error('tahap_6') is-invalid @enderror" name="tahap_6" type="date"
                    id="tahap_6" value="{{ old('tahap_6', optional($schedule)->tahap_6) }}">
                {!! $errors->first('tahap_6', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </td>
        </tr>
        <tr>
            <td>
                {{ $tahap[7] }}
            </td>
            <td>
                <input class="form-control  @error('tahap_7') is-invalid @enderror" name="tahap_7" type="date"
                    id="tahap_7" value="{{ old('tahap_7', optional($schedule)->tahap_7) }}">
                {!! $errors->first('tahap_7', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </td>
        </tr>
        <tr>
            <td>
                {{ $tahap[8] }}
            </td>
            <td>
                <input class="form-control  @error('tahap_8') is-invalid @enderror" name="tahap_8" type="date"
                    id="tahap_8" value="{{ old('tahap_8', optional($schedule)->tahap_8) }}">
                {!! $errors->first('tahap_8', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </td>
        </tr>
        <tr>
            <td>
                {{ $tahap[9] }}
            </td>
            <td>
                <input class="form-control  @error('tahap_9') is-invalid @enderror" name="tahap_9" type="date"
                    id="tahap_9" value="{{ old('tahap_9', optional($schedule)->tahap_9) }}">
                {!! $errors->first('tahap_9', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </td>
        </tr>
        <tr>
            <td>
                {{ $tahap[10] }}
            </td>
            <td>
                <input class="form-control  @error('tahap_10') is-invalid @enderror" name="tahap_10" type="date"
                    id="tahap_10" value="{{ old('tahap_10', optional($schedule)->tahap_10) }}">
                {!! $errors->first('tahap_10', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </td>
        </tr>
        <tr>
            <td>
                {{ $tahap[11] }}
            </td>
            <td>
                <input class="form-control  @error('tahap_11') is-invalid @enderror" name="tahap_11" type="date"
                    id="tahap_11" value="{{ old('tahap_11', optional($schedule)->tahap_11) }}">
                {!! $errors->first('tahap_11', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </td>
        </tr>
        <tr>
            <td>
                {{ $tahap[12] }}
            </td>
            <td>
                <input class="form-control  @error('tahap_12') is-invalid @enderror" name="tahap_12" type="date"
                    id="tahap_12" value="{{ old('tahap_12', optional($schedule)->tahap_12) }}">
                {!! $errors->first('tahap_12', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </td>
        </tr>
        <tr>
            <td>
                {{ $tahap[13] }}
            </td>
            <td>
                <input class="form-control  @error('tahap_13') is-invalid @enderror" name="tahap_13" type="date"
                    id="tahap_13" value="{{ old('tahap_13', optional($schedule)->tahap_13) }}">
                {!! $errors->first('tahap_13', '<small class="invalid-feedback" role="alert">:message</small>') !!}
            </td>
        </tr>
    </tbody>
</table>
<br>
