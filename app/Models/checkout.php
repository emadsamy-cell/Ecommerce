<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class checkout extends Model
{
    use HasFactory;

    public function orders(): HasMany
    {
        return $this->hasMany(order::class);
    }

    protected $fillable = [
        'name',
        'company_name',
        'main_address',
        'more_address',
        'city',
        'state',
        'postcode',
        'email',
        'phone',
        'totalPrice',
    ];
}
