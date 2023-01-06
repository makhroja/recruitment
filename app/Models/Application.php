<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'applications';

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
        'job_id',
        'user_id',
        'unit_id',
        'position_id',
        'administrasi',
        'tertulis',
        'wawancara_unit',
        'praktek',
        'wawancara_hrd',
        'psikotes',
        'wawancara_performance',
        'kesehatan',
        'tahap_akhir',
        'status',
        'pdf'
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

    /**
     * Get the job for this model.
     *
     * @return App\Models\Job
     */
    public function job()
    {
        return $this->belongsTo('App\Models\Job', 'job_id');
    }

    /**
     * Get the user for this model.
     *
     * @return App\Models\User
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    /**
     * Get the unit for this model.
     *
     * @return App\Models\Unit
     */
    public function unit()
    {
        return $this->belongsTo('App\Models\Unit', 'unit_id');
    }

    /**
     * Get the position for this model.
     *
     * @return App\Models\Position
     */
    public function position()
    {
        return $this->belongsTo('App\Models\Position', 'position_id');
    }
}
