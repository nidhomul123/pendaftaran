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
 */
class MstrKwarran extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'mstr_kwarran';

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
    protected $fillable = ['kwarran', 'created_by', 'created_at', 'updated_by', 'updated_at'];
}
