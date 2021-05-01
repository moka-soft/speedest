<?php

namespace App\Models;

use App\Enums\StatusRaceEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date',
        'type_id',
    ];

    protected $dates = [
        'date'
    ];

    protected $appends = [
        'status'
    ];

    public function getStatusAttribute()
    {
        if ($this->date->isPast()){
            return StatusRaceEnum::completed();
        }

        if ($this->date->isToday()){
            return StatusRaceEnum::running();
        }

        return StatusRaceEnum::coming();
    }

    public function type()
    {
        return $this->belongsTo(RaceType::class);
    }
}
