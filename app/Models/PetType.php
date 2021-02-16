<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetType extends Model
{
    use HasFactory;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get the pets for the pet type.
     */
    public function pets()
    {
        return $this->hasMany(Pet::class);
    }

    /**
     * Get model table name
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return ((new self)->getTable());
    }
}
