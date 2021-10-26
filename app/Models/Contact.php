<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'clientid',
        'first_name',
       'last_name',
       'name',
       'email',
       'phone',
    ];



    public function users(){
        return $this->belongsTo(User::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
