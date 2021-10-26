<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audience extends Model
{
    use HasFactory;

    protected $fillable = [
        'client',
        'tag_id',
        'first_name',
        'last_name',
        'email',
        'phone',
    ];
}
