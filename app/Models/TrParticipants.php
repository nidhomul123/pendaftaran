<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $kwarran
 * @property string $created_by
 * @property string $created_at
 * @property string $updated_by
 * @property string $updated_at
 * @property MstrKwarran $mstrKwarran
 * @property MstrScoutLevel $mstrScoutLevel
 * @property MstrKridaSakaMilenial $mstrKridaSakaMilenial
 */
class TrParticipants extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tr_participants';

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
    protected $fillable = ['id', 'full_name', 'email', 'gender', 'birth_place', 'birth_date', 'pangkalan_gudep', 'kwarran_id', 'nik', 'nta_pramuka_nis_nim', 'scout_level_id', 'krida_saka_milenial_id', 'address', 'phone_number', 'twitter', 'instagram', 'facebook', 'tiktok', 'kk_original_filename', 'kk_filename', 'ktp_original_filename', 'ktp_filename', 'created_by', 'created_at', 'updated_by', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mstrKwarran()
    {
        return $this->belongsTo('App\Models\MstrKwarran', 'id', 'kwarran_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mstrScoutLevel()
    {
        return $this->belongsTo('App\Models\MstrScoutLevel', 'id', 'scout_level_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mstrKridaSakaMilenial()
    {
        return $this->belongsTo('App\Models\MstrKridaSakaMilenial', 'id', 'krida_saka_milenial_id');
    }
}
