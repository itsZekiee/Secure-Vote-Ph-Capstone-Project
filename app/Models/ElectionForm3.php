<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectionForm3 extends Model
{
    use HasFactory;

    protected $table = 'election_form_3';

    protected $fillable = [
        'form1_id',
        'allowed_domain',
        'admin_access_emails',
    ];

    protected $casts = [
        'admin_access_emails' => 'array', // automatically cast JSON to PHP array
    ];

    public function form1()
    {
        return $this->belongsTo(ElectionForm1::class, 'form1_id');
    }
}
