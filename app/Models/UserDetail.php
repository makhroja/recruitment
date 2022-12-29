<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_details';

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
                  'nama_lengkap',
                  'jk',
                  'tgl_lahir',
                  'tempat_lahir',
                  'agama',
                  'alamat',
                  'no_hp',
                  'pendidikan',
                  'instansi',
                  'jurusan',
                  'foto',
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
        return $this->belongsTo('App\Models\User','user_id');
    }

    /**
     * Set the tgl_lahir.
     *
     * @param  string  $value
     * @return void
     */
    public function setTglLahirAttribute($value)
    {
        $this->attributes['tgl_lahir'] = !empty($value) ? \DateTime::createFromFormat('Y-m-d', $value) : null;
    }

    /**
     * Get tgl_lahir in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getTglLahirAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('Y-m-d');
    }

}
