<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobDetail extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'job_details';

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
        'uuid', 'job_id', 'unit_id', 'position_id', 'pendidikan', 'jurusan', 'jk', 'umur', 'jumlah', 'catatan'
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

    public function job()
    {
        return $this->belongsTo('App\Models\Job');
    }

    public function unit()
    {
        return $this->belongsTo('App\Models\Unit');
    }

    public function position()
    {
        return $this->belongsTo('App\Models\Position');
    }
}
