<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'type',
    'name',
    'email',
    'phone',
    'preferred_date',
    'budget',
    'message',
    'status',
])]
class CustomerRequest extends Model
{
    protected function casts(): array
    {
        return [
            'preferred_date' => 'datetime',
        ];
    }
}
