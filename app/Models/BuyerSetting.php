<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyerSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'language_id', 'currency_id',
    ];
}
