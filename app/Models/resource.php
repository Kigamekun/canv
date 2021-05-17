<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resource extends Model
{
    protected $table = 'resource';
    protected $fillable = ['title','author','thumb'];
    use HasFactory;
}
