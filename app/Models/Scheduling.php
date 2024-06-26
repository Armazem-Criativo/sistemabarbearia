<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Scheduling extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_client',
        'id_employee',
        'id_service',
        'id_payment',
        'date',
        'status',
    ];

    public function clients()
    {
        return $this->belongsTo(Client::class, 'id_client');
    }

    public function employees()
    {
        return $this->belongsTo(Employee::class, 'id_employee');
    }

    public function payments()
    {
        return $this->belongsTo(Payment::class, 'id_payment');
    }

    public function services()
    {
        return $this->belongsTo(Service::class, 'id_service');
    }
}
