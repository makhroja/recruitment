<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'jobs';

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
        'user_id',
        'no_surat',
        'judul',
        'informasi',
        'tgl_mulai',
        'tgl_akhir',
        'lampiran',
        'status',
        'is_aktif'
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
        return $this->belongsTo('App\Models\Unit');
    }

    /**
     * Get the position for this model.
     *
     * @return App\Models\Position
     */
    public function position()
    {
        return $this->belongsTo('App\Models\Position');
    }

    public function jobDetail()
    {
        return $this->hasMany('App\Models\JobDetail');
    }

    public function schedule()
    {
        return $this->hasOne('App\Models\Schedule');
    }
}
