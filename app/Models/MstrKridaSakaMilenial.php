<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $krida_saka_milenial
 * @property string $created_by
 * @property string $created_at
 * @property string $updated_by
 * @property string $updated_at
 * @property TrParticipants[] $trParticipants
 */
class MstrKridaSakaMilenial extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'mstr_krida_saka_milenial';

    public $timestamps = false;

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['krida_saka_milenial', 'created_by', 'created_at', 'updated_by', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function trParticipants()
    {
        return $this->hasMany('App\Models\TrParticipants', 'id', 'krida_saka_milenial_id');
    }
}
