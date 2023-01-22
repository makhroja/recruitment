<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class Phase9 extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'phase9s';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid',
        'application_id',
        'nilai_akhir',
        'status'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    public static function getPhase9Json($job_uuid = '')
    {
        $job = Job::where('uuid', $job_uuid)->first();
        $application = Application::where('job_id', $job->id);

        return DataTables::of($application)
            ->addIndexColumn()
            ->addColumn('user', function ($row) {
                return $row->user->userDetail->nama_lengkap;
            })
            ->addColumn('nilai', function ($row) {
                if (is_null($row->phase9)) {
                    return '-';
                }
                if (!empty($row->phase9->nilai_akhir)) {
                    $nilai = $row->phase9->nilai_akhir;
                } else {
                    $nilai = 'Belum di Nilai';
                }
                $html = '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bd-' . $row->phase9->id . '">' . $nilai . '</button>
                <div id="bd-' . $row->phase9->id . '" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                        Hasil Nilai Tes Tertulis
                        </div>
                        <div class="modal-body">
                        ' . view('sdm.nilai.n_phase9', compact('row'))->render() . '
                        </div>
                        <div class="modal-footer">
                        <input type="button" class="btn btn-primary btn-sm" data-dismiss="modal"
                        onclick="reDraw()" value="Tutup">
                        </div>
                    </div>
                  </div>
                </div>';
                return $html;
                // return $row->phase9->nilai_akhir;
            })
            ->addColumn('lampiran', function ($row) {
                $btn = '<button data-pdf="' . $row->pdf . '" class="btn btn-sm btn-outline-warning srcLampiran">Lihat</button>';
                return $btn;
            })
            ->addColumn('lolos', function ($row) {
                if (empty($row->phase9->nilai_akhir)) {
                    return '-';
                }
                if ($row->phase9->status == 1) {
                    $ya = 'checked';
                    $tidak = '';
                } elseif ($row->phase9->status == 2) {
                    $ya = '';
                    $tidak = 'checked';
                } else {
                    $ya = '';
                    $tidak = '';
                }


                $btn = '
                <div class="form-check form-check-inline">
                <label class="form-check-label">Ya
                <input id="checkbox-' . $row->id . '" href="javascript:void(0)" name="status' . $row->id . '" type="checkbox" ' . $ya . ' data-name="' . $row->user->name . '" data-id="' . $row->uuid . '"  data-status = "1" class="form-check-input status"><i class="input-frame"></i>
                </label>
                </div>

                ';
                return $btn;
            })
            ->addColumn('tidak_lolos', function ($row) {
                if (empty($row->phase9->nilai_akhir)) {
                    return '-';
                }
                if ($row->phase9->status == 1) {
                    $ya = '';
                    $tidak = 'checked';
                } elseif ($row->phase9->status == 2) {
                    $ya = 'checked';
                    $tidak = '';
                } else {
                    $ya = '';
                    $tidak = '';
                }
                $btn = '
                <div class="form-check form-check-inline">
                <label class="form-check-label">Tidak
                <input id="checkbox-' . $row->id . '" href="javascript:void(0)" name="status' . $row->id . '" type="checkbox" ' . $ya . ' data-name="' . $row->user->name . '" data-id="' . $row->uuid . '"  data-status = "2" class="form-check-input status"><i class="input-frame"></i>
                </label>
                </div>
                ';
                return $btn;
            })
            ->rawColumns(['lolos', 'tidak_lolos', 'lampiran', 'user', 'nilai'])
            ->make(true);
    }

    public static function statusPhase9($request, $uuid)
    {
        $phase = Phase9::where('application_id', getAppId($uuid)->id)->first();

        $app = Application::findOrFail($phase->application_id);

        if ($request->status == 1) {
            $app->update([
                'phase9s' => 1
            ]);
        } else {
            $app->update([
                'phase9s' => 0
            ]);
        }

        $phase->update(['status' => $request->status]);

        if ($phase->administrasi == 2) {
            return Response::json([
                'success' => 'Nama : ' . $phase->application->user->userDetail->nama_lengkap . 'Tidak lolos Wawancara Unit'
            ]);
        }

        return Response::json([
            'success' => 'Nama : ' . $phase->application->user->userDetail->nama_lengkap . ' lolos Wawancara Unit'
        ]);
    }

    public function application()
    {
        return $this->belongsTo('App\Models\Application', 'application_id');
    }
}
