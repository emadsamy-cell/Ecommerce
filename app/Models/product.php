<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class product extends Model
{
    use HasFactory;

    public function category(): BelongsTo
    {
        return $this->belongsTo(category::class);
    }

    

    protected $fillable = [
        'name',
        'OldPrice',
        'image',
        'discription',
        'discount',
        'NewPrice',
        'avaliable',
        'Isdiscount',
        'category_id',
    ];

}
