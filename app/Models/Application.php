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
        'phase2s',
        'phase3s',
        'phase4s',
        'phase5s',
        'phase6s',
        'phase7s',
        'phase8s',
        'phase9s',
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

    /**
     * Get the user associated with the Application
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function phase1()
    {
        return $this->hasOne('App\Models\Phase1');
    }
    public function phase2()
    {
        return $this->hasOne('App\Models\Phase2');
    }
    public function phase3()
    {
        return $this->hasOne('App\Models\Phase3');
    }
    public function phase4()
    {
        return $this->hasOne('App\Models\Phase4');
    }
    public function phase5()
    {
        return $this->hasOne('App\Models\Phase5');
    }
    public function phase6()
    {
        return $this->hasOne('App\Models\Phase6');
    }
    public function phase7()
    {
        return $this->hasOne('App\Models\Phase7');
    }
    public function phase8()
    {
        return $this->hasOne('App\Models\Phase8');
    }
    public function phase9()
    {
        return $this->hasOne('App\Models\Phase9');
    }
}
