<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'announcements';

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
                  'keterangan',
                  'pdf',
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
    
    /**
     * Get the job for this model.
     *
     * @return App\Models\Job
     */
    public function job()
    {
        return $this->belongsTo('App\Models\Job','job_id');
    }



}
