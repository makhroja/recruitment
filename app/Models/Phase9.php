<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
    
    /**
     * Get the application for this model.
     *
     * @return App\Models\Application
     */
    public function application()
    {
        return $this->belongsTo('App\Models\Application','application_id');
    }



}
