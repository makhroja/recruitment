<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'positions';

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
                  'unit_id',
                  'nama',
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
     * Get the unit for this model.
     *
     * @return App\Models\Unit
     */
    public function unit()
    {
        return $this->belongsTo('App\Models\Unit','unit_id');
    }



}
