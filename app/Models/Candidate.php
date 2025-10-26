<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'position_id',
        'partylist_id',
        'biography',
        'profile_photo',
        'status'
    ];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function partylist()
    {
        return $this->belongsTo(Partylist::class);
    }
}
