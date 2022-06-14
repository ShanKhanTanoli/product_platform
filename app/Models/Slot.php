<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    use HasFactory;

    protected $fillable = [
        'slot_id',
        'event_id',
        'slug',
        'starting_date',
        'ending_date',
        'starting_time',
        'ending_time',
        'type',
        'capacity',
        'can_book_before',
        'can_book_until',
        'can_cancel_before',
    ];
}
