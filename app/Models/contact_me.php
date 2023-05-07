<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact_me extends Model
{
    use HasFactory;
    protected $table = 'contact_me';
    protected $fillable = [
        'name','email','phone','message'
    ];
}
