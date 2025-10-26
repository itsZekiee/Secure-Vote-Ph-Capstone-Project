<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectionForm2 extends Model
{
    use HasFactory;

    protected $table = 'election_form_2';

    protected $fillable = [
        'form1_id',
        'position',
        'candidates'
    ];

    protected $casts = [
        'candidates' => 'array'
    ];

    public function form1()
    {
        return $this->belongsTo(ElectionForm1::class, 'form1_id');
    }
}
