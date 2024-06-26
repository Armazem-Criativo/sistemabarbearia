<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'service',
        'value'
    ];

    public function schedulings()
    {
        return $this->hasMany(Scheduling::class, 'id_service');
    }
}
