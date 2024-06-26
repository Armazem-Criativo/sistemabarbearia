<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cpf',
        'address',
        'birthdate',
        'phone',
        'email'
    ];

    public function schedulings()
    {
        return $this->hasMany(Scheduling::class, 'id_client');
    }
}
