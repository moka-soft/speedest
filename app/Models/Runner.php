<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Runner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cpf',
        'birth_date',
    ];

    protected $dates = [
        'birth_date'
    ];

    public static  function search($searchKey)
    {
        return self::where('name', 'LIKE', '%' . $searchKey . '%')
            ->orWhere('cpf', 'LIKE', '%' . $searchKey . '%');
    }

    public function races()
    {
        return $this->belongsToMany(Race::class, 'participations',  'runner_id', 'race_id')
            ->withTimestamps()
            ->withPivot('runner_id', 'race_id', 'start_at', 'end_at');
    }
}
