<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{

    protected $fillable = [
        'name',
        'surname',
        'email',
        'phone',
        'company_id',
    ];


    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

}