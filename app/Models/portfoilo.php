<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class portfoilo extends Model
{
    protected $table = 'portfolio';
    use HasFactory;

    public function categorey(){
        return $this->hasOne(portfoilo_category::class,'id','categorey_id');
    }
}
