<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    protected $fillable = [
        'name',
        'nip',
        'address',
        'city',
        'postal_code',
    ];

    public function employee(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
