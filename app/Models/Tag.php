<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['client_id','tag_name'];

    // public function contacts(){
    //     return $this->hasMany(Contact::class);
    // }
    public function contacts(){
        return $this->belongsToMany(Contact::class);
    }
}
