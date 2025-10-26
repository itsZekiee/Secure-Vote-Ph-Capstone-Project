<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectionForm1 extends Model
{
    use HasFactory;

    protected $table = 'election_form_1';

    protected $fillable = [
        'title',
        'organization',
        'category',
        'description',
        'instructions',
        'start',
        'end'
    ];

    public function form2()
    {
        return $this->hasMany(ElectionForm2::class, 'form1_id');
    }
}
