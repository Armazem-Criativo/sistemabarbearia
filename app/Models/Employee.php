<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cpf',
        'address',
        'position',
        'phone',
        'birthdate',
        'email'
    ];

    public function schedulings()
    {
        return $this->hasMany(Scheduling::class, 'id_employee');
    }
}
